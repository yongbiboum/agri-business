<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 16/05/2019
 * Time: 18:26
 */

namespace Aimeos\Client\Html\Common\Decorator;


class BasketDecorator  extends \Aimeos\Client\Html\Common\Decorator\Base implements Iface
{
    public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
    {
        $view = parent::addData( $view, $tags, $expire );
        $context = $this->getContext();
        $config = $context->getConfig();
        $qte = (int)$view->param('b_prod')["0"]["quantity"];
        $unite = $view->param( 'unite' );
        $view->unite = $unite;
      //  dd($view->param('b_prod')["0"]["quantity"]);
        return $view;
    }
}
