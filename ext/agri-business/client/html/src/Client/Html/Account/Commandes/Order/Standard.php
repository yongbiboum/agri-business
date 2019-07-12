<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Account\Commandes\Order;

class Standard
    extends \Aimeos\Client\Html\Common\Client\Summary\Base
    implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{

    private $subPartPath = 'client/html/account/commandes/order/standard/subparts';
    private $subPartNames = [];


    public function getBody( $uid = '' )
    {
        $view = $this->getView();

        if( $view->param( 'his_action' ) != 'order' ) {
            return '';
        }

        $html = '';
        foreach( $this->getSubClients() as $subclient ) {
            $html .= $subclient->setView( $view )->getBody( $uid );
        }
        $view->orderBody = $html;

        $tplconf = 'client/html/account/commandes/order/standard/template-body';
        $default = 'account/commandes/order-body-standard.php';

        return $view->render( $view->config( $tplconf, $default ) );
    }


    public function getSubClient( $type, $name = null )
    {
        return $this->createSubClient( 'account/commandes/order/' . $type, $name );
    }


    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }

    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {
        if( ( $orderId = $view->param( 'his_id', null ) ) !== null )
        {
            $context = $this->getContext();

            $manager = \Aimeos\MShop\Factory::createManager( $context, 'order' );
            $controller = \Aimeos\Controller\Frontend\Factory::createController( $context, 'basket' );

            $search = $manager->createSearch( true );
            $expr = array(
                $search->getConditions(),
                $search->compare( '==', 'order.id', $orderId ),
                $search->compare( '==', 'order.base.customerid', $context->getUserId() ),
            );
            $search->setConditions( $search->combine( '&&', $expr ) );

            $orderItems = $manager->searchItems( $search );

            if( ( $orderItem = reset( $orderItems ) ) === false )
            {
                $msg = $view->translate( 'client', 'Order with ID "%1$s" not found' );
                throw new \Aimeos\Client\Html\Exception( sprintf( $msg, $orderId ) );
            }


            if( $orderItem->getPaymentStatus() >= $this->getDownloadPaymentStatus() ) {
                $view->summaryShowDownloadAttributes = true;
            }

            $view->summaryBasket = $controller->load( $orderItem->getBaseId() );
            $view->summaryTaxRates = $this->getTaxRates( $view->summaryBasket );
            $view->orderItem = $orderItem;
        }

        return parent::addData( $view, $tags, $expire );
    }
}
