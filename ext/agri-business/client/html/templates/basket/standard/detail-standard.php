<?php

$totalQuantity = 0;
$enc = $this->encoder();

$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );
$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );
$basketConfig = $this->config( 'client/html/basket/standard/url/config', [] );

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', array( 'absoluteUri' => 1 ) );

$dlTarget = $this->config( 'client/html/account/download/url/target' );

$dlController = $this->config( 'client/html/account/download/url/controller', 'account' );

$dlAction = $this->config( 'client/html/account/download/url/action', 'download' );

$dlConfig = $this->config( 'client/html/account/download/url/config', array( 'absoluteUri' => 1 ) );

$attrTypes = $this->config( 'client/html/common/summary/detail/product/attribute/types', array( 'variant' ) );

$priceTaxvalue = '0.00';


if( isset( $this->summaryBasket ) )
{
    $price = $this->summaryBasket->getPrice();
    $priceValue = $price->getValue();
    $priceService = $price->getCosts();
    $priceRebate = $price->getRebate();
    //$precision = $price->getPrecision();
    $priceTaxflag = $price->getTaxFlag();
    $priceCurrency = $this->translate( 'currency', $price->getCurrencyId() );
}
else
{
    $priceValue = '0.00';
    $priceRebate = '0.00';
    $priceService = '0.00';
    $priceTaxflag = true;
    $priceCurrency = '';
    $precision = 0;
}


$deliveryName = '';
$deliveryPriceValue = '0.00';
$deliveryPriceService = '0.00';

foreach( $this->summaryBasket->getService( 'delivery' ) as $service )
{
    $deliveryName = $service->getName();
    $deliveryPriceItem = $service->getPrice();
    $deliveryPriceService += $deliveryPriceItem->getCosts();
    $deliveryPriceValue += $deliveryPriceItem->getValue();
}

$paymentName = '';
$paymentPriceValue = '0.00';
$paymentPriceService = '0.00';

foreach( $this->summaryBasket->getService( 'payment' ) as $service )
{
    $paymentName = $service->getName();
    $paymentPriceItem = $service->getPrice();
    $paymentPriceService += $paymentPriceItem->getCosts();
    $paymentPriceValue += $paymentPriceItem->getValue();
}


/// Price format with price value (%1$s) and currency (%2$s)
$priceFormat = $this->translate( 'client', '%1$s %2$s' );

$unhide = $this->get( 'summaryShowDownloadAttributes', false );
$modify = $this->get( 'summaryEnableModify', false );
$errors = $this->get( 'summaryErrorCodes', [] );
//$unite = $this->get('unite');
?>
<table class="shop_table cart table color">
    <thead>
    <tr>
        <th class="product-thumbnail">Produit</th>
        <th class="product-name">&nbsp;&nbsp;</th>
        <th class="product-price">Prix unitaire</th>
        <th class="product-quantity">Quantité</th>
        <th class="product-subtotal">Total</th>
        <th class="product-remove">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach( $this->summaryBasket->getProducts() as $position => $product ) : $totalQuantity += $product->getQuantity(); ?>
    <tr class="cart_item">
        <td class="product-thumbnail">
            <?php
            $name = $product->getName();
            if( ( $pos = strpos( $name, "\n" ) ) !== false ) { $name = substr( $name, 0, $pos ); }
            $params = array_merge( $this->param(), ['d_prodid' => $product->getProductId(), 'd_name' => $name] );
            ?>
            <a href="<?= $enc->attr( $this->url( ( $product->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">
                <?php if( ( $url = $product->getMediaUrl() ) != '' ) : // fixed width for e-mail clients ?>
                    <img class="detail" src="<?= $enc->attr( $this->content( $url ) ); ?>" width="100" />
                <?php endif; ?>
            </a>
        </td>
        <td class="product-name" data-title="Product">
            <?php
            $name = $product->getName();
            if( ( $pos = strpos( $name, "\n" ) ) !== false ) { $name = substr( $name, 0, $pos ); }
            $params = array_merge( $this->param(), ['d_prodid' => $product->getProductId(), 'd_name' => $name] );
            ?>
            <h3>
                <a href="<?= $enc->attr( $this->url( ( $product->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">
                    <?= $enc->html( $product->getName(), $enc::TRUST ); ?>
                </a>
            </h3>
            <h4><?= $enc->html( $this->translate( 'client', 'Article no.:' ), $enc::TRUST ); ?></h4>
            <h4><?= $product->getProductCode(); ?></h4>
        </td>
        <td class="product-price" data-title="Price">
            <span><?= $enc->html( sprintf( $priceFormat, $this->number( $product->getPrice()->getValue(),0 ), $priceCurrency ) ); ?></span>
        </td>
        <td class="product-quantity" data-title="Quantity">
            <div class="detail-qty info-qty border radius6 text-center inline-block">
                <?php if( $modify && ( $product->getFlags() & \Aimeos\MShop\Order\Item\Base\Product\Base::FLAG_IMMUTABLE ) == 0 ) : ?>
                    <?php if( $product->getQuantity() > 1 ) : ?>
                        <?php $basketParams = array( 'b_action' => 'edit','unite'=>$unite, 'b_position' => $position, 'b_quantity' => $product->getQuantity() - 1 ); ?>
                        <a class="qty-downs "  href="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, $basketParams, [], $basketConfig ) ); ?>">
                            <i class="fa fa-angle-down"aria-hidden="true"></i>
                        </a>
                    <?php else : ?>
                        &nbsp;
                    <?php endif; ?>

                    <span class="qty-val">

                        <?php if($product->getQuantity()>1000) {
                            $unite="Tonnes";
                            ?>
                        <?= $enc->attr( $product->getQuantity()/1000 ); ?>
                        <?php }?>
                        <?php if($product->getQuantity()===1000) :
                            $unite="Tonne";
                            ?>
                            <?= $enc->attr( $product->getQuantity()/1000 ); ?>
                        <?php elseif ($product->getQuantity()<1000) :
                        ?>
                        <?= $enc->attr( $product->getQuantity() ); ?>
                        <?php endif; ?>

                    </span>
                    <input class="qty-val" type="hidden"
                           name="<?= $enc->attr( $this->formparam( array( 'b_prod', $position, 'quantity' ) ) ); ?>"
                           value="<?= $enc->attr( $product->getQuantity() ); ?>" maxlength="10" required="required"
                    />
                    <input type="hidden" type="text"
                           name="<?= $enc->attr( $this->formparam( array( 'b_prod', $position, 'position' ) ) ); ?>"
                           value="<?= $enc->attr( $position ); ?>"
                    />

                    <?php $basketParams = array( 'b_action' => 'edit', 'unite' => $unite,  'b_position' => $position, 'b_quantity' => $product->getQuantity() + 1 ); ?>
                    <a class="qty-ups " href="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, $basketParams, [], $basketConfig ) ); ?>">
                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                    </a>
                    <h6 class=""><?= $unite ?></h6>
                <?php else : ?>
                    <?= $enc->html( $product->getQuantity() ); ?>
                <?php endif; ?>                           </div>
        </td>
        <td class="product-subtotal" data-title="Total">
                            <span class="amount">
                                <?= $enc->html( sprintf( $priceFormat, $this->number( $product->getPrice()->getValue() * $product->getQuantity(),0 ), $priceCurrency ) ); ?>
                            </span>
        </td>
        <?php if( $modify ) : ?>
            <td class="product-remove">
                <?php if( ( $product->getFlags() & \Aimeos\MShop\Order\Item\Base\Product\Base::FLAG_IMMUTABLE ) == 0 ) : ?>
                    <?php $basketParams = array( 'b_action' => 'delete', 'b_position' => $position, 'unite'=>$unite ); ?>
                    <a class="remove"
                       href="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, $basketParams, [], $basketConfig ) ); ?> "><i class="fa fa-times"></i></a>
                <?php endif; ?>
            </td>
        <?php endif; ?>

    </tr>

    <?php endforeach; ?>

    </tbody>


</table>
