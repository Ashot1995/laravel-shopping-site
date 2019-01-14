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

Route::post('contact/contactPost', 'ContactController@contactPost')->name("sendMail");


Route::get('/', "FrontController@index")->name('home');
Route::get('/contact', "FrontController@contact")->name('contact');
Route::get('/about', "FrontController@about")->name('about');
Route::get('/cart', 'FrontController@cart')->name("cart");
Route::get('/product', "FrontController@index")->name('product');

Route::get('/watches/{id?}', "FrontController@product")->name('catalog');
Route::get('/shirts/{id?}', "FrontController@product")->name('shirts');
Route::get('/boots/{id?}', "FrontController@product")->name('boots');
Route::get('/computer/{id?}', "FrontController@product")->name('boots');
Route::get('/phone/{id?}', "FrontController@product")->name('phone');


Route::get('cart/create/{id}', "CartController@store")->name("add");
Route::get('cart/update/{id}', "CartController@update")->name("change");
Route::post('cart/{id?}', 'CartController@destroy');


Route::get('/shirt/{id?}', "FrontController@shirt")->name('shirt');

Auth::routes();

Route::get('/home', "FrontController@index")->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    Route::get('/', function () {
        return view("admin.index");
    })->name("admin.index");

    Route::resource('product', 'ProductsController');
    Route::delete('/product/{id}', 'ProductsController@destroy')->name("productDelete");
    Route::post('/product/create', 'ProductsController@store');
    Route::post('product/update', 'ProductsController@updateSortable');


    Route::resource('category', 'CategoriesController');
    Route::post('category/destroy/{id?}', 'CategoriesController@destroy');
    Route::post('category/{id?}', 'CategoriesController@update');

    Route::resource('about', 'AboutController');
    Route::post('about/{id?}', 'AboutController@destroy');


    Route::resource('users', 'UserController');
    Route::post('users/create', 'UserController@create');
    Route::post('users/create', 'UserController@store')->name("newUser");

    Route::post('users/update/{id}', 'UserController@update')->name("updatek");
    Route::post('users/edit/{id?}', 'UserController@edit');


    Route::resource('menu', 'MenuController');
    Route::post('menu/create', 'MenuController@store')->name('menuCreate');
    Route::post('menu/update', 'MenuController@update')->name('menuUpdate');
    Route::post('menu/destroy/{id?}', 'MenuController@destroy')->name('menuDelete');


});