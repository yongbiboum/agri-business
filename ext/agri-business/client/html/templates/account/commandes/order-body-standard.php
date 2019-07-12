<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();

$accountTarget = $this->config( 'client/html/account/history/url/target' );
$accountController = $this->config( 'client/html/account/history/url/controller', 'account' );
$accountAction = $this->config( 'client/html/account/history/url/action', 'history' );
$accountConfig = $this->config( 'client/html/account/history/url/config', [] );

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', array( 'absoluteUri' => 1 ) );

$addresses = $this->summaryBasket->getAddresses();
$services = $this->summaryBasket->getServices();


?>
<?php $this->block()->start( 'account/history/order' ); ?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/compte">Mon Compte</a></li>
        <li><a href="/compte/commande" >Mes Commandes</a></li>
        <li class="active">Détails</li>
    </ol>
</div>

<div class="card" style="padding-left: 20px">
    <div class="card-header">
        <h3 class="card-title">Détails de la commande</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Adresse de facturation</th>
                <th>Adresse de livraison</th>
            </tr>
            <td>
                <?php if( isset( $addresses['payment'] ) ) : ?>
                <?= $this->partial(
                    $this->config( 'client/html/account/history/summary/address', 'common/summary/address-standard.php' ),
                    array( 'address' => $addresses['payment'], 'type' => 'payment' )
                );
                endif; ?>
            </td>
            <td>
                <?php if( isset( $addresses['delivery'] ) ) : ?>
                    <?= $this->partial(
                        $this->config( 'client/html/account/history/summary/address', 'common/summary/address-standard.php' ),
                        array( 'address' => $addresses['delivery'], 'type' => 'delivery' )
                    ); ?>
                <?php else : ?>
                    Identique à l'adresse de facturation
                <?php endif; ?>
            </td>
       </table>
        <table class="table table-bordered">
            <tr>
                <th>Moyen de livraison</th>
                <th>Type paiement </th>
                <th>Code reduction </th>
                <th>Votre Commentaire </th>
            </tr>
            <td >
                <?php if( isset( $services['delivery'] ) ) : ?>
                    <?= $this->partial(
                        $this->config( 'client/html/account/history/summary/service', 'common/summary/service-standard.php' ),
                        array( 'service' => $services['delivery'], 'type' => 'delivery' )
                    ); ?>
                <?php endif; ?>

            </td>
            <td >
                <?php if( isset( $services['payment'] ) ) : ?>
                    <?= $this->partial(
                        $this->config( 'client/html/account/history/summary/service', 'common/summary/service-standard.php' ),
                        array( 'service' => $services['payment'], 'type' => 'payment' )
                    ); ?>
                <?php endif; ?>

            </td>
            <td >
                <?php if( ( $coupons = $this->summaryBasket->getCoupons() ) !== [] ) : ?>
                    <ul class="attr-list">
                        <?php foreach( $coupons as $code => $products ) : ?>
                            <li class="attr-item"><?= $enc->html( $code ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    Aucun bon de reduction
                <?php endif; ?>

            </td>
            <td >

            </td>
       </table>

        <table class="table table-bordered">
            <tr>
                <th>Produit</th>
                <th></th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Montant</th>
            </tr>
            <?php foreach ($this->summaryBasket->getProducts() as $id => $p) :?>
            <td>
                <?php  $name = $p->getName();
                if( ( $pos = strpos( $name, "\n" ) ) !== false ) { $name = substr( $name, 0, $pos ); }
                $params = array_merge( $this->param(), ['d_prodid' => $p->getProductId(), 'd_name' => $name] );

                //dd($p->getMediaUrl()); ?>
                <a href="<?= $enc->attr( $this->url( ( $p->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">
                <img src="<?= $enc->attr( $this->content( $p->getMediaUrl() ) ); ?>" width="100" alt="">
                </a>
            </td>
            <td>
                <a href="<?= $enc->attr( $this->url( ( $p->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">
                <p><?= $p->getName(); ?></p>
                <p><?= "Produit numéro : ".$p->getProductCode(); ?></p>
                </a>
            </td>
            <td>
                <?= $p->getQuantity(); ?>
            </td>
                <td>
                <?=  $this->number($p->getPrice()->getValue(),0)."  FCFA"; ?>
            </td>
                <td>
                <?php $total= (int)$p->getQuantity()*(int)$p->getPrice()->getValue(); ?>
                <?= $this->number($total,0)."  FCFA"; ?>
            </td>
            <?php endforeach; ?>
        </table>
    </div>
    <!-- /.card-header -->


    </div>

</div>
<?php $this->block()->stop(); ?>
<?= $this->block()->get( 'account/history/order' ); ?>
