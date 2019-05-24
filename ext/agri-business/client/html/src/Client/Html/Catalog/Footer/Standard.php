<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Catalog\Footer;


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
    private $subPartPath = 'client/html/catalog/footer/standard/subparts';
    private $subPartNames = [];

public function getSubClient( $type, $name = null )
    {
        return parent::getSubClient( $type, $name );
    }

    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }

    public function getBody($uid = '')
    {
        $prefixes = array( 'f', 'l' );
        $context = $this->getContext();

        $confkey = 'client/html/catalog/footer';

        if( ( $html = $this->getCached( 'body', $uid, $prefixes, $confkey ) ) === null )
        {
            $view = $this->getView();
     $tplconf = 'client/html/catalog/footer/standard/template-body';
            $default = 'catalog/footer/body-standard.php';

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
                $view->footerErrorList = $view->get( 'footerErrorList', [] ) + $error;
            }
            catch( \Aimeos\Controller\Frontend\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
                $view->footerErrorList = $view->get( 'footerErrorList', [] ) + $error;
            }
            catch( \Aimeos\MShop\Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
                $view->footerErrorList = $view->get( 'footerErrorList', [] ) + $error;
            }
            catch( \Exception $e )
            {
                $error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
                $view->footerErrorList = $view->get( 'footerErrorList', [] ) + $error;
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
}
