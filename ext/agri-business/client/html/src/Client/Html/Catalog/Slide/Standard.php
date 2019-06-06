<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Catalog\Slide;


/**
 * Default implementation of catalog search HTML client
 *
 * @package Client
 * @subpackage Html
 */
class Standard
    extends \Aimeos\Client\Html\Catalog\Base
    implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
    private $subPartPath = 'client/html/catalog/slide/standard/subparts';
    private $subPartNames = [];

    private $tags = [];
    private $expire;
    private $view;

    public function getSubClient( $type, $name = null )
    {
        return $this->createSubClient( 'catalog/slide/' . $type, $name );
    }
    public function modifyBody( $content, $uid )
    {
        $content = parent::modifyBody( $content, $uid );

        return $this->replaceSection( $content, $this->getView()->csrf()->formfield(), 'catalog.slide.csrf' );
    }

    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }

    public function process()
    {
        $context = $this->getContext();
        $view = $this->getView();

        try
        {
            $site = $context->getLocale()->getSite()->getCode();
            $params = $this->getClientParams( $view->param() );

            $context->getSession()->set( 'aimeos/catalog/slide/params/last/' . $site, $params );

            parent::process();
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->slideErrorList = $view->get( 'slideErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->slideErrorList = $view->get( 'slideErrorList', [] ) + $error;
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->slideErrorList = $view->get( 'slideErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->slideErrorList = $view->get( 'slideErrorList', [] ) + $error;
            $this->logException( $e );
        }
    }

    public function getBody($uid = '')
    {
        $prefixes = array( 'f', 'l' );
        $context = $this->getContext();

        $confkey = 'client/html/catalog/slide';

        if( ( $html = $this->getCached( 'body', $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();
     $tplconf = 'client/html/catalog/slide/standard/template-body';
            $default = 'catalog/slide/body-standard.php';

            try
            {
                $html = '';
                foreach( $this->getSubClients() as $subclient ) {
                    $html .= $subclient->setView( $view )->getBody( $uid );
                }
                $view->listBody = $html;

                $html = $view->render( $this->getTemplatePath( $tplconf, $default ) );
                $this->setCached( 'body', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

                return $html;
            }
            catch( \Aimeos\Client\Html\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
                $view->listErrorList = $view->get( 'listErrorList', [] ) + $error;
            }
            catch( \Aimeos\Controller\Frontend\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
                $view->listErrorList = $view->get( 'listErrorList', [] ) + $error;
            }
            catch( \Aimeos\MShop\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
                $view->listErrorList = $view->get( 'listErrorList', [] ) + $error;
            }
            catch( \Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
                $view->listErrorList = $view->get( 'listErrorList', [] ) + $error;
                $this->logException( $e );
            }

            $html = $view->render( $this->getTemplatePath( $tplconf, $default ) );
        }
        else
        {
            $html = $this->modifyBody( $html, $uid );
        }

        return $html;
        // TODO: Implement getBody() method.
    }
    public function getHeader( $uid = '' )
    {
        $prefixes = array( 'f','l' );
        $confkey = 'client/html/catalog/slide';


        if( ( $html = $this->getCached( 'header', $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();

            $tplconf = 'client/html/catalog/slide/standard/template-header';
            $default = 'catalog/slide/header-standard.php';

            try
            {
                if( !isset( $this->view ) ) {
                    $view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
                }

                $output = '';
                foreach( $this->getSubClients() as $subclient ) {
                    $output .= $subclient->setView( $view )->getHeader( $uid );
                }
                $view->slideHeader = $output;

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

    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {
        //dd('sdf');
        $catId = $view->param('id');
        $view->catId = $catId;

        return $view;
    }
}
