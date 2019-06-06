<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 28/05/2019
 * Time: 16:39
 */

namespace App\Http\Controllers;


class ProdAccountController
{
    public function indexAction(){
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'account-index' );
        return view('shop::account.index', $params);
    }
}
