<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Catalog\Categories\Catsearch;

class Standard
    extends \Aimeos\Client\Html\Catalog\Base
    implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
    private $subPartPath = 'client/html/catalog/categories/catsearch/standard/subparts';
    private $subPartNames = [];


    public function getBody( $uid = '' )
    {
        $view = $this->getView();

        $html = '';
        foreach( $this->getSubClients() as $subclient ) {
            $html .= $subclient->setView( $view )->getBody( $uid );
        }
        $view->itemsBody = $html;

        $tplconf = 'client/html/catalog/categories/catsearch/standard/template-body';
        $default = 'catalog/categories/catsearch-body-standard.php';

        return $view->render( $this->getTemplatePath( $tplconf, $default ) );
    }


    public function getHeader( $uid = '' )
    {
        $view = $this->getView();

        $html = '';
        foreach( $this->getSubClients() as $subclient ) {
            $html .= $subclient->setView( $view )->getHeader( $uid );
        }
        $view->itemsHeader = $html;
        $tplconf = 'client/html/catalog/categories/catsearch/standard/template-header';
        $default = 'catalog/categories/catsearch-header-standard;php';

        return $view->render( $this->getTemplatePath( $tplconf, $default ) );
    }


    public function getSubClient( $type, $name = null )
    {

        return $this->createSubClient( 'catalog/categories/catsearch/' . $type, $name );
    }


    protected function getSubClientNames()
    {
        return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
    }

    public function modifyBody( $content, $uid )
    {
        $content = parent::modifyBody( $content, $uid );

        return $this->replaceSection( $content, $this->getView()->csrf()->formfield(), 'catalog.categories.catsearch.csrf' );
    }

}
