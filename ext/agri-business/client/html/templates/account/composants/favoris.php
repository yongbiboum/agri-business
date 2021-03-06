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
 <div class="breadcrumbs">
     <ol class="breadcrumb">
         <li><a href="/list">Mon Compte</a></li>
         <li class="active">Mes Favoris</li>
     </ol>
 </div>
 <div align="center" style="margin-bottom: 10px ">
     <img width="100px" height="100px" src="/packages/assets/images/coeur.jpg" alt="" class="">
 </div>
 <br><br>
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
                <?php else: ?>
                <h3 class=""> Aucun produit dans vos favoris </h3>
                    <img src="/packages/assets/images/shop/vide.png" alt="" class="">
                <h3 class=""> Allez dans le menu des produits pour selectionner vos favoris</h3>
                <?php endif; ?>
