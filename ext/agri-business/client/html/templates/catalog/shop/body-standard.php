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
?>
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
