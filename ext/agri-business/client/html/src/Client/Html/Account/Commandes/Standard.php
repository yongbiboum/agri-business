<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Account\Commandes;


class Standard
    extends \Aimeos\Client\Html\Common\Client\Factory\Base
    implements \Aimeos\Client\Html\Iface
{
    private $subPartPath = 'client/html/account/commandes/standard/subparts';

    private $subPartNames = array( 'lists', 'order' );
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
            $view->historyBody = $html;
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->historyErrorList = $view->get( 'historyErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->historyErrorList = $view->get( 'historyErrorList', [] ) + $error;
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->historyErrorList = $view->get( 'historyErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->historyErrorList = $view->get( 'historyErrorList', [] ) + $error;
            $this->logException( $e );
        }

        $tplconf = 'client/html/account/commandes/standard/template-body';
        $default = 'account/commandes/commandes.php';

        return $view->render( $view->config( $tplconf, $default ) );
    }


    public function getHeader( $uid = '' )
    {
        $view = $this->getView();

        try
        {
            if( !isset( $this->view ) ) {
                $view = $this->view = $this->getObject()->addData( $view );
            }

            $html = '';
            foreach( $this->getSubClients() as $subclient ) {
                $html .= $subclient->setView( $view )->getHeader( $uid );
            }
            $view->historyHeader = $html;

            $tplconf = 'client/html/account/commandes/standard/template-header';
            $default = 'account/commandes/header-standard.php';

            return $view->render( $view->config( $tplconf, $default ) );
        }
        catch( \Exception $e )
        {
            $this->logException( $e );
        }
    }


    public function getSubClient( $type, $name = null )
    {
        return $this->createSubClient( 'account/commandes/' . $type, $name );
    }


    public function process()
    {
        $context = $this->getContext();
        $view = $this->getView();

        try
        {
            parent::process();
        }
        catch( \Aimeos\MShop\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
            $view->historyErrorList = $view->get( 'historyErrorList', [] ) + $error;
        }
        catch( \Aimeos\Controller\Frontend\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
            $view->historyErrorList = $view->get( 'historyErrorList', [] ) + $error;
        }
        catch( \Aimeos\Client\Html\Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
            $view->historyErrorList = $view->get( 'historyErrorList', [] ) + $error;
        }
        catch( \Exception $e )
        {
            $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
            $view->historyErrorList = $view->get( 'historyErrorList', [] ) + $error;
            $this->logException( $e );
        }
    }

    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }
    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {
        return parent::addData( $view, $tags, $expire );
    }
    }

