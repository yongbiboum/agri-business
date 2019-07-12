<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();
$orderItems = $this->get( 'listsOrderItems', [] );


/** client/html/account/history/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2014.03
 * @category Developer
 * @see client/html/account/history/url/controller
 * @see client/html/account/history/url/action
 * @see client/html/account/history/url/config
 */
$accountTarget = $this->config( 'client/html/account/history/url/target' );

/** client/html/account/history/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2014.03
 * @category Developer
 * @see client/html/account/history/url/target
 * @see client/html/account/history/url/action
 * @see client/html/account/history/url/config
 */
$accountController = $this->config( 'client/html/account/history/url/controller', 'account' );

/** client/html/account/history/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2014.03
 * @category Developer
 * @see client/html/account/history/url/target
 * @see client/html/account/history/url/controller
 * @see client/html/account/history/url/config
 */
$accountAction = $this->config( 'client/html/account/history/url/action', 'history' );

/** client/html/account/history/url/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  client/html/<clientname>/url/config = array( 'absoluteUri' => true )
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2014.03
 * @category Developer
 * @see client/html/account/history/url/target
 * @see client/html/account/history/url/controller
 * @see client/html/account/history/url/action
 * @see client/html/url/config
 */
$accountConfig = $this->config( 'client/html/account/history/url/config', [] );


/// Date format with year (Y), month (m) and day (d). See http://php.net/manual/en/function.date.php
$dateformat = $this->translate( 'client', 'd-m-Y H:i ' );
/// Order status (%1$s) and date (%2$s), e.g. "received at 2000-01-01"
$attrformat = $this->translate( 'client', '%1$s at %2$s' );

?>
<?php $this->block()->start( 'account/history/list' ); ?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/compte">Mon Compte</a></li>
        <li class="active">Mes Commandes</li>
    </ol>
</div>
<?php if( !empty( $orderItems ) ) :
    ;?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Historique des commandes</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if( empty( $orderItems ) === false ) : ?>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">Num</th>
                    <th>Produit(s)</th>
                    <th>Date de commande </th>
                    <th>Etat de la commande </th>
                    <th>Paiement </th>
                    <th>Livraison </th>
                    <th style="width: 40px">Détails</th>
                </tr>
                <?php

                foreach( $orderItems as $id => $orderItem ) :
                    $name = ' ';
                    $order = \Aimeos\MShop\Factory::createManager( $this->context, 'order' )->getItem($orderItem->getId());
                    $orderBaseItem = \Aimeos\MShop\Factory::createManager( $this->context, 'order/base' )->getItem( $order->getBaseId(), ['order/base/product'] );
                    $orderProductItems = $orderBaseItem->getProducts();
                    foreach ($orderProductItems as $it => $prod):
                        $names = $prod->getName();
                        $name = $name.' |'.$names ;
                    endforeach;
                    ?>
                <?php $params = array( 'his_action' => 'order', 'his_id' => $id ); ?>
                <tr>

                    <td><?= $orderItem->getId()?></td>
                    <td><?= $name ;?></td>
                    <td><?= date_create( $orderItem->getTimeCreated() )->format( $dateformat ) ;?></td>
                    <td>
                        <?php
                        switch ($orderItem->getPaymentStatus()){
                            case 5 : $etat = "75%" ;
                                break;
                            case 6 : $etat = "90%" ;
                                break;
                        }
                        switch ($orderItem->getDeliveryStatus()){
                            case 1 : $etat = "20%" ;
                            break;
                            case 2 : $etat = "40%" ;
                            break;
                            case 3 : $etat = "60%" ;
                            break;
                            case 4 : $etat = "100%" ;
                        }


                        ?>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?= $etat?>"></div>
                        </div>
                    </td>
                    <td><?php if( ( $date = $orderItem->getDatePayment() ) !== null ) : ?>
                            <?php $code = 'pay:' . $orderItem->getPaymentStatus(); $paystatus = $this->translate( 'mshop/code', $code ); ?>
                            <?= $enc->html( sprintf( $attrformat, $paystatus, date_create( $date )->format( $dateformat ) ), $enc::TRUST ); ?>
                        <?php endif; ?>
                    </td>
                    <td>	<?php if( ( $date = $orderItem->getDateDelivery() ) !== null ) : ?>
                            <?php $code = 'stat:' . $orderItem->getDeliveryStatus(); $status = $this->translate( 'mshop/code', $code ); ?>
                            <?= $enc->html( sprintf( $attrformat, $status, date_create( $date )->format( $dateformat ) ), $enc::TRUST ); ?>
                        <?php endif; ?>
                    </td>
                    <td> <a href="<?=route("commandes",$params)?>">
                            <img src="/packages/assets/images/visualise.jpg" alt="" width="40px" class="">
                        </a>
                    </td>
                </tr>
              <?php endforeach;?>
              <?php endif;?>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php $this->block()->stop(); ?>
<?= $this->block()->get( 'account/history/list' ); ?>
