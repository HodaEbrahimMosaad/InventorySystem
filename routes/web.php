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



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
