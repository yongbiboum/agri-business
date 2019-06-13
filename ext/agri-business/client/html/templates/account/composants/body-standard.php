<?php
$enc = $this->encoder();
$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );

$composant = $this->composant;?>

<div class="col-md-9 col-sm-8 col-xs-12" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>" >
    <div class="main-content-shop">
        <?php include('stagelist.php'); ?>
        <div class="product-grid-view">
            <div class="row">

                <?php switch ($composant) {
                 case 'commandes' :
                 include( 'commandes.php' );
                 break;
                 case "demandes" :
                 include( 'demandes.php' );
                 break;
                 case "favoris" :
                     include('favoris.php');
                     //  include( $aibody['account/favorite']);
               // include( '../favorite/body-standard.php' );
                 break;
                 case "historique" :
                 include( 'historique.php' );
                 break;
                 case "infos" :
                 include( 'infos.php' );
                 break;
                 case "livraisons" :
                 include( 'livraisons.php' );
                 break;
                 case "adresses" :
                 include( 'adresses.php' );
                 break;
                 case "reductions" :
                 include( 'reductions.php' );
                 break;
                 default :
                 include( "accueil.php" );
                 }?>
            </div>
        </div>
    </div>
    <?php //include('pagination-standard.php') ?>
</div>
