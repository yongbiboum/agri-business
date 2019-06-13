<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2014
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Account\Composants\Favoris;


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
    private $subPartPath = 'client/html/account/composants/favoris/standard/subparts';
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
            $view->favoriteErrorList = $view->get( 'favoriteErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->favoriteErrorList = $view->get( 'favoriteErrorList', [] ) + $error;
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->favoriteErrorList = $view->get( 'favoriteErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->favoriteErrorList = $view->get( 'favoriteErrorList', [] ) + $error;
            $this->logException( $e );
        }

        $tplconf = 'client/html/account/composants/favoris/standard/template-body';
        $default = 'account/composants/favoris.php';

        return $view->render( $view->config( $tplconf, $default ) );
    }



    public function getSubClient( $type, $name = null )
    {
        return $this->createSubClient( 'account/composants/favoris' . $type, $name );
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
            $view->favoriteErrorList = $view->get( 'favoriteErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->favoriteErrorList = $view->get( 'favoriteErrorList', [] ) + $error;
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->favoriteErrorList = $view->get( 'favoriteErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->favoriteErrorList = $view->get( 'favoriteErrorList', [] ) + $error;
            $this->logException( $e );
        }
    }


    protected function getListItems( array $ids, $userId, $typeId )
    {
        $context = $this->getContext();
        $manager = \Aimeos\MShop\Factory::createManager( $context, 'customer/lists' );

        $search = $manager->createSearch();
        $expr = array(
            $search->compare( '==', 'customer.lists.parentid', $userId ),
            $search->compare( '==', 'customer.lists.refid', $ids ),
            $search->compare( '==', 'customer.lists.domain', 'product' ),
            $search->compare( '==', 'customer.lists.typeid', $typeId ),
        );
        $search->setConditions( $search->combine( '&&', $expr ) );

        $items = [];
        foreach( $manager->searchItems( $search ) as $item ) {
            $items[$item->getRefId()] = $item;
        }

        return $items;
    }


    protected function addFavorites( array $ids, $userId )
    {
        $context = $this->getContext();
        $manager = \Aimeos\MShop\Factory::createManager( $context, 'customer/lists' );

        $typeManager = \Aimeos\MShop\Factory::createManager( $context, 'customer/lists/type' );
        $typeId = $typeManager->findItem( 'favorite', [], 'product' )->getId();

        $listItems = $this->getListItems( $ids, $userId, $typeId );

        $item = $manager->createItem();
        $item->setDomain( 'product' );
        $item->setParentId( $userId );
        $item->setTypeId( $typeId );
        $item->setStatus( 1 );

        foreach( $ids as $id )
        {
            if( !isset( $listItems[$id] ) )
            {
                $item->setId( null );
                $item->setRefId( $id );

                $item = $manager->saveItem( $item );
                $manager->moveItem( $item->getId() );
            }
        }
    }


    /**
     * Removes product favorite references from the customer
     *
     * @param array $ids List of product IDs
     * @param string $userId Unique customer ID
     */
    protected function deleteFavorites( array $ids, $userId )
    {
        $listIds = [];
        $context = $this->getContext();
        $manager = \Aimeos\MShop\Factory::createManager( $context, 'customer/lists' );

        $typeManager = \Aimeos\MShop\Factory::createManager( $context, 'customer/lists/type' );
        $typeId = $typeManager->findItem( 'favorite', [], 'product' )->getId();

        $listItems = $this->getListItems( $ids, $userId, $typeId );

        foreach( $ids as $id )
        {
            if( isset( $listItems[$id] ) ) {
                $listIds[] = $listItems[$id]->getId();
            }
        }

        $manager->deleteItems( $listIds );
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
     * Returns the sanitized page from the parameters for the product list.
     *
     * @param \Aimeos\MW\View\Iface $view View instance with helper for retrieving the required parameters
     * @return integer Page number starting from 1
     */
    protected function getProductListPage( \Aimeos\MW\View\Iface $view )
    {
        $page = (int) $view->param( 'fav_page', 1 );
        return ( $page < 1 ? 1 : $page );
    }


    /**
     * Returns the sanitized page size from the parameters for the product list.
     *
     * @param \Aimeos\MW\View\Iface $view View instance with helper for retrieving the required parameters
     * @return integer Page size
     */
    protected function getProductListSize( \Aimeos\MW\View\Iface $view )
    {
        /** client/html/account/favorite/size
         * The number of products shown in a list page for favorite products
         *
         * Limits the number of products that is shown in the list pages to the
         * given value. If more products are available, the products are split
         * into bunches which will be shown on their own list page. The user is
         * able to move to the next page (or previous one if it's not the first)
         * to display the next (or previous) products.
         *
         * The value must be an integer number from 1 to 100. Negative values as
         * well as values above 100 are not allowed. The value can be overwritten
         * per request if the "l_size" parameter is part of the URL.
         *
         * @param integer Number of products
         * @since 2014.09
         * @category User
         * @category Developer
         * @see client/html/catalog/lists/size
         */
        $defaultSize = $this->getContext()->getConfig()->get( 'client/html/account/favorite/size', 9 );

        $size = (int) $view->param( 'fav-size', $defaultSize );
        return ( $size < 1 || $size > 100 ? $defaultSize : $size );
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
