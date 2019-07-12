<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::match( array( 'GET', 'POST' ), 'catlist/{code}', array(
    'as' => 'agri_categorie',
    'uses' => 'CatalogController@categoriesAction'
));
Route::match( array( 'GET', 'POST' ), 'categorie/{code}', array(
    'as' => 'agri_categories',
    'uses' => 'CatalogController@listsAction'
));

Route::match( array( 'GET', 'POST' ), '/search', array(
    'as' => 'recherche',
    'uses' => 'CatalogController@Action'
));

Route::match( array( 'GET', 'POST' ), '/agent', array(
    'as' => 'control_account',
    'uses' => 'AgentAccountController@controlAction'
))->middleware('auth','agent');

Route::match( array( 'GET', 'POST' ), '/compte_producteur', array(
    'as' => 'producteur_account',
    'uses' => 'ProdAccountController@indexAction'
))->middleware('auth','producteur');
Route::match( array( 'GET', 'POST' ), '/compte_producteur/{composant}', array(
    'as' => 'producteur_composant',
    'uses' => 'ProdAccountController@indexAction'
))->middleware('auth','producteur');

Route::match( array( 'GET', 'POST' ), '/compte', array(
    'as' => 'aimeos_shop_account',
    'uses' => 'AccountController@indexAction'
))->middleware('auth','client');
Route::match( array( 'GET', 'POST' ), '/compte/action', array(
    'as' => 'account_components',
    'uses' => 'AccountController@componentAction'
))->middleware('auth','client');
Route::match( array( 'GET', 'POST' ), '/compte/commande', array(
    'as' => 'commandes',
    'uses' => 'AccountController@commandesAction'
))->middleware('auth','client');

Route::match( array( 'GET', 'POST' ), '/client', array(
    'as' => 'client',
    'uses' => 'AccountController@clientAction'
))->middleware('auth','client');
Route::match( array( 'GET', 'POST' ), '/checkout', array(
    'as' => 'aimeos_shop_checkout',
    'uses' => 'Aimeos\Shop\Controller\CheckoutController@indexAction'
))->middleware('auth','client');
Route::match( array( 'GET', 'POST' ), '/compte/demande_produit', array(
    'as' => 'demande',
    'uses' => 'AccountController@demandeAction'
))->middleware('auth','client');
