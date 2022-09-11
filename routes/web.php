<?php

use Illuminate\Support\Facades\Route;

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

//login
Route::get('login','App\Http\Controllers\LoginController@index')->name('login');
Route::post('loginPostFront','App\Http\Controllers\LoginController@loginPostFront')->name('loginPostFront');
Route::get('login','App\Http\Controllers\LoginController@index')->name('login');
Route::post('loginPostFront','App\Http\Controllers\LoginController@loginPostFront')->name('loginPostFront');
Route::get('register','App\Http\Controllers\LoginController@register')->name('register');
Route::post('registerPostFront','App\Http\Controllers\LoginController@registerPostFront')->name('registerPostFront');


Route::middleware('isLoginFront')->group(function (){
    Route::get('logout','App\Http\Controllers\LoginController@logout')->name('logout');
    Route::get('order','App\Http\Controllers\OrderController@index')->name('order.index');
    Route::post('order','App\Http\Controllers\OrderController@create')->name('order.create');
    Route::post('payment','App\Http\Controllers\OrderController@payment')->name('order.payment');
    Route::get('user/setting','App\Http\Controllers\HomepageController@userSetting')->name('user.setting');
});
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function (){
    Route::get('giris','App\Http\Controllers\Backend\AuthController@login')->name('login');
    Route::post('giris','App\Http\Controllers\Backend\AuthController@loginPost')->name('login.post');

});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function (){
    Route::get('panel',[\App\Http\Controllers\Backend\DashboardController::class,'index'])->name('dashboard');
    Route::get('cikis','App\Http\Controllers\Backend\AuthController@logout')->name('logout');
    Route::get('kategori_ekle','App\Http\Controllers\CategoryController@index')->name('kategori.ekle');
    Route::post('kategori_ekle','App\Http\Controllers\CategoryController@create')->name('kategori.ekle.post');
    Route::get('kategori_liste','App\Http\Controllers\CategoryController@list')->name('kategori.liste');
    Route::get('kategori_sil/{id}','App\Http\Controllers\CategoryController@delete')->name('kategori.sil');
    Route::get('kategori_güncelle/{id}','App\Http\Controllers\CategoryController@update')->name('kategori.güncelle');
    Route::post('kategori_güncelle/{id}','App\Http\Controllers\CategoryController@updatePost')->name('kategori.güncelle.post');
    Route::get('urun_ekle','App\Http\Controllers\ProductController@index')->name('ürün.ekle');
    Route::post('urun_ekle','App\Http\Controllers\ProductController@create')->name('ürün.ekle.post');
    Route::get('urun_liste','App\Http\Controllers\ProductController@list')->name('ürün.liste');
    Route::get('/switch','App\Http\Controllers\ProductController@switch')->name('switch');
    Route::get('urun_sil/{id}','App\Http\Controllers\ProductController@delete')->name('ürün.sil');
    Route::get('urun_guncelle/{id}','App\Http\Controllers\ProductController@update')->name('ürün.güncelle');
    Route::post('urun_guncelle/{id}','App\Http\Controllers\ProductController@updatePost')->name('ürün.güncelle.post');

});

//frontend
Route::get('/','App\Http\Controllers\HomepageController@index')->name('homepage');
Route::get('single/{id}/{slug}','App\Http\Controllers\HomepageController@single')->name('single');
Route::get('category/single/{id}/{slug}','App\Http\Controllers\HomepageController@categorySingle')->name('categorySingle');
Route::get('cart', 'App\Http\Controllers\CartController@cart')->name('cart');
Route::get('add-to-cart', 'App\Http\Controllers\CartController@addToCart')->name('add.to.cart');
Route::patch('update-cart', 'App\Http\Controllers\CartController@update')->name('update.cart');
Route::get('remove-from-cart', 'App\Http\Controllers\CartController@remove')->name('remove.from.cart');
