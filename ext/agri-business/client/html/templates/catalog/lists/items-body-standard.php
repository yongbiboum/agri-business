<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 */
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
?>
<?php foreach( $this->get( 'listProductItems', [] ) as $id => $productItem ) : $firstImage = true; ?>
<?php
$conf = $productItem->getConfig(); $css = ( isset( $conf['css-class'] ) ? $conf['css-class'] : '' );
$params = array( 'd_name' => $productItem->getName( 'url' ), 'd_prodid' => $id );
$text = "";
if( $position !== null ) { $params['d_pos'] = $position++; }
    $prices = $productItem->getRefItems( 'price', null, 'default' );
    $priceUrl=((collect($prices)->first())!==null)? collect($prices)->first()->getValue() : $text ;

$url = $this->url( ($productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

?>

    <?php $medias= $productItem->getRefItems( 'media', 'default', 'default' )  ?>
    <?php
    if(collect($medias)->first()){
        $mediaUrl = $enc->attr( $this->content( collect($medias)->first()->getPreview() ) );
    }
    ?>

    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="item-product item-product-grid text-center">
            <div class="product-thumb" >
                <a href="<?= $url; ?>" class="product-thumb-link rotate-thumb">
                    <img  src="<?= $mediaUrl; ?>" >
                    <img  src="<?= $mediaUrl; ?>" >
                </a>
                <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <div class="product-info">
                <h3 class="product-title"><a href="<?= $url; ?>"><?= $enc->html( $productItem->getName(), $enc::TRUST ); ?></a></h3>
                <div class="product-price" data-prodid="<?= $enc->attr( $id ); ?>"
                     data-prodcode="<?= $enc->attr( $productItem->getCode() ); ?>">
                    <ins class="color"><span><?= $priceUrl; ?></span></ins>
                </div>
                <div class="product-rate">
                    <div class="product-rating" style="width:85%"></div>
                </div>
            </div>
        </div>
    </div>



<?php endforeach; ?>

