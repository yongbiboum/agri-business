<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 02/04/2019
 * Time: 09:30
 */
$enc = $this->encoder();

$getVariantData = function( \Aimeos\MShop\Media\Item\Iface $mediaItem ) use ( $enc )
{
    $string = '';

    foreach( $mediaItem->getRefItems( 'attribute', null, 'variant' ) as $id => $item ) {
        $string .= ' data-variant-' . $item->getType() . '="' . $enc->attr( $id ) . '"';
    }

    return $string;
};


$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

$url = $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $this->get( 'params', [] ), [], $detailConfig ) );
$mediaItems = $this->get( 'mediaItems', [] );

?>
<?php $mediaUrl = $enc->attr( $this->content( collect($mediaItems)->first()->getUrl() ) ); ?>
<?php $previewUrl = $enc->attr( $this->content( collect($mediaItems)->first()->getPreview() ) ); ?>

<div class="col-md-6 col-sm-5 col-xs-12">
    <div class="detail-gallery">
        <div class="mid">
            <img src="<?= $previewUrl; ?>" alt=""/>
            <a href="<?= $enc->attr( $mediaUrl ); ?>" itemprop="contentUrl"></a>
        </div>
        <div class="gallery-control">
            <div class="carousel" data-visible="4">
                <ul class="list-none">
                    <li><a href="#" class="active"><img src="/packages/assets/images/product/fruit_24.jpg" alt=""/></a></li>
                    <li><a href="#"><img src="/packages/assets/images/product/fruit_25.jpg" alt=""/></a></li>
                    <li><a href="#"><img src="/packages/assets/images/product/fruit_26.jpg" alt=""/></a></li>
                    <li><a href="#"><img src="/packages/assets/images/product/fruit_27.jpg" alt=""/></a></li>
                    <li><a href="#"><img src="/packages/assets/images/product/fruit_28.jpg" alt=""/></a></li>
                    <li><a href="#"><img src="/packages/assets/images/product/fruit_29.jpg" alt=""/></a></li>
                    <li><a href="#"><img src="/packages/assets/images/product/fruit_23.jpg" alt=""/></a></li>
                </ul>
            </div>
            <a href="#" class="prev"><i class="icon ion-ios-arrow-thin-left"></i></a>
            <a href="#" class="next"><i class="icon ion-ios-arrow-thin-right"></i></a>
        </div>
    </div>
    <!-- End Gallery -->
</div>
