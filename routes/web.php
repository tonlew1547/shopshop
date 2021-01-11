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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/shopinfo', 'WebController@shopinfo')->name('shopinfo');

    Route::post('product_types/create', 'ProductTypeController@store');
    Route::resource('product_types', 'ProductTypeController');


    Route::post('products/create', 'ProductController@store');
    Route::resource('products', 'ProductController');


    Route::post('customers/create', 'CustomerController@store');
    Route::resource('customers', 'CustomerController');


    Route::post('case_product/create', 'CaseproductController@store');
    Route::resource('case_product', 'CaseproductController');
});

