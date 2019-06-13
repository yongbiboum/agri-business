<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2014
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Account\Composants\Infos;


/**
 * Default implementation of account favorite HTML client.
 *
 * @package Client
 * @subpackage Html
 */
class Standard
    extends \Aimeos\Client\Html\Common\Client\Factory\Base
    implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
    private $subPartPath = 'client/html/account/composants/infos/standard/subparts';
    private $subPartNames = [];
    private $view;


    public function getBody( $uid = '' )
    {
        $context = $this->getContext();
        $view = $this->getView();

        try
        {
            if( !isset( $this->view ) ) {
                $view = $this->view = $this->getObject()->addData( $view );
            }

            $html = '';
            foreach( $this->getSubClients() as $subclient ) {
                $html .= $subclient->setView( $view )->getBody( $uid );
            }
            $view->favoriteBody = $html;
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->infosErrorList = $view->get( 'infosErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->infosErrorList = $view->get( 'infosErrorList', [] ) + $error;
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->infosErrorList = $view->get( 'infosErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->infosErrorList = $view->get( 'infosErrorList', [] ) + $error;
            $this->logException( $e );
        }

        $tplconf = 'client/html/account/composants/infos/standard/template-body';
        $default = 'account/composants/infos.php';

        return $view->render( $view->config( $tplconf, $default ) );
    }



    public function getSubClient( $type, $name = null )
    {
        return $this->createSubClient( 'account/composants/infos' . $type, $name );
    }


    /**
     * Processes the input, e.g. store given values.
     * A view must be available and this method doesn't generate any output
     * besides setting view variables.
     */
    public function process()
    {
        $view = $this->getView();
        $context = $this->getContext();
        $userId = $context->getUserId();
        $ids = (array) $view->param( 'fav_id', [] );

        try
        {
            if( $userId != null && !empty( $ids ) )
            {
                switch( $view->param( 'fav_action' ) )
                {
                    case 'add':
                        $this->addFavorites( $ids, $userId ); break;
                    case 'delete':
                        $this->deleteFavorites( $ids, $userId ); break;
                }
            }

            parent::process();
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->infosErrorList = $view->get( 'infosErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->infosErrorList = $view->get( 'infosErrorList', [] ) + $error;
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->infosErrorList = $view->get( 'infosErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->infosErrorList = $view->get( 'infosErrorList', [] ) + $error;
            $this->logException( $e );
        }
    }

    /**
     * Returns the list of sub-client names configured for the client.
     *
     * @return array List of HTML client names
     */
    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }



    /**
     * Sets the necessary parameter values in the view.
     *
     * @param \Aimeos\MW\View\Iface $view The view object which generates the HTML output
     * @param array &$tags Result array for the list of tags that are associated to the output
     * @param string|null &$expire Result variable for the expiration date of the output (null for no expiry)
     * @return \Aimeos\MW\View\Iface Modified view object
     */
    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {

        $total = 0;
        $productIds = [];
        $context = $this->getContext();

        $typeManager = \Aimeos\MShop\Factory::createManager( $context, 'customer/lists/type' );
        $typeItem = $typeManager->findItem( 'favorite', [], 'product' );

        $size = $this->getProductListSize( $view );
        $current = $this->getProductListPage( $view );
        $last = ( $total != 0 ? ceil( $total / $size ) : 1 );


        $manager = \Aimeos\MShop\Factory::createManager( $context, 'customer/lists' );

        $search = $manager->createSearch();
        $expr = array(
            $search->compare( '==', 'customer.lists.parentid', $context->getUserId() ),
            $search->compare( '==', 'customer.lists.typeid', $typeItem->getId() ),
            $search->compare( '==', 'customer.lists.domain', 'product' ),
        );
        $search->setConditions( $search->combine( '&&', $expr ) );
        $search->setSortations( array( $search->sort( '-', 'customer.lists.position' ) ) );
        $search->setSlice( ( $current - 1 ) * $size, $size );

        $view->favoriteListItems = $manager->searchItems( $search, [], $total );

        $default = array( 'text', 'price', 'media' );
        $domains = $context->getConfig()->get( 'client/html/account/favorite/domains', $default );

        foreach( $view->favoriteListItems as $listItem ) {
            $productIds[] = $listItem->getRefId();
        }

        $controller = \Aimeos\Controller\Frontend\Factory::createController( $context, 'product' );

        $view->favoriteProductItems = $controller->getItems( $productIds, $domains );
        $view->favoritePageFirst = 1;
        $view->favoritePagePrev = ( $current > 1 ? $current - 1 : 1 );
        $view->favoritePageNext = ( $current < $last ? $current + 1 : $last );
        $view->favoritePageLast = $last;
        $view->favoritePageCurr = $current;
        //dd($view->favoriteProductItems);

        return parent::addData( $view, $tags, $expire );
    }
}
