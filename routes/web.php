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
//registration with google
Route::get('login/{provider}', 'Auth\LoginController@socialLogin');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//home page
Route::get('/', "FrontController@index")->name('home');


Route::group(['prefix' => 'front'], function () {
    Route::get('/contact', "FrontController@contact")->name('contact');
    Route::get('/about', "FrontController@about")->name('about');
    Route::get('/cart', 'FrontController@cart')->name("cart");
    Route::get('/product', "FrontController@index")->name('product');
    Route::get('/{catalog}/{id}', "FrontController@product");
    Route::get('/catalog', "FrontController@allProduct")->name('allProduct');

});

Route::get('/details/{id?}', "FrontController@details")->name('details');


Route::post('contact/contactPost', 'ContactController@contactPost')->name("sendMail");


Route::get('cart/create/{id}', "CartController@store")->name("add");
Route::get('cart/update/{id}', "CartController@update")->name("change");
Route::post('cart/{id?}', 'CartController@destroy');


Auth::routes();

Route::get('/home', "FrontController@index")->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    Route::get('/', function () {
        return view("admin.index");
    })->name("admin.index");

    Route::resource('logos', 'LogoController');


    Route::resource('product', 'ProductsController');
    Route::delete('/product/{id}', 'ProductsController@destroy')->name("productDelete");
    Route::post('/product/create', 'ProductsController@store');
    Route::post('product/update', 'ProductsController@updateSortable');


    Route::resource('category', 'CategoriesController');
    Route::delete('category/destroy/{id?}', 'CategoriesController@destroy')->name("categoryDelete");
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
    Route::get('menu/edit/{id}', 'MenuController@edit')->name('menuEdit');
    Route::put('menu/updateMenu/{id}', 'MenuController@updateMenu')->name('updateMenu');
    Route::post('menu/destroy/{id?}', 'MenuController@destroy')->name('menuDelete');


});