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
Route::get('/contactUs', 'ProductsController@contactUs')->name('contactUs');
Route::group(['prefix'=> 'watches'], function () {
    Route::get('/sale', 'ProductsController@watchOnSale')->name('sale');
    Route::get('/cart', 'CartController@showCart')->name('cart');
    Route::get('/checkout', 'OrderController@checkout')->name('checkout');
    Route::get('/{gender}/{brand}', 'ProductsController@watchesByCategory')->name('watchCategory');
    Route::get('/{gender}/{brand}/{slug}', 'ProductsController@singleWatch')->name('singleWatch');
});

Route::get('user/{name}', function ($name) {
})->where('name', '[A-Za-z]+');


Auth::routes();
//kad zajebava logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::group(['middleware'=>'admin'],function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('watches', 'AdminProductsController');
        Route::get('/orders', 'OrderController@show_orders')->name('orders');
    });
    Route::post('/addImages', 'AdminProductsController@addImages')->name('addImages');
    Route::delete('/delImage/{id}', 'AdminProductsController@deleteImage')->name('delImage');
    Route::put('/updatePayment/{id}', 'OrderController@updatePayment')->name('updatePayment');

});

Route::group(['middleware'=>'subscriber'],function() {
    Route::post('/storePayment', 'OrderController@storePayment')->name('storePayment');
});

Route::post('/storeComment', 'CommentsController@store')->name('storeComment');
Route::post('/storeReply', 'ReplyController@store')->name('storeReply');
Route::post('/storeOrder', 'OrderController@storeOrder')->name('storeOrder');
Route::post('/addToCart', 'CartController@addToCart')->name('addToCart');
Route::delete('/deleteItem/{id}', 'CartController@deleteItem')->name('deleteItem');
Route::put('/updateCart/{id}', 'CartController@updateCart')->name('updateCart');
Route::post('/contact', 'ProductsController@contact')->name('contact');
Route::put('/likeIt/{id}', 'LikeController@likeIt')->name('likeIt');
Route::put('/likeItR/{id}', 'LikeController@likeItR')->name('likeItR');
Route::put('/dislikeIt/{id}', 'LikeController@dislikeIt')->name('dislikeIt');
Route::put('/dislikeItR/{id}', 'LikeController@dislikeItR')->name('dislikeItR');

