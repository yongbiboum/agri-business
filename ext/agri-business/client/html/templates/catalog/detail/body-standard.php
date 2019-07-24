<?php

$getProductList = function( array $posItems, array $items )
{
    $list = [];

    foreach( $posItems as $id => $posItem )
    {
        if( isset( $items[$id] ) ) {
            $list[$id] = $items[$id];
        }
    }

    return $list;
};

$params = $this->get( 'params', [] );

$enc = $this->encoder();

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );

$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );
$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );
$basketConfig = $this->config( 'client/html/basket/standard/url/config', [] );
$basketSite = $this->config( 'client/html/basket/standard/url/site' );

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

$reqstock = (int) $this->config( 'client/html/basket/require-stock', true );

$prodItems = $this->get( 'detailProductItems', [] );

$propMap = $subPropDeps = $propItems = [];
$attrMap = $subAttrDeps = $mediaItems = [];

if( isset( $this->detailProductItem ) )
{
    $propItems = $this->detailProductItem->getPropertyItems();
    $posItems = $this->detailProductItem->getRefItems( 'product', null, 'default' );

    if( in_array( $this->detailProductItem->getType(), ['bundle', 'select'] ) )
    {
        foreach( $getProductList( $posItems, $prodItems ) as $subProdId => $subProduct )
        {
            $subItems = $subProduct->getRefItems( 'attribute', null, 'default' );
            $subItems += $subProduct->getRefItems( 'attribute', null, 'variant' ); // show product variant attributes as well
            $mediaItems = array_merge( $mediaItems, $subProduct->getRefItems( 'media', 'default', 'default' ) );

            foreach( $subItems as $attrId => $attrItem )
            {
                $attrMap[ $attrItem->getType() ][ $attrId ] = $attrItem;
                $subAttrDeps[ $attrId ][] = $subProdId;
            }

            $propItems = array_merge( $propItems, $subProduct->getPropertyItems() );
        }
    }

    foreach( $propItems as $propId => $propItem )
    {
        $propMap[ $propItem->getType() ][ $propId ] = $propItem;
        $subPropDeps[ $propId ][] = $propItem->getParentId();
    }
}
$favTarget = $this->config( 'client/html/account/favorite/url/target' );
$favController = $this->config( 'client/html/account/favorite/url/controller', 'account' );
$favAction = $this->config( 'client/html/account/favorite/url/action', 'favorite' );
$favConfig = $this->config( 'client/html/account/favorite/url/config', [] );


?>

    <?php if( isset( $this->detailErrorList ) ) : ?>
        <ul class="error-list">
            <?php foreach( (array) $this->detailErrorList as $errmsg ) : ?>
                <li class="error-item"><?= $enc->html( $errmsg ); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


    <?php if( isset( $this->detailProductItem ) ) : ?>
        <?php
        $conf = $this->detailProductItem->getConfig();
        $urls = array(
            'favorite' => $this->url( $favTarget, $favController, $favAction, array( 'fav_action' => 'add', 'fav_id' => $this->detailProductItem->getId() ) + $params, $favConfig ),
        );
        $unit = $this->detailProductItem->getUnite();
        $disabled = '';
        $curdate = date( 'Y-m-d H:i:00' );

        if( ( $startDate = $this->detailProductItem->getDateStart() ) !== null && $startDate > $curdate
            || ( $endDate = $this->detailProductItem->getDateEnd() ) !== null && $endDate < $curdate
        ) {
            $disabled = 'disabled';
        }
        ?>

        <div class="col-md-12 col-sm-12 col-xs-12" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>" >
            <div class="product-detail">
                <div class="row">
                    <?= $this->partial(
                    /** client/html/catalog/detail/partials/image
                     * Relative path to the detail image partial template file
                     *
                     * Partials are templates which are reused in other templates and generate
                     * reoccuring blocks filled with data from the assigned values. The image
                     * partial creates an HTML block for the catalog detail images.
                     *
                     * @param string Relative path to the template file
                     * @since 2017.01
                     * @category Developer
                     */
                        $this->config( 'client/html/catalog/detail/partials/image', 'catalog/detail/image-partial-standard.php' ),
                        array(
                            'productItem' => $this->detailProductItem,
                            'params' => $this->get( 'detailParams', [] ),
                            'mediaItems' => array_merge( $this->detailProductItem->getRefItems( 'media', 'default', 'default' ), $mediaItems )
                        )
                    ); ?>
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="detail-info">
                            <h2 class="title30 font-bold"><?= $enc->html( $this->detailProductItem->getName(), $enc::TRUST ); ?></h2>
                            <h3>Code produit : <?= $enc->html( $this->detailProductItem->getCode() ); ?></h3>
                            <div class="product-price">
                                <?php $prices=$this->detailProductItem->getRefItems( 'price', null, 'default' ); $price = collect($prices)->first()->getValue();
                                $currency = collect($prices)->first()->getCurrencyId();
                                //$text = $this->description ;
                                ?>
                                <span>Prix unitaire</span>
                                <ins class="color">
                                    <span>
                                        <?=$this->number($price,0) ?> <?=$currency ?> </span>
                                </ins>
                            </div>
                            <div class="product-rate">
                                <div class="product-rating" style="width:80%"></div>
                            </div>
                            <?php foreach( $this->detailProductItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
                                <p class="desc" itemprop="description"><?= $enc->html( $textItem->getContent(), $enc::TRUST ); ?></p>
                            <?php endforeach;
                            $basketParams = ( $basketSite ? ['site' =>  $basketSite] : [] );

                            ?>
                            <form method="GET" id="addcart-form" action="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, $basketParams, [], $basketConfig ) ); ?>">
                                <?= $this->csrf()->formfield(); ?>
                                <ul class="list-inline-block wrap-qty-extra">
                                <li>
                                    <div class="detail-qty" >
                                        <a href="#" class="qty-down silver"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                                        <span class="qty-val">1</span><?= $unit?>
                                        <input type="hidden"  <?= $disabled ?>
                                                 name="<?= $enc->attr( $this->formparam( array( 'b_prod', 0, 'quantity' ) ) ); ?>"
                                                 id="qty"
                                                 min="1" max="2147483647" maxlength="10" step="1" required="required" value="1"
                                        />
                                        <a href="#" class="qty-up silver"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-extra-link">

                                        <a href="#" class="addcart-link">Achat</a>
                                        <a href="<?= $urls['favorite'] ?>" class="wishlist-link"><i class="fa fa-heart-o" aria-hidden="true"></i><span>Favoris</span></a>
                                        </div>
                                </li>
                                    <?php if( $basketSite ) : ?>
                                        <input type="hidden" name="<?= $this->formparam( 'site' ) ?>" value="<?= $enc->attr( $basketSite ) ?>" />
                                    <?php endif ?>

                                    </p>
                                    <input type="hidden" value="add"
                                           name="<?= $enc->attr( $this->formparam( 'b_action' ) ); ?>"
                                    />
                                    <input type="hidden"
                                           name="<?= $enc->attr( $this->formparam( array( 'b_prod', 0, 'prodid' ) ) ); ?>"
                                           value="<?= $enc->attr( $this->detailProductItem->getId() ); ?>"
                                    />
                            </ul>
                                </form>

                            <p class="desc info-extra">
                                <label>ID Produit :</label><span class="color"><?= $enc->attr( $this->detailProductItem->getId() ); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Detail -->
            <div class="detail-tabs">
                <div class="title-tab-detail">
                    <ul class="title-tab1 list-inline-block">
                        <li class="active"><a href="#tab1" class="title14" data-toggle="tab" aria-expanded="true">Description</a></li>
                        <li class=""><a href="#tab3" class="title14" data-toggle="tab" aria-expanded="false">Commentaires</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <div class="detail-descript">
                            <h2 class="title30 color">Description du produit</h2>
                            <p class="desc"><?= collect($this->detailProductItem->getRefItems( 'text', 'long' ))->first()->getContent() ?>  </p>
                             </div>
                    </div>
                    <div id="tab3" class="tab-pane">
                        <div class="content-tags-detail">
                            <h3 class="title14">2 Posts pour le produit : <span style="color: #66cc33"> <?= $this->detailProductItem->getName() ?> </span></h3>
                            <ul class="list-none list-tags-review">
                                <li>
                                    <div class="review-author">
                                        <a href="#"><img src="/packages/assets/images/shop/user.png" alt=""></a>
                                    </div>
                                    <div class="review-info">
                                        <p class="review-header"><a href="#"><strong>Jean Marie</strong></a> – Mars 30, 2019:</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div>
                                        <p class="desc">Really a nice stool. It was better than I expected in quality. The color is a rich, honey brown and looks a little lighter than pictured but still a great stool for the money.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="review-author">
                                        <a href="#"><img src="/packages/assets/images/shop/user.png" alt=""></a>
                                    </div>
                                    <div class="review-info">
                                        <p class="review-header"><a href="#"><strong>Gilles Servet</strong></a> – Fevrier 20, 2019:</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:85%"></div>
                                        </div>
                                        <p class="desc">Really a nice stool. It was better than I expected in quality. The color is a rich, honey brown and looks a little lighter than pictured but still a great stool for the money.</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="add-review-form">
                                <h3 class="title14">Ajouter un commentaire</h3>
                                <p>Votre e-mail ne sera pas publié. Champs obligatoires sont marqués *</p>
                                <form class="review-form">
                                    <div>
                                        <label>Pseudo *</label>
                                        <input name="name" id="name" type="text">
                                    </div>
                                    <div>
                                        <label>Email *</label>
                                        <input name="email" id="email" type="text">
                                    </div>
                                    <div>
                                        <label>Votre Note</label>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:100%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <label>Commentaire *</label>
                                        <textarea name="messasge" id="message" cols="30" rows="10"></textarea>
                                    </div>
                                    <div>
                                        <input class="shop-button radius4" value="Submit" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tabs Detail -->
            <div class="related-product">
                <h2 class="title30 font-bold">Produits associés</h2>
                <div class="related-product-slider product-slider">
                    <div class="wrap-item group-navi" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1],[560,2],[768,3],[990,4]]">
                        <?php
                        if (!empty($this->detailProductItem->getRefItems('product'))):
                        foreach ($this->detailProductItem->getRefItems('product') as $id=> $product):
                            $params = array( 'd_name' => $product->getName( 'url' ), 'd_prodid' => $product->getId() );
                            $urlsuggest = $this->url( ($product->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );
                            $productText = $product->getRefItems("text");
                                    foreach ($productText as $id => $ptext):{
                                            if ($ptext->getLabel()=="Variété"){ $variete = $ptext->getContent(); }
                                            if ($ptext->getLabel()=="Localité"){ $localite = $ptext->getContent(); }
                                            if ($ptext->getLabel()=="Détails"){ $Détails = $ptext->getContent(); }
                                            if ($ptext->getLabel()=="Détail"){ $Détails = $ptext->getContent(); }
                                    }
                                    endforeach;
                            $cntl = \Aimeos\Controller\Frontend\Factory::createController( $this->context, 'stock' );
                            $filter = $cntl->addFilterCodes( $cntl->createFilter(), [$product->getCode()] );
                            $stock = $cntl->searchItems( $filter );
                            $stocklevel = (float)collect($stock)->first()->getStockLevel();
                            $unite = 'KG';
                            $unit = $product->getUnite();
                            if ($stocklevel > (float)'1000.0'){
                                $unite = 'Tonnes';
                                $stocklevel = $stocklevel/1000 ;
                            }
                            if($stocklevel==1000){
                                $unite = 'Tonne' ;
                                $stocklevel = $stocklevel/1000 ;
                            }
                            $price = $product->getRefItems( 'price', null, 'default' );
                            $priceUrl= collect($price)->first()->getValue() ;
                            $parame = $this->get( 'params', [] );
                            $urls = array(
                                'favorite' => $this->url( $favTarget, $favController, $favAction, array( 'fav_action' => 'add', 'fav_id' => $product->getId() ) + $parame, $favConfig ),
                            );
                            ?>
                        <div class="item-product item-product-grid">
                            <div class="product-thumb" style="width: 100% ; height: 140px; !important;">
                                <a href="<?= $urlsuggest ?>" class="product-thumb-link rotate-thumb">
                                    <img src="<?= asset(collect($product->getRefItems('media'))->first()->getUrl())?>" alt="">
                                    <img src="<?= asset(collect($product->getRefItems('media'))->first()->getUrl())?>" alt="">
                                </a>
                            </div>
                            <div class="product-info" style="font-family: Roboto ;">
                                <a href="<?= $urlsuggest ?>" class="product-thumb-link rotate-thumb">
                                <h3 style="color: #66cc33;" class="product-title"><?= $enc->html( $product->getName(), $enc::TRUST ); ?></h3>
                                    <h5 >
                                        Stock Actuel : <?= $enc->html( $stocklevel, $enc::TRUST ); ?> <?= $unite ?>
                                    </h5>

                                </a>
                                <div class="product-price">
                                    <ins class="color"><span><?= $this->number($priceUrl,0); ?> FCFA/Kg</span></ins>
                                </div>
                                <div class="flex-lg-column">
                                    <a href="#">
                                    <h5 >
                                        <img style="width: 15px!important;" src="/packages/assets/images/localisation.png" alt="">
                                        <?= $enc->html( $localite, $enc::TRUST ); ?>
                                    </h5>
                                    </a>
                                </div>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:85%"></div>
                                </div>

                                <div class="product-extra-link">
                                    <a href="<?= $urls['favorite'] ?>" class="wishlist-link"><i class="fa fa-heart-o" aria-hidden="true"></i><span>Wishlist</span></a>
                                    <a href="<?= $urlsuggest; ?>" id="achat" class="addcart-link">Achat</a>
                                    </div>
                            </div>
                        </div>
                        <?php endforeach;
                        else:
                        ?>
                        <h5>Aucun produit suggéré</h5>
                    <?php endif;?>
                    </div>
                </div>
            </div>
            <!-- End Related Product -->
        </div>
    <?php endif; ?>
