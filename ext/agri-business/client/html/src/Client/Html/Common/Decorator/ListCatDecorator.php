<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 10/05/2019
 * Time: 10:26
 */
namespace Aimeos\Client\Html\Common\Decorator;

class ListCatDecorator
    extends \Aimeos\Client\Html\Common\Decorator\Base
    implements \Aimeos\Client\Html\Common\Decorator\Iface
{
    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = array(), &$expire = null )
    {
        $view = parent::addData( $view, $tags, $expire );

        // access already added data
        $products = $view->get( 'listsItems', [] );

        // fetch some items from the database

        return $view;
    }
}
