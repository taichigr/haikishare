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

// 共通のランディングページ
Route::get('/', 'FrontController@index')->name('top');

// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    // TOPページ
    Route::resource('home', 'HomeController', ['only' => 'index'])->middleware('auth:user');
    // ユーザー側で必要なページ（user/xxxxxx/のページ）。マイページ、プロフィール編集画面
});

// 管理者
Route::namespace('Shop')->prefix('shop')->name('shop.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::resource('/home', 'HomeController', ['only' => 'index'])->middleware('auth:shop');
    // shopマイページ index, edit, update, destroy
    Route::resource('/mypage', 'MypageController', ['except' => ['show', 'create', 'store']])->middleware('auth:shop');
    // shopが出品する商品 create, store, edit, update, destory
    Route::resource('/product', 'ProductController', ['except' => ['index', 'show']])->middleware('auth:shop');

    // // ログイン認証後
    // Route::middleware('auth:shop')->group(function () {

    //     // TOPページ
    //     Route::resource('home', 'HomeController', ['only' => 'index']);

    //     Route::resource('/mypage', 'MypageController')->name('mypage');
    // });
});
