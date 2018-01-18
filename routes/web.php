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

Route::get('/', 'ProductsController@index')->name('products');

Route::get('/create/product', 'ProductsController@create')->name('create');
Route::post('/create/product', 'ProductsController@store')->name('create/product');

Route::get('/edit/product/{product_id}', 'ProductsController@edit');
Route::post('/edit/product', 'ProductsController@update')->name('update/product');

Route::get('/delete/product/{product_id}', 'ProductsController@destroy');


