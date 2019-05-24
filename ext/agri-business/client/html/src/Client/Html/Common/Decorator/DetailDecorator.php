<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 16/05/2019
 * Time: 18:22
 */

namespace Aimeos\Client\Html\Common\Decorator;


class DetailDecorator
{
    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {
        $view = parent::addData( $view, $tags, $expire );
        $context = $this->getContext();
        $config = $context->getConfig();
        $prodid = $view->param( 'd_prodid' );

    }
}
