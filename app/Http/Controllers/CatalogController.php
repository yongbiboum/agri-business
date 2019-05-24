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
}
