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

Route::get('/index', 'ProductsController@home')->name('index');
Route::get('/sale', 'ProductsController@watchOnSale')->name('sale');
Route::get('/cart', 'ProductsController@showCart')->name('cart');
//Route::get('/{gender}/{brand}', 'ProductsController@watchesByCategory')->name('watchCategory');

Auth::routes();
//kad zajebava logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::group(['prefix' => 'admin'], function () {
    Route::resource('watches', 'AdminProductsController');
});
Route::post('/addImages', 'AdminProductsController@addImages')->name('addImages');
