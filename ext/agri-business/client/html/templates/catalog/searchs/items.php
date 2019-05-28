<?php

$enc = $this->encoder();
$position = $this->get( 'itemPosition' );
$productItems = $this->get( 'itemsProductItems', [] );

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );
$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );
$basketConfig = $this->config( 'client/html/basket/standard/url/config', [] );
$basketSite = $this->config( 'client/html/basket/standard/url/site' );

$basketParams = ( $basketSite ? ['site' => $basketSite] : [] );


/**
 * Created by PhpStorm.
 * User: faya
 * Date: 01/04/2019
 * Time: 14:11
 */

?>

<?php dd($this->catalogProducts) ;if($this->catalogProducts!="no") : ?>

    <?php
    $productItems = $this->catalogProducts;
    $text='';

    foreach($productItems as $id => $productItem) :
        $manager2 = \Aimeos\MShop\Factory::createManager( $this->context, 'product' );
        $productItemid = $manager2->getItem($productItem->getId(),['media','text','price']);
        $productText = $productItemid->getRefItems("text");
        $collection = new \Illuminate\Support\Collection();
        foreach ($productText as $id => $ptext):{
            if ($ptext->getLabel()=="Variété"){ $variete = $ptext->getContent(); }
            if ($ptext->getLabel()=="Localité"){ $localite = $ptext->getContent(); }
            if ($ptext->getLabel()=="Détails"){ $Détails = $ptext->getContent(); }
            if ($ptext->getLabel()=="Détail"){ $Détails = $ptext->getContent(); }
        }
        endforeach;
        $cntl = \Aimeos\Controller\Frontend\Factory::createController( $this->context, 'stock' );
        $filter = $cntl->addFilterCodes( $cntl->createFilter(), [$productItem->getCode()] );
        $stockItems = $cntl->searchItems( $filter );
        $stocklevel = (float)collect($stockItems)->first()->getStockLevel();

        $price = $productItemid->getRefItems( 'price', null, 'default' );
        $priceUrl= collect($price)->first()->getValue() ;

        $unite = 'Kg';
        if ($stocklevel > (float)'1000.0'){
            $unite = 'Tonnes';
            $stocklevel = $stocklevel/1000 ;
        }
        if($stocklevel==1000){
            $unite = 'Tonne' ;
            $stocklevel = $stocklevel/1000 ;
        }

        //dd($localite);
        $params = array( 'd_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId() );
        $url = $this->url( ($productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

        ?>

        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="item-product item-product-grid text-center">

                <div class="product-thumb" >
                    <a href="<?= $url ?>" class="product-thumb-link rotate-thumb">
                    </a>
                    <a href="#" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
                <div class="product-info">
                    <a href="<?= $url; ?>">
                        <h3 class="product-title">
                            <?= $enc->html( $variete, $enc::TRUST ); ?>
                        </h3>
                        <h5 >
                            Stock : <?= $enc->html( $stocklevel, $enc::TRUST ); ?> <?= $unite ?>
                        </h5>
                        <h5 >
                            <?= $enc->html( $localite, $enc::TRUST ); ?>
                        </h5>
                    </a>
                    <div class="product-price" data-prodid="<?= $enc->attr( $id ); ?>"
                         data-prodcode="<?= $enc->attr( $productItem->getCode() ); ?>">
                        <ins class="color"> <span > <?= $this->number($priceUrl,0); ?> FCFA/Kg </span> </ins>
                    </div>
                    <div class="product-rate">
                        <div class="product-rating" style="width:75%"></div>
                    </div>
                    <div class="product-extra-link">
                        <a href="#" class="wishlist-link"><i class="fa fa-heart-o" aria-hidden="true"></i><span>Souhait</span></a>
                        <a href="<?= $url; ?>" id="achat" class="addcart-link">Achat</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;
else:
    ?>
    <h2 class="text-center"> Aucun produit correspondant à <?= $this->input ?> !!!</h2>

<?php endif; ?>
