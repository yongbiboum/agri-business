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
    <?php
    $catalogList = $this->catalogList ;
    $text='';

    ?>
    <?php foreach($catalogList as $id => $catalogItem) :
        $manager = \Aimeos\MShop\Factory::createManager( $this->context, 'catalog' );
        $catid = $catalogItem->getId();
        $catalogItemId = $manager->getItem($catid,['media','text','price']);
        $bool = is_null($catalogItemId->getRefItems("text")) ? 0:1 ;
        $base = "no";

        if(!empty($catalogItemId->getRefItems("text"))) {
            $base = collect($catalogItemId->getRefItems("text"))->first()->getLabel();
        }

        if($base==="base"):
            $catnombre = (int)'1';
        ?>
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="item-product item-product-grid text-center">
            <?php

            $mediaItem= collect($catalogItemId->getRefItems("media"))->first()->getUrl();
            $manager2 = \Aimeos\Controller\Frontend\Factory::createController(  $this->context, 'product' );
            $filter = $manager2->createFilter( 'relevance', '+', 0, 9 );
            $filter = $manager2->addFilterCategory( $filter, $catid );
            $products = $manager2->searchItems( $filter, ['attribute', 'media', 'price', 'text'] );
            $stocklevel = (float)'0';
            $producteurs = (int)'0';
            $priceUrl = (int)'0' ;
            foreach ($products as $prod => $product ):
                $cntl = \Aimeos\Controller\Frontend\Factory::createController( $this->context, 'stock' );
                $filter = $cntl->addFilterCodes( $cntl->createFilter(), [$product->getCode()] );
                $stockItems = $cntl->searchItems( $filter );
                $stocklevel = (float)$stocklevel + (float)collect($stockItems)->first()->getStockLevel();
                $producteurs = (int)$producteurs + (int)'1';
                $price = $product->getRefItems( 'price', null, 'default' );
                $priceUrl= $priceUrl + collect($price)->first()->getValue() ;

            endforeach;
            if($producteurs!==(int)'0'):{
                $prices = $priceUrl/$producteurs ;
            }
            else:{
                $prices = 0 ;
            }
            endif;
            $unité = 'Kg';
            if ($stocklevel > (float)'1000.0'){
                $unité = 'Tonnes';
                $stocklevel = $stocklevel/1000 ;
            }
            if($stocklevel==1000){
                $unité = 'Tonne' ;
                $stocklevel = $stocklevel/1000 ;
            }
            $url2=  route('agri_categorie', ["code"=>$catalogItemId->getCode(),"id"=>$catalogItemId->getId()]) ;

            /*$params = array( 'd_name' => $productItemid->getName( 'url' ), 'd_prodid' => $id );

            if( $position !== null ) { $params['d_pos'] = $position++; }
            $prices = $productItemid->getRefItems( 'price', null, 'default' );
            $priceUrl=((collect($prices)->first())!==null)? collect($prices)->first()->getValue() : $text ;
            $textItem = collect($productItemid->getLabel())->first();
            $conf = $productItemid->getConfig(); $css = ( isset( $conf['css-class'] ) ? $conf['css-class'] : '' );
            $params = array( 'd_name' => $productItem->getName( 'url' ), 'd_prodid' => $id , 'locale' => app()->getLocale());
            // if( $position !== null ) { $params['d_pos'] = $position++; }

            $url = $this->url( ($productItemid->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );*/
            ?>
            <div class="product-thumb" >
                <a href="<?= $url2 ?>" class="product-thumb-link rotate-thumb">
                    <img src="<?= $mediaItem ?>" alt="">
                    <img src="<?= $mediaItem ?>" alt="">
                </a>
                <a href="#" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <div class="product-info">
                <h3 class="product-title">
                    <a href="<?= $url2; ?>"><?= $enc->html( $catalogItemId->getName(), $enc::TRUST ); ?></a>
                </h3>
                <h5 >
                <a href="<?= $url2; ?>">Stock Total : <?= $enc->html( $stocklevel, $enc::TRUST ); ?> <?= $unité ?></a>
                </h5>
                <h5 >
                    <?php if ($producteurs > (int)'1'):?>
                    <a href="<?= $url2; ?>"><?= $enc->html( $producteurs, $enc::TRUST ); ?> Producteurs </a>
                    <?php else :?>
                    <a href="<?= $url2; ?>"><?= $enc->html( $producteurs, $enc::TRUST ); ?> Producteur </a>
                    <?php endif; ?>
            </h5>
                <div class="product-price" data-prodid="<?= $enc->attr( $id ); ?>"
                     data-prodcode="<?= $enc->attr( $catalogItemId->getCode() ); ?>">
                    <ins class="color"> <h5 >Prix moyen :   <?= $prices; ?> FCFA /Kg </h5> </ins>
                </div>
            </div>
        </div>
    </div>

    <?php else: ?>
    <?php endif; ?>
    <?php endforeach; ?>
