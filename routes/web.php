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

// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;

Route::get('/home', 'HomeController@index')->name('home');

//ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => false,
    ]);

    //user password reset routes
    Route::post('/password/email', 'Auth\UserForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\UserForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'Auth\UserResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\UserResetPasswordController@showResetForm')->name('password.reset');

    //ログイン認証後
    Route::middleware('auth:user')->group(function () {

        //TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

// 管理者
Route::namespace('Store')->prefix('store')->name('store.')->group(function () {


    //ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => false,
    ]);

    //store password reset routes
    Route::post('/password/email', 'Auth\StoreForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\StoreForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'Auth\StoreResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\StoreResetPasswordController@showResetForm')->name('password.reset');

    //ログイン認証後
    Route::middleware('auth:store')->group(function () {

        //TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        //商品関係ルーティング
        Route::get('/product/new', 'ProductController@new')->name('product.new');
        Route::post('/product', 'ProductController@create')->name('product.create');
        Route::get('/product/index', 'ProductController@index')->name('product.index');
    });
});
