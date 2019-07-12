<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 04/07/2019
 * Time: 13:33
 */

namespace Aimeos\Client\Html\Common\Decorator;


class HistoryDecorator  extends \Aimeos\Client\Html\Common\Decorator\Base implements Iface
{
    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {
        $view = parent::addData( $view, $tags, $expire );
        $context = $this->getContext();
        $view->context = $context;
        return $view;
    }
}
