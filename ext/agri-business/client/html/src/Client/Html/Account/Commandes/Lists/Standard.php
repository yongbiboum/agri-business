<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Account\Commandes\Lists;


class Standard
    extends \Aimeos\Client\Html\Common\Client\Factory\Base
    implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
    private $subPartPath = 'client/html/account/commandes/lists/standard/subparts';
    private $subPartNames = [];


    public function getBody( $uid = '' )
    {
        $view = $this->getView();

        if( $view->param( 'his_action', 'list' ) != 'list' ) {
            return '';
        }

        $html = '';
        foreach( $this->getSubClients() as $subclient ) {
            $html .= $subclient->setView( $view )->getBody( $uid );
        }
        $view->listsBody = $html;

        $tplconf = 'client/html/account/commandes/lists/standard/template-body';
        $default = 'account/commandes/list-body-standard.php';

        return $view->render( $view->config( $tplconf, $default ) );
    }


    public function getSubClient( $type, $name = null )
    {

        return $this->createSubClient( 'account/commandes/lists/' . $type, $name );
    }


    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }

    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {

        $context = $this->getContext();
        $manager = \Aimeos\MShop\Factory::createManager( $context, 'order' );


        $search = $manager->createSearch( true );
        $expr = array(
            $search->getConditions(),
            $search->compare( '==', 'order.base.customerid', $context->getUserId() ),
        );
        $search->setConditions( $search->combine( '&&', $expr ) );
        $search->setSortations( array( $search->sort( '-', 'order.id' ) ) );


        $view->listsOrderItems = $manager->searchItems( $search );

        $view->context = $context;
        return parent::addData( $view, $tags, $expire );
    }
}
