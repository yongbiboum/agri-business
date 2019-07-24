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

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );

/**
 * Created by PhpStorm.
 * User: faya
 * Date: 01/04/2019
 * Time: 14:11
 */
$tab = ["FRUITS" => 4, "LEGUMES" => 3 ,"TUBERCULES"=>5,"CACAO-CAFE"=>16];
if(!request("f_param")):
?>
<h2 class="title30 text-center font-bold">Catégories de produits</h2>
<ul class="list-inline-block text-center title-tab-icon3">
    <li class="active"><a href="#4" data-toggle="tab"><img class="wobble-horizontal" src="/packages/assets/images/fruit.png" alt=""><span>FRUITS</span></a></li>
    <li><a href="#3" data-toggle="tab"><img class="wobble-horizontal" src="/packages/assets/images/brocoli.png" alt=""><span>LEGUMES</span></a></li>
    <li><a href="#5" data-toggle="tab"><img class="wobble-horizontal" src="/packages/assets/images/potato.png" alt=""><span>TUBERCULES</span></a></li>
    <li><a href="#16" data-toggle="tab"><img class="wobble-horizontal" src="/packages/assets/images/cacao-cafe.png" alt=""><span>CACAO-CAFE</span></a></li>
</ul>
<div class="tab-content">
    <?php
    $active = "" ;
    $manager = \Aimeos\MShop\Factory::createManager( $this->context, 'catalog' );
    foreach ($tab as $id => $it):
    ?>
        <?php if($it==4): $active ="active" ;?>
    <div id="<?= $it ?>" class="tab-pane  <?= $active ?> ">
        <div class="list-price-off clearfix">
            <?php
            $tree = $manager->getTree($it,[],\Aimeos\MW\Tree\Manager\Base::LEVEL_TREE)->getNode()->getChildren();
            $catalogLists= array_slice($tree,0,4);

            foreach($catalogLists as $id => $catalogItem) :
                //dd($catalogLists);

                $catid = $catalogItem->getId();
                $catalogItemId = $manager->getItem($catid,['media','text','price']);
                $bool = is_null($catalogItemId->getRefItems("text")) ? 0:1 ;
                $base = "no";

                if(!empty($catalogItemId->getRefItems("text"))) {
                    $base = collect($catalogItemId->getRefItems("text"))->first()->getLabel();
                }

//                if($base==="base"):

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
                        if(collect($stockItems)->first()){
                            $stocklevel = (float)$stocklevel + (float)collect($stockItems)->first()->getStockLevel();
                        }
                        else{
                            $stocklevel =0;
                        }
                        $producteurs = (int)$producteurs + (int)'1';
                        $price = $product->getRefItems( 'price', null, 'default' );
                        if(collect($price)->first()){
                            $priceUrl= $priceUrl + collect($price)->first()->getValue() ;
                        }
                        else{
                            $priceUrl = 0 ;
                        }


                    endforeach;
                    if($producteurs!==(int)'0'):{
                        $prices = $priceUrl/$producteurs ;
                    }
                    else:{
                        $prices = 0 ;
                    }
                    endif;
                    $unite = 'KG';
                    if ($stocklevel > (float)'1000.0'){
                        $unite = 'Tonnes';
                        $stocklevel = $stocklevel/1000 ;
                    }
                    if($stocklevel==1000){
                        $unite = 'Tonne' ;
                        $stocklevel = $stocklevel/1000 ;
                    }
                    $url2=  route('agri_categorie', ["code"=>$catalogItemId->getCode(),"id"=>$catalogItemId->getId(),"f_items" => $catalogItemId->getId()]) ;
                    ?>
                    <div class="item-product-price table">
                        <div class="product-thumb">
                            <a href="<?= $url2 ?>" class="product-thumb-link zoom-thumb">
                                <img style="height: 140px !important;" src="<?= asset($mediaItem) ?>" alt="">
                            </a>
                            <a href="<?= asset($mediaItem) ?>" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><a href="<?= $url2 ?>"><?= $enc->html( $catalogItemId->getName(), $enc::TRUST ); ?></a><strong class="color pull-right"> ~ <?= $this->number($prices,0); ?> FCFA/KG</strong></h3>
                            <p class="desc"><strong>Stock total disponible : </strong> <?= $enc->html( $stocklevel, $enc::TRUST ); ?> <?= $unite ?></p>
                            <p class="desc"><strong>Nombre de producteurs agricoles correspondants : </strong> <?= $enc->html( $producteurs, $enc::TRUST ); ?></p>
                        </div>
                    </div>
                <?php
            endforeach; ?>
        </div>

        <div class="text-center">
            <a href="<?= route('accueil_categorie',["f_param" => "categories"])?>" class="btn-arrow color">Voir Tous</a>
        </div>
    </div>
    <?php else: $active=""; ?>
        <div id="<?= $it ?>" class="tab-pane  <?= $active ?> ">
            <div class="list-price-off ">
                <?php
                $tree = $manager->getTree($it,[],\Aimeos\MW\Tree\Manager\Base::LEVEL_TREE)->getNode()->getChildren();
                $catalogLists= array_slice($tree,0,4);

                foreach($catalogLists as $id => $catalogItem) :
                    //dd($catalogLists);

                    $catid = $catalogItem->getId();
                    $catalogItemId = $manager->getItem($catid,['media','text','price']);
                    $bool = is_null($catalogItemId->getRefItems("text")) ? 0:1 ;
                    $base = "no";

                    if(!empty($catalogItemId->getRefItems("text"))) {
                        $base = collect($catalogItemId->getRefItems("text"))->first()->getLabel();
                    }

//                if($base==="base"):

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
                        if(collect($stockItems)->first()){
                            $stocklevel = (float)$stocklevel + (float)collect($stockItems)->first()->getStockLevel();
                        }
                        else{
                            $stocklevel =0;
                        }
                        $producteurs = (int)$producteurs + (int)'1';
                        $price = $product->getRefItems( 'price', null, 'default' );
                        if(collect($price)->first()){
                            $priceUrl= $priceUrl + collect($price)->first()->getValue() ;
                        }
                        else{
                            $priceUrl = 0 ;
                        }

                    endforeach;
                    if($producteurs!==(int)'0'):{
                        $prices = $priceUrl/$producteurs ;
                    }
                    else:{
                        $prices = 0 ;
                    }
                    endif;
                    $unite = 'KG';
                    if ($stocklevel > (float)'1000.0'){
                        $unite = 'Tonnes';
                        $stocklevel = $stocklevel/1000 ;
                    }
                    if($stocklevel==1000){
                        $unite = 'Tonne' ;
                        $stocklevel = $stocklevel/1000 ;
                    }
                    $url2=  route('agri_categorie', ["code"=>$catalogItemId->getCode(),"id"=>$catalogItemId->getId(),"f_items" => $catalogItemId->getId()]) ;
                    ?>
                    <div class="item-product-price table">
                        <div class="product-thumb">
                            <a href="<?= $url2 ?>" class="product-thumb-link zoom-thumb">
                                <img style="height: 140px !important;" src="<?= asset($mediaItem) ?>" alt="">
                            </a>
                            <a href="<?= asset($mediaItem) ?>" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><a href="<?= $url2 ?>"><?= $enc->html( $catalogItemId->getName(), $enc::TRUST ); ?></a><strong class="color pull-right"> ~ <?= $this->number($prices,0); ?> FCFA/KG</strong></h3>
                            <p class="desc"><strong>Stock total disponible : </strong> <?= $enc->html( $stocklevel, $enc::TRUST ); ?> <?= $unite ?></p>
                            <p class="desc"><strong>Nombre de producteurs agricoles correspondants : </strong> <?= $enc->html( $producteurs, $enc::TRUST ); ?></p>
                        </div>
                    </div>
                <?php
                endforeach; ?>
            </div>

            <div class="text-center">
                <a href="<?= route('accueil_categorie',["f_param" => "categories"])?>" class="btn-arrow color">Voir Tous</a>
            </div>
        </div>
    <?php endif;?>
    <?php endforeach?>
</div>
<?php else: ?>
<div class="col-md-9 col-sm-8 col-xs-12" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>" >
    <div class="main-content-shop">
        <?php include('stagelist-body-standard.php'); ?>
        <div class="product-grid-view">
            <div class="row">
                <?php include( 'items-body-standard.php' ); ?>
            </div>
        </div>
    </div>
    <?php //include('pagination-standard.php') ?>
</div>
<?php endif; ?>
