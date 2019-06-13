<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 09/04/2019
 * Time: 16:43
 */

namespace App\Http\Controllers;


class AccountController extends Controller
{
    public function indexAction(){
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'account-index' );
        return view('shop::account.index', $params);
    }
    public function componentAction(){
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'account-components' );
        return view('shop::account.composants', $params);
    }
    public function clientAction(){
        return view('shop::account.clientlte');
    }
}
