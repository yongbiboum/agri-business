<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 15/07/2019
 * Time: 09:00
 */

namespace App\Http\Controllers;


class AccueilController extends Controller
{
    public function listAction()
    {
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'catalog-list' );
        return view('shop::catalog.list', $params);
    }
    public function indexAction()
    {
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'accueil' );
        return view('shop::catalog.welcome', $params);
    }
}
