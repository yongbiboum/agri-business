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
Route::get('/admin', function(){
    echo "Hello Admin";
})->middleware('Admin');

Route::match( array( 'GET', 'POST' ), '/agent', array(
    'as' => 'control_account',
    'uses' => 'ControlAccountController@indexAction'
))->middleware('auth','Agent');

Route::match( array( 'GET', 'POST' ), '/comptepro', array(
    'as' => 'producteur_account',
    'uses' => 'ProdAccountController@indexAction'
))->middleware('auth','Producteur');

Route::match( array( 'GET', 'POST' ), '/compte', array(
    'as' => 'aimeos_shop_account',
    'uses' => 'AccountController@indexAction'
))->middleware('auth','Client');
