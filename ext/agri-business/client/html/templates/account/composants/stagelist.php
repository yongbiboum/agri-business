<?php
$enc = $this->encoder();
$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );

$composant = $this->composant;?>
<div class="shop-pagibar clearfix">
    <?php switch ($composant) {
        case 'commandes' :?>
            <h2 class="title30 color text-center">Mes Commandes </h2>
        <?php  break;
        case "demandes" :?>
            <h2 class="title30 color text-center">Demandes de produits </h2>
            <?php break;
        case "favoris" :?>
            <h2 class="title30 color text-center">Produits favoris </h2> <?php break;
        case "historique" :?>
            <h2 class="title30 color text-center">Historique transactions </h2>
            <?php  break;
        case "infos" :?>
            <h2 class="title30 color text-center">Informations personnelles </h2>
            <?php break;
        case "livraisons" :?>
            <h2 class="title30 color text-center">Livraisons </h2>
            <?php break;
        case "adresses" :?>
            <h2 class="title30 color text-center">Mes adresses  </h2>
            <?php break;
        case "reductions" :?>
            <h2 class="title30 color text-center">Mes bons de reductions </h2>
            <?php break;
        default :?>
            <h2 class="title30 color text-center"> </h2>
        <?php }?>

</div>
