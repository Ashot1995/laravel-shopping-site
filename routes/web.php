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


Route::get('/', "FrontController@index")->name('home');
Route::get('/contact', "FrontController@contact")->name('contact');
Route::get('/about', "FrontController@about")->name('about');
Route::get('/cart', 'FrontController@cart')->name("cart");
Route::get('/product', "FrontController@index")->name('product');
Route::get('/watches/{id?}', "FrontController@product")->name('watches');
Route::get('/shirts/{id?}', "FrontController@product")->name('shirts');
Route::get('/boots/{id?}', "FrontController@product")->name('boots');
Route::get('/computer/{id?}', "FrontController@product")->name('boots');






Route::get('/shirt/{id?}', "FrontController@shirt")->name('shirt');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view("admin.index");
    })->name("admin.index");


    Route::resource('product', 'ProductsController');
    Route::post('product/{id?}', 'ProductsController@destroy');
    Route::post('product/create','ProductsController@store');


    Route::resource('category', 'CategoriesController');
    Route::post('category/{id?}', 'CategoriesController@destroy');
    Route::post('category/{id?}', 'CategoriesController@update');

    Route::resource('about', 'AboutController');
    Route::post('about/{id?}', 'AboutController@destroy');


    Route::get('/cart/{id?}', "CartController@store")->name('cart');

    Route::get('/cart/', "CartController@show")->name('cart');
    Route::post('cart/{id?}', 'CartController@destroy');



    Route::resource('menu', 'MenuController');
    Route::post('menu/create', 'MenuController@store')->name('menuCreate');
    Route::post('menu/update', 'MenuController@update')->name('menuUpdate');
});