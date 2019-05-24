<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();

$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );

$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );

$basketConfig = $this->config( 'client/html/basket/standard/url/config', [] );
$basketSite = $this->config( 'client/html/basket/standard/url/site' );

$basketParams = ( $basketSite ? ['site' => $basketSite] : [] );


$jsonTarget = $this->config( 'client/jsonapi/url/target' );
$jsonController = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$jsonAction = $this->config( 'client/jsonapi/url/action', 'options' );
$jsonConfig = $this->config( 'client/jsonapi/url/config', [] );


/// Price format with price value (%1$s) and currency (%2$s)
$priceFormat = $this->translate( 'client', '%1$s %2$s' );


?>
    <div class="col-md-5 col-sm-5 col-xs-12" data-jsonurl="<?= $enc->attr( $this->url( $jsonTarget, $jsonController, $jsonAction, $basketParams, [], $jsonConfig ) ); ?>">
        <div class="mini-cart-box mini-cart1 pull-right">
            <a class="mini-cart-link" href="cart.html">
                <span class="title18 color"><i class="fas fa-truck"></i></span>
                <span class="mini-cart-number">0 Item - <span class="color">$ 0.000</span></span>
            </a>
            <div class="mini-cart-content text-left">
                <h2 class="title18 color">(2) ITEMS IN MY CART</h2>
                <div class="list-mini-cart-item">
                    <div class="product-mini-cart table">
                        <div class="product-thumb">
                            <a href="detail.html" class="product-thumb-link"><img alt="" src="images/product/fruit_01.jpg"></a>
                            <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><a href="#">Aurore Grape</a></h3>
                            <div class="product-price">
                                <ins><span>$400.00</span></ins>
                                <del><span>$520.00</span></del>
                            </div>
                            <div class="product-rate">
                                <div class="product-rating" style="width:100%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="product-mini-cart table">
                        <div class="product-thumb">
                            <a href="detail.html" class="product-thumb-link"><img alt="" src="images/product/fruit_02.jpg"></a>
                            <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><a href="#">Conconut Chips</a></h3>
                            <div class="product-price">
                                <ins><span>$400.00</span></ins>
                                <del><span>$520.00</span></del>
                            </div>
                            <div class="product-rate">
                                <div class="product-rating" style="width:100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mini-cart-total  clearfix">
                    <strong class="pull-left title18">TOTAL</strong>
                    <span class="pull-right color title18">$800.00</span>
                </div>
                <div class="mini-cart-button">
                    <a class="mini-cart-view shop-button" href="#">View cart </a>
                    <a class="mini-cart-checkout shop-button" href="#">Checkout</a>
                </div>
            </div>
        </div>
    </div>
