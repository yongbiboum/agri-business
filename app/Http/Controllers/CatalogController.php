<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 24/05/2019
 * Time: 11:07
 */

namespace App\Http\Controllers;


class CatalogController extends Controller
{
    public function categoriesAction(){
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'catalog-choose' );
        return view('shop::catalog.catlist', $params);
    }
    public function Action()
    {
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'catalog-searchs' );
        return view('shop::catalog.searchs', $params);
    }
    public function listsAction()
    {
        $params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'catalog-list' );
        return view('shop::catalog.list', $params);
    }
}
