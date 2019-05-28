<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 27/03/2019
 * Time: 15:01
 */

$enc = $this->encoder();

$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );
$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );
$basketConfig = $this->config( 'client/html/basket/standard/url/config', [] );

$checkoutTarget = $this->config( 'client/html/checkout/standard/url/target' );
$checkoutController = $this->config( 'client/html/checkout/standard/url/controller', 'checkout' );
$checkoutAction = $this->config( 'client/html/checkout/standard/url/action', 'index' );
$checkoutConfig = $this->config( 'client/html/checkout/standard/url/config', [] );

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );
if( isset( $this->standardBasket ) )
{
    $price = $this->standardBasket->getPrice();
    $priceValue = $price->getValue();
    $priceService = $price->getCosts();
    $priceRebate = $price->getRebate();
    //$precision = $price->getPrecision();
    $priceTaxflag = $price->getTaxFlag();
    $priceCurrency = $this->translate( 'currency', $price->getCurrencyId() );
}
$priceFormat = $this->translate( 'client', '%1$s %2$s' );
$priceTaxvalue = '0.00';

?>

    <div class="content-cart-checkout woocommerce" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>">
        <h2 class="title30 font-bold text-uppercase">Ma cargaison</h2>
        <?php if( isset( $this->standardBasket ) ) : ?>
        <form method="POST" action="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, [], [], $basketConfig ) ); ?>">
            <div class="table-responsive">
                <?= $this->csrf()->formfield(); ?>
                <?= $this->partial(
                /** client/html/basket/standard/summary/detail
                 * Location of the detail partial template for the basket standard component
                 *
                 * To configure an alternative template for the detail partial, you
                 * have to configure its path relative to the template directory
                 * (usually client/html/templates/). It's then used to display the
                 * product detail block in the basket standard component.
                 *
                 * @param string Relative path to the detail partial
                 * @since 2017.01
                 * @category Developer
                 */
                    $this->config( 'client/html/basket/standard/summary/detail', 'common/summary/detail-standard.php' ),
                    array(
                        'summaryEnableModify' => true,
                        'summaryBasket' => $this->standardBasket,
                        'summaryTaxRates' => $this->get( 'standardTaxRates', [] ),
                        'summaryErrorCodes' => $this->get( 'standardErrorCodes', [] ),

                    )
                ); ?>
            </div>
        </form>
        <?php $modify=true; endif; ?>

    </div>

<div class="cart-collaterals">
    <div class="cart_totals ">
        <h2>Totaux Cargaison</h2>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr class="cart-subtotal">
                    <th>Sous-total</th>
                    <td>
                        <strong class="amount">
                            <?=  $enc->html( sprintf( $priceFormat,$this->number( $priceValue, 0 ), $priceCurrency)) ; ?>
                        </strong>
                    </td>
                </tr>
                <tr class="shipping">
                    <th>Livraison</th>
                    <td>
                        <strong class="list-none" id="shipping_method">
                            <label for="shipping_method_0_local_delivery">
                                <?=  $enc->html( sprintf( $priceFormat,$this->number( $priceService, 0 ), $priceCurrency)) ; ?></label>
                        </strong>
                    </td>
                </tr>
                <tr class="order-total">
                    <th>Total</th>
                    <td>
                        <strong>
                            <span class="amount">
                                <?= $enc->html( sprintf( $priceFormat, $this->number( $priceValue + $priceService + $priceTaxvalue, 0 ), $priceCurrency ) ); ?>
                            </span>
                        </strong>
                    </td>
                        <?php if( $modify )  ?>
                    <td class="action"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="wc-proceed-to-checkout">
            <?php if( $this->get( 'standardCheckout', false ) === true ) : ?>
                <a class="checkout-button button alt wc-forward bg-color"
                   href="<?= $enc->attr( $this->url( $checkoutTarget, $checkoutController, $checkoutAction, [], [], $checkoutConfig ) ); ?>">
                    Procéder à l'achat</a>
            <?php else : ?>
                <a class="checkout-button button alt wc-forward bg-color"
                   href="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, array( 'b_check' => 1 ), [], $basketConfig ) ); ?>">
                    Vérifier avant l'achat</a>
            <?php endif; ?>
        </div>
    </div>
</div>
