<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Catalog\Shop;


/**
 * Default implementation of catalog detail section HTML clients.
 *
 * @package Client
 * @subpackage Html
 */
class Standard
    extends \Aimeos\Client\Html\Catalog\Base
    implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
    private $subPartPath = 'client/html/catalog/shop/standard/subparts';
    private $subPartNames = [];

    private $tags = [];
    private $expire;
    private $view;

    public function getBody( $uid = '' )
    {
        $prefixes = array( 'f','l' );
        $context = $this->getContext();

        $confkey = 'client/html/catalog/shop';

        if( ( $html = $this->getCached( 'body',   $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();

            $tplconf = 'client/html/catalog/shop/standard/template-body';
            $default = 'catalog/shop/body-standard.php';

            //dd($this->catid);
            try
            {
                if( !isset( $this->view ) ) {
                    $view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
                }

                $output = '';
                foreach( $this->getSubClients() as $subclient ) {
                    $output .= $subclient->setView( $view )->getBody( $uid );
                }
                $view->shopBody = $output;

                $html = $view->render( $view->config( $tplconf, $default ) );
                $this->setCached( 'body', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

                return $html;
            }
            catch( \Aimeos\Client\Html\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
                $view->shopErrorList = $view->get( 'shopErrorList', [] ) + $error;
            }
            catch( \Aimeos\Controller\Frontend\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
                $view->shopErrorList = $view->get( 'shopErrorList', [] ) + $error;
            }
            catch( \Aimeos\MShop\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
                $view->shopErrorList = $view->get( 'shopErrorList', [] ) + $error;
            }
            catch( \Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
                $view->shopErrorList = $view->get( 'shopErrorList', [] ) + $error;
                $this->logException( $e );
            }

            $html = $view->render( $view->config( $tplconf, $default ) );
        }
        else
        {
            $html = $this->modifyBody( $html, $uid );
        }

        return $html;
    }

    public function getHeader( $uid = '' )
    {
        $prefixes = array( 'f','l' );
        $confkey = 'client/html/catalog/shop';


        if( ( $html = $this->getCached( 'header', $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();

            $tplconf = 'client/html/catalog/shop/standard/template-header';
            $default = 'catalog/shop/header-standard.php';

            try
            {
                if( !isset( $this->view ) ) {
                    $view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
                }

                $output = '';
                foreach( $this->getSubClients() as $subclient ) {
                    $output .= $subclient->setView( $view )->getHeader( $uid );
                }
                $view->shopHeader = $output;

                $html = $view->render( $view->config( $tplconf, $default ) );
                $this->setCached( 'header', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

                return $html;
            }
            catch( \Exception $e )
            {
                $this->logException( $e );
            }
        }
        else
        {
            $html = $this->modifyHeader( $html, $uid );
        }

        return $html;
    }


    public function getSubClient( $type, $name = null )
    {
        return $this->createSubClient( 'catalog/shop/' . $type, $name );
    }


    public function modifyBody( $content, $uid )
    {
        $content = parent::modifyBody( $content, $uid );

        return $this->replaceSection( $content, $this->getView()->csrf()->formfield(), 'catalog.shop.csrf' );
    }

    public function process()
    {
        $context = $this->getContext();
        $view = $this->getView();

        try
        {
            $site = $context->getLocale()->getSite()->getCode();
            $params = $this->getClientParams( $view->param() );

            $context->getSession()->set( 'aimeos/catalog/shop/params/last/' . $site, $params );

            parent::process();
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->shopErrorList = $view->get( 'shopErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->shopErrorList = $view->get( 'shopErrorList', [] ) + $error;
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->shopErrorList = $view->get( 'shopErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->shopErrorList = $view->get( 'shopErrorList', [] ) + $error;
            $this->logException( $e );
        }
    }


    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }

    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {
        $view->context = $this->getContext();
        $manager = \Aimeos\MShop\Factory::createManager( $this->getContext(), 'catalog' );
        $search = $manager->createSearch();
       // dd($catid);
        $catlist = $manager->searchItems( $search,['media','text','price'],$total);
        $view->catalogList =$catlist ;
       // $this->addMetaItems( collect($catlist)->first(), $expire, $tags );

        $catid = $view->param( 'id' );
//dd($catid);
        if($catid !== null ) {
            //dd($catid);
           // $domains = array( 'media', 'price', 'text', 'attribute', 'product', 'product/property' );
            $manager = \Aimeos\MShop\Factory::createManager( $this->getContext(), 'catalog' );

            $tree=$manager->getTree($catid,['media','text'],\Aimeos\MW\Tree\Manager\Base::LEVEL_TREE)->getNode()->getChildren();

            $domains = array( 'media', 'price', 'text', 'attribute', 'product', 'product/property' );
            $catalogItem = $manager->getItem( $catid, $domains );

            $view->catalogList = $tree;

            $this->addMetaItems( $catalogItem, $expire, $tags );
        }

        //dd($catlist);


        /*
        $catlogItem = $manager->getItem($catlist[14]->getId(),['media','text','price']);
        $manager2 = \Aimeos\Controller\Frontend\Factory::createController(  $this->getContext(), 'product' );
        $filter = $manager2->createFilter( 'relevance', '+', 0, 48 );
        $filter = $manager2->addFilterCategory( $filter, $catlist[14]->getId() );
        $products = $manager2->searchItems( $filter, ['attribute', 'media', 'price', 'text'],$total );
            */
        //dd($products);

        //dd($total);

        //dd($catlogItem->getCode());
        //dd(collect($catlogItem->getRefItems("text"))->first()->getLabel());//->first()->getUrl());
        /*
        $catcode = $view->param( 'code' );
        $catid = $view->param( 'id' );
        $view->context = $this->getContext();
        $domains = array( 'media', 'price', 'text', 'attribute', 'product', 'product/property' );

        $manager2 = \Aimeos\MShop\Factory::createManager( $this->getContext(), 'product' );


        $catlist = $manager->searchItems( $search,['media','text','price'],$total);



        $list = $manager -> getPath($catid);
        $catalogItem = $manager->getItem( $catid, $domains );
        $catalogItem1 = $manager->getItem( $catid, $domains );
        $manager2 = \Aimeos\Controller\Frontend\Factory::createController(  $this->getContext(), 'product' );
        $filter = $manager2->createFilter( 'relevance', '+', 0, 48 );
        $filter = $manager2->addFilterCategory( $filter, $catid );
        $products = $manager2->searchItems( $filter, ['attribute', 'media', 'price', 'text'] );
        $manager2 = \Aimeos\MShop\Factory::createManager( $this->getContext(), 'product' );
        $this->addMetaItems( $catalogItem, $expire, $tags );
        $view->catalogProducts = $products ;
        $searchs = $view->param('f_sort');
        if($searchs!== null ) {
            $view->catalogProducts = $this->createList($searchs);
        }

        $view->catalogItem = $catalogItem ;
        //dd(collect($catalogItem->getRefItems('product'))->first());
        $tree=$manager->getTree($catid,[],\Aimeos\MW\Tree\Manager\Base::LEVEL_TREE)->getNode()->getChildren();
        $view->catid=$catid;
        //dd($tree);
        $view->tree = $tree;
        //dd(collect($tree)->first()); */
        return $view;

    }
    public function createList($text){
        $manager = \Aimeos\MShop\Factory::createManager( $this->getContext(), 'product' );
        $search = $manager -> createSearch(true);
        $expr = array(
            $search->compare( '~=', 'product.label', $text ),
            $search->getConditions(),
            //$search->compare( '>=', 'product.mtime', '2012-01-01 00:00:00' ),
        );
        $search->setConditions( $search->combine( '&&', $expr ));
        $list=$manager->searchItems( $search );
        return ($list);
    }
    public function getStockItems( array $productCodes )
    {
        $context = $this->getContext();

        $default = array( 'stock.productcode' => '+', 'stock.type.code' => '+' );
        $sortKeys = $context->getConfig()->get( 'client/html/catalog/stock/sort', $default );

        $siteConfig = $context->getLocale()->getSite()->getConfig();
        $cntl = \Aimeos\Controller\Frontend\Factory::createController( $context, 'stock' );

        $filter = $cntl->createFilter()->setSlice( 0, count( $productCodes ) );
        $filter = $cntl->addFilterCodes( $filter, $productCodes );

        if( isset( $siteConfig['stocktype'] ) ) {
            $filter = $cntl->addFilterTypes( $filter, [$siteConfig['stocktype']] );
        }

        $sortations = [];
        foreach( $sortKeys as $key => $dir ) {
            $sortations[] = $filter->sort( $dir, $key );
        }

        $filter->setSortations( $sortations );

        return $cntl->searchItems( $filter );
    }

    public function get($expr){
        if(!isset($expr)) return ' ';
        return ($expr);
    }
}
