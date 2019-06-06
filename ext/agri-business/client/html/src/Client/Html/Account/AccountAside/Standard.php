<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */

namespace Aimeos\Client\Html\Account\AccountAside;

class Standard
    extends \Aimeos\Client\Html\Common\Client\Factory\Base
    implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
    private $subPartPath = 'client/html/account/accountaside/standard/subparts';

    private $subPartNames = [];
    private $tags = [];
    private $expire;
    private $view;

    public function getBody( $uid = '' )
    {
        $prefixes = array( 'd' );
        $context = $this->getContext();

        $confkey = 'client/html/account/accountaside';

        if( ( $html = $this->getCached( 'body',$this->catid ?? $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();

            $tplconf = 'client/html/account/accountaside/standard/template-body';
            $default = 'account/accountaside/body-standard.php';

            try
            {
                if( !isset( $this->view ) ) {
                    $view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
                }

                $output = '';
                foreach( $this->getSubClients() as $subclient ) {
                    $output .= $subclient->setView( $view )->getBody( $uid );
                }
                $view->accountasidesideBody = $output;

                $html = $view->render( $view->config( $tplconf, $default ) );
                $this->setCached( 'body', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

                return $html;
            }
            catch( \Aimeos\Client\Html\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
                $view->accountasideErrorList = $view->get( 'accountasideErrorList', [] ) + $error;
            }
            catch( \Aimeos\Controller\Frontend\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
                $view->accountasideErrorList = $view->get( 'accountasideErrorList', [] ) + $error;
            }
            catch( \Aimeos\MShop\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
                $view->accountasideErrorList = $view->get( 'accountasideErrorList', [] ) + $error;
            }
            catch( \Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
                $view->accountasideErrorList = $view->get( 'accountasideErrorList', [] ) + $error;
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
        $prefixes = array( 'd' );
        $confkey = 'client/html/account/accountaside';


        if( ( $html = $this->getCached( 'header', $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();
            $tplconf = 'client/html/account/accountaside/standard/template-header';
            $default = 'account/accountaside/header-standard.php';
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
        return $this->createSubClient( 'account/accountaside/' . $type, $name );
    }



    public function modifyBody( $content, $uid )
    {
        $content = parent::modifyBody( $content, $uid );

        return $this->replaceSection( $content, $this->getView()->csrf()->formfield(), 'account.accountaside.csrf' );
    }

    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }
    public function addData(\Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null)
    {

        $context = $this->getContext();
        $view->context = $context;
        $view->banniere = "/packages/assets";
        //$catid = is_null($view->fsort) ? 1:$view->param( 'id' );
        //$view->catid = $catid;
        $manager = \Aimeos\MShop\Factory::createManager( $this->getContext(), 'account' );
        $search = $manager->createSearch();
        $catlist = $manager->searchItems( $search,['media','text','price'],$total);
        $tree=$manager->getTree(2,['media','text'],\Aimeos\MW\Tree\Manager\Base::LEVEL_TREE)->getNode()->getChildren();
        $view->tree = $tree;
        //dd($tree);

        return parent::addData($view, $tags, $expire); // TODO: Change the autogenerated stub
    }

}
