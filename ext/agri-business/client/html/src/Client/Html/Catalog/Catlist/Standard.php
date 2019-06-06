<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Catalog\Catlist;


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
    protected $catid;
    private $subPartPath = 'client/html/catalog/catlist/standard/subparts';
    private $subPartNames = [];

    private $tags = [];
    private $expire;
    private $view;

    public function getBody( $uid = '' )
    {
        $prefixes = array( 'f','l' );
        $context = $this->getContext();

        $confkey = 'client/html/catalog/catlist';

        if( ( $html = $this->getCached( 'body',   $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();

            $tplconf = 'client/html/catalog/catlist/standard/template-body';
            $default = 'catalog/catlist/body-standard.php';

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
                $view->catlistBody = $output;

                $html = $view->render( $view->config( $tplconf, $default ) );
                $this->setCached( 'body', $this->catid ?? $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

                return $html;
            }
            catch( \Aimeos\Client\Html\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
                $view->catlistErrorList = $view->get( 'catlistErrorList', [] ) + $error;
            }
            catch( \Aimeos\Controller\Frontend\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
                $view->cztlistErrorList = $view->get( 'catlistErrorList', [] ) + $error;
            }
            catch( \Aimeos\MShop\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
                $view->catlistErrorList = $view->get( 'catlistErrorList', [] ) + $error;
            }
            catch( \Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
                $view->detailErrorList = $view->get( 'catlistErrorList', [] ) + $error;
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
        $confkey = 'client/html/catalog/catlist';


        if( ( $html = $this->getCached( 'header', $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();

            $tplconf = 'client/html/catalog/catlist/standard/template-header';
            $default = 'catalog/catlist/header-standard.php';

            try
            {
                if( !isset( $this->view ) ) {
                    $view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
                }

                $output = '';
                foreach( $this->getSubClients() as $subclient ) {
                    $output .= $subclient->setView( $view )->getHeader( $uid );
                }
                $view->categoriesHeader = $output;

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
        return $this->createSubClient( 'catalog/catlist/' . $type, $name );
    }


    public function modifyBody( $content, $uid )
    {
        $content = parent::modifyBody( $content, $uid );

        return $this->replaceSection( $content, $this->getView()->csrf()->formfield(), 'catalog.catlist.csrf' );
    }

    public function process()
    {
        $context = $this->getContext();
        $view = $this->getView();

        try
        {
            $site = $context->getLocale()->getSite()->getCode();
            $params = $this->getClientParams( $view->param() );
            if( ( !isset( $params['f_catid'] ) || $params['f_catid'] == '' )
                && ( $value = $context->getConfig()->get( 'client/html/catalog/catlist/catid-default', '' ) ) != ''
            ) {
                $params['f_catid'] = $value;
            }

            $context->getSession()->set( 'aimeos/catalog/catlist/params/last/' . $site, $params );

            parent::process();
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->catlistErrorList = $view->get( 'catlistErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->catlistErrorList = $view->get( 'catlistErrorList', [] ) + $error;
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->catlistErrorList = $view->get( 'catlistErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->catlistErrorList = $view->get( 'catlistErrorList', [] ) + $error;
            $this->logException( $e );
        }
    }


    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }

    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {

        $catcode = $view->param( 'code' );
        $catid = $view->param( 'id' );
        $view->context = $this->getContext();
        $domains = array( 'media', 'price', 'text', 'attribute', 'product', 'product/property' );

        $view->catalogProducts = [] ;
        $manager = \Aimeos\MShop\Factory::createManager( $this->getContext(), 'catalog' );

        $view->catid =$catid;
        $view->code =$catcode;


        $list = $manager -> getPath($catid);
        $catalogItem = $manager->getItem( $catid, $domains );

        $manager2 = \Aimeos\Controller\Frontend\Factory::createController(  $this->getContext(), 'product' );

        $filter = $manager2->createFilter( 'relevance', '+', 0, 48 );
        $filter = $manager2->addFilterCategory( $filter, $catid );

        $products = $manager2->searchItems( $filter, ['attribute', 'media', 'price', 'text'] );

        $this->addMetaItems( $catalogItem, $expire, $tags );

        $view->catalogProducts = $products ;


        $view->catalogItem = $catalogItem ;
        //dd(collect($catalogItem->getRefItems('product'))->first());
        $tree=$manager->getTree($catid,[],\Aimeos\MW\Tree\Manager\Base::LEVEL_TREE)->getNode()->getChildren();
        $view->catid=$catid;
        //dd($tree);
        $view->tree = $tree;
        //dd(collect($tree)->first());
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
}
