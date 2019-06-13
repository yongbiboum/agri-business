<div class="col-md-9 col-sm-8 col-xs-12"  >
    <div class="main-content-shop">

        <div class="shop-pagibar clearfix">
            <h2 class="title30 color text-center">Produits favoris </h2>
        </div>
<div class="product-grid-view">
    <div class="row">

<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2014
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();
$favParams = $this->get( 'favoriteParams', [] );
$listItems = $this->get( 'favoriteListItems', [] );
$productItems = $this->get( 'favoriteProductItems', [] );

/** client/html/account/favorite/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2014.09
 * @category Developer
 * @see client/html/account/favorite/url/controller
 * @see client/html/account/favorite/url/action
 * @see client/html/account/favorite/url/config
 */
$favTarget = $this->config( 'client/html/account/favorite/url/target' );

$favController = $this->config( 'client/html/account/favorite/url/controller', 'account' );

$favAction = $this->config( 'client/html/account/favorite/url/action', 'favorite' );

$favConfig = $this->config( 'client/html/account/favorite/url/config', [] );

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );


?>
<?php if( ( $errors = $this->get( 'favoriteErrorList', [] ) ) !== [] ) : ?>
    <ul class="error-list">
        <?php foreach( $errors as $error ) : ?>
            <li class="error-item"><?= $enc->html( $error ); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if( !empty( $listItems ) ) : ?>
<?php foreach( $listItems as $listItem ) : $id = $listItem->getRefId(); ?>
<?php if( isset( $productItems[$id] ) ) : $productItem = $productItems[$id];
$productText = $productItem->getRefItems("text");
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

$unite = 'Kg';
if ($stocklevel > (float)'1000.0'){
    $unite = 'Tonnes';
    $stocklevel = $stocklevel/1000 ;
}
if($stocklevel==1000){
    $unite = 'Tonne' ;
    $stocklevel = $stocklevel/1000 ;
}
$price = $productItem->getRefItems( 'price', null, 'default' );
$priceUrl= collect($price)->first()->getValue() ;
$params = array( 'd_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId() );
$url = $this->url( ($productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

?>

            <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="item-product item-product-grid text-center">
        <div class="product-thumb" >
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
                <a href="#" class=""><div class="product-rating" style="width:75%"></div></a>
            </div>
            <div class="product-extra-link">
                <a href="<?= $url; ?>" id="achat" class="addcart-link">Achat</a>
                <?php $params = array( 'fav_action' => 'delete', 'fav_id' => $id ) + $favParams; ?>
                <a href="<?= $enc->attr( $this->url( $favTarget, $favController, $favAction, $params, [], $favConfig ) ); ?>"
                   class="mofify"><i class="fa fa-trash"></i><span >Retirer</span></a>
            </div>
        </div>

    </div>
</div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
    </div>
</div>
    </div>
</div>
