<?php
$enc = $this->encoder();
$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );

$composant = !isset($this->composant) ? null : $this->composant;?>

<div class="col-md-9 col-sm-8 col-xs-12" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>" >
    <div class="main-content-shop">
        <div class="product-grid-view">
            <div class="row">
                <?php if(!is_null($composant)):?>

                <?php switch ($composant) {
                    case 'infos' :
                        include( 'infos.php' );
                        break;
                    case "produits" :
                        include( 'produits.php' );
                        break;
                    case "promotions" :
                        include('promotions.php');
                        break;
                    case "soumission" :
                        include( 'soumission.php' );
                        break;
                    case "ventes" :
                        include( 'ventes.php' );
                        break;
                    case "documents" :
                        include( 'documents.php' );
                        break;
                    case "adresses" :
                        include( 'adresses.php' );
                        break;
                    default :
                        include( "accueil.php" );
                }?>
                <?php else:
                    include( "accueil.php" );
                endif;
                ?>

            </div>
        </div>
    </div>
    <?php //include('pagination-standard.php') ?>
</div>
