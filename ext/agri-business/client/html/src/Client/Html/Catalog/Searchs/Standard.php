<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Catalog\Searchs;

class Standard
    extends \Aimeos\Client\Html\Catalog\Base
    implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{

    private $subPartPath = 'client/html/catalog/searchs/standard/subparts';

    private $subPartNames = [];

    private $tags = [];
    private $expire;
    private $view;

    public function getBody( $uid = '' )
    {
        $prefixes = array( 'f','l' );
        $context = $this->getContext();

        $confkey = 'client/html/catalog/searchs';

        if( ( $html = $this->getCached( 'body',   $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();
            $tplconf = 'client/html/catalog/searchs/standard/template-body';
            $default = 'catalog/searchs/body-standard.php';

            try
            {
                if( !isset( $this->view ) ) {
                    $view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
                }

                $output = '';
                foreach( $this->getSubClients() as $subclient ) {
                    $output .= $subclient->setView( $view )->getBody( $uid );
                }
                $view->searchsBody = $output;

                $html = $view->render( $view->config( $tplconf, $default ) );
                $this->setCached( 'body',$uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

                return $html;
            }
            catch( \Aimeos\Client\Html\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
                $view->searchsErrorList = $view->get( 'searchsErrorList', [] ) + $error;
            }
            catch( \Aimeos\Controller\Frontend\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
                $view->searchsErrorList = $view->get( 'searchsErrorList', [] ) + $error;
            }
            catch( \Aimeos\MShop\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
                $view->searchsErrorList = $view->get( 'searchsErrorList', [] ) + $error;
            }
            catch( \Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
                $view->searchsErrorList = $view->get( 'searchsErrorList', [] ) + $error;
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
        $confkey = 'client/html/catalog/searchs';


        if( ( $html = $this->getCached( 'header', $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();
            $tplconf = 'client/html/catalog/searchs/standard/template-header';
            $default = 'catalog/searchs/header-standard.php';

            try
            {
                if( !isset( $this->view ) ) {
                    $view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
                }

                $output = '';
                foreach( $this->getSubClients() as $subclient ) {
                    $output .= $subclient->setView( $view )->getHeader( $uid );
                }
                $view->searchsHeader = $output;

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

        return $this->createSubClient( 'catalog/searchs/' . $type, $name );
    }

    public function modifyBody( $content, $uid )
    {
        $content = parent::modifyBody( $content, $uid );

        return $this->replaceSection( $content, $this->getView()->csrf()->formfield(), 'catalog.searchs.csrf' );
    }

    public function process()
    {
        $context = $this->getContext();
        $view = $this->getView();

        try
        {
            $site = $context->getLocale()->getSite()->getCode();
            $params = $this->getClientParams( $view->param() );

            $context->getSession()->set( 'aimeos/catalog/searchs/params/last/' . $site, $params );

            parent::process();
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->searchsErrorList = $view->get( 'searchsErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->searchsErrorList = $view->get( 'searchsErrorList', [] ) + $error;
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->searchsErrorList = $view->get( 'searchsErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->searchsErrorList = $view->get( 'searchsErrorList', [] ) + $error;
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
        //$this->addMetaItems( $text, $expire, $tags );
       // dd('sger');
        $searchs = $this->get($view->param('f_search'));
        $view->input = $searchs ;
        $view->catalogProducts = !empty($this->createList($view)) ? $this->createList($view) : 'no';

        return $view;

    }

    public function get($expr){
        if(!isset($expr)) return '';
        return ($expr);
    }
    public function createList($view){

        $list = [];
        $context = $this->getContext();
        $config = $context->getConfig();
        $domains = $config->get( 'client/html/catalog/suggest/domains', ['text'] );
        $input = $view->param( 'f_search' );

        $langid = $context->getLocale()->getLanguageId();
        $controller = \Aimeos\Controller\Frontend\Factory::createController( $context, 'product' );

        $size = $config->get( 'client/html/catalog/suggest/size', 24 );


        if( $config->get( 'client/html/catalog/suggest/usecode', false ) )
        {
            $filter = $controller->createFilter( null, '+', 0, $size );

            $filter->setConditions( $filter->combine( '&&', [
                $filter->compare( '=~', 'product.code', $input ),
                $filter->getConditions(),
            ] ) );

            $list += $controller->searchItems( $filter, $domains );
        }

        $count = count( $list );

        if( $count < $size )
        {
            $filter = $controller->createFilter( null, '+', 0, $size - $count );

            $filter->setConditions( $filter->combine( '&&', [
                $filter->compare( '>', $filter->createFunction( 'index.text:relevance', ['default', $langid, $input] ), 0 ),
                $filter->getConditions(),
            ] ) );

            $list += $controller->searchItems( $filter, $domains );
        }

/*

        $manager = \Aimeos\MShop\Factory::createManager( $this->getContext(), 'product' );
        $search = $manager -> createSearch(true);
        $expr = array(
            $search->compare( '~=', 'product.label', $text ),
            $search->getConditions(),
            //$search->compare( '>=', 'product.mtime', '2012-01-01 00:00:00' ),
        );
        $search->setConditions( $search->combine( '&&', $expr ));
        $list=$manager->searchItems( $search ,$domains );


        $size = $config->get( 'client/html/catalog/suggest/size', 24 );

        $controller = \Aimeos\Controller\Frontend\Factory::createController( $context, 'product' );


        $input = $view->param( 'f_search' );
        $langid = $context->getLocale()->getLanguageId();

        $filter = $controller->createFilter( null, '+', 0, $size  );

        $filter->setConditions( $filter->combine( '&&', [
            $filter->compare( '>', $filter->createFunction( 'index.text:relevance', ['default', $langid, $text] ), 0 ),
            $filter->getConditions(),
        ] ) );
        $domains = $config->get( 'client/html/catalog/suggest/domains', ['text'] );

        $lists =  $controller->searchItems( $filter, $domains );
*/
        return ($list);
    }

}
