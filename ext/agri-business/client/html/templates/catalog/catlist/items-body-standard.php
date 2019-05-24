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

<?php if(!is_null($this->catalogProducts)) : ?>
    <?php $productItems = $this->catalogProducts;
    $catalogItem = $this->catalogItem ;

    $text='';
    ?>
    <?php foreach($productItems as $id => $productItem) :
        $manager2 = \Aimeos\MShop\Factory::createManager( $this->context, 'product' );
        $productItemid = $manager2->getItem($productItem->getId(),['media','text','price']);

        ?>
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="item-product item-product-grid text-center">
            <?php  $mediaItem= collect($productItemid->getRefItems("media"))->first()->getUrl();

            $params = array( 'd_name' => $productItemid->getName( 'url' ), 'd_prodid' => $id );

            if( $position !== null ) { $params['d_pos'] = $position++; }
            $prices = $productItemid->getRefItems( 'price', null, 'default' );
            $priceUrl=((collect($prices)->first())!==null)? collect($prices)->first()->getValue() : $text ;
            $textItem = collect($productItemid->getLabel())->first();
            $conf = $productItemid->getConfig(); $css = ( isset( $conf['css-class'] ) ? $conf['css-class'] : '' );
            $params = array( 'd_name' => $productItem->getName( 'url' ), 'd_prodid' => $id , 'locale' => app()->getLocale());
            // if( $position !== null ) { $params['d_pos'] = $position++; }

            $url = $this->url( ($productItemid->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );
            ?>
            <div class="product-thumb" >
                <a href="<?= $url; ?>" class="product-thumb-link rotate-thumb">
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
<?php else : ?>

<?php endif ?>

