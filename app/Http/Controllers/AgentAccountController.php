<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 28/05/2019
 * Time: 16:37
 */

namespace App\Http\Controllers;


class AgentAccountController extends Controller
{
    public function controlAction(){
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'account-index' );
        return view('shop::account.index', $params);
    }
}
