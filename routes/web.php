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

// 商品一覧
Route::get('/product', 'ProductController@index')->name('product.index');
// 商品詳細 ユーザー
Route::get('/product/{product}/detail', 'ProductController@detail')->name('product.detail');



// Route::resource('/product', 'ProductController', ['only' => ['index', 'show']]);


// product
Route::namespace('Product')->prefix('product')->name('product.')->group(function () {
    // 商品一覧
Route::get('/', 'ProductController@index')->name('index');
// 商品詳細 ユーザー
Route::get('/{product}/detail', 'ProductController@detail')->name('detail');
});


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
    Route::resource('/mypage', 'MypageController', ['only' => ['index', 'edit', 'update']])->middleware('auth:user');

    Route::get('/purchased', 'ProductController@purchaseIndex')->name('purchased.index')->middleware('auth:user');

    // 購入
    Route::post('/product/purchase', 'ProductController@purchase')->name('product.purchase')->middleware('auth:user');
    // キャンセル
    Route::post('/product/cancel', 'ProductController@cancel')->name('product.cancel')->middleware('auth:user');

    // 商品一覧画面





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
    // shopマイページ index, edit, update
    Route::resource('/mypage', 'MypageController', ['only' => ['index', 'edit', 'update']])->middleware('auth:shop');
    // shopが出品する商品 create, store, edit, update, destory
    Route::resource('/product', 'ProductController', ['except' => ['index', 'show']])->middleware('auth:shop');
    // 商品詳細
    Route::get('/product/{product}/detail', 'ProductController@detail')->name('product.detail')->middleware('auth:shop');


    // コンビニ側が見るコンビニが出品した商品一覧
    Route::get('/product/sell/{shop}', 'ProductController@sellIndex')->name('sellIndex')->middleware('auth:shop');
    // コンビニが見る購入した商品一覧
    Route::get('/product/sold/{shop}', 'ProductController@soldIndex')->name('soldIndex')->middleware('auth:shop');
    // // ログイン認証後

    // Route::middleware('auth:shop')->group(function () {

    //     // TOPページ
    //     Route::resource('home', 'HomeController', ['only' => 'index']);

    //     Route::resource('/mypage', 'MypageController')->name('mypage');
    // });
});
