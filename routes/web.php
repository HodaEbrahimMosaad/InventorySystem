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
Route::group(['prefix' => 'manager'], function () {
    Route::get('login', 'ManagerAuth@login')->name('login');
    Route::post('login', 'ManagerAuth@login_action');
    Route::get('logout', 'ManagerAuth@signout');
    Route::get('home', 'ManagerAuth@home')->middleware('auth');
});
Route::group(['prefix' => 'supplier'], function () {
    //Route::get('/', 'SupplierController@index');
    Route::resource('/', 'SupplierController');
    Route::get('/{supplier}/edit', 'SupplierController@edit');
    Route::patch('/{supplier}', 'SupplierController@update');
    Route::get('/{supplier}', 'SupplierController@show');
    Route::post('/destroy', 'SupplierController@destroy');
});
Route::group(['prefix' => 'item'], function () {
    //Route::get('/', 'SupplierController@index');
    Route::get('/', 'ItemController@index');
    Route::get('/create', 'ItemController@create');
    Route::post('/', 'ItemController@store');
    Route::get('/{item}/edit', 'ItemController@edit');
    Route::patch('/{item}', 'ItemController@update');
    Route::post('/destroy', 'ItemController@destroy');
});



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
