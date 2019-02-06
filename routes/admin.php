<?php



Route::group(['prefix' => 'admin', 'namespace' => "Admin"], function () {
    Config::set('auth.defines', 'admin');
    Route::get('reset_password', 'AdminAuth@reset_password');
    Route::post('reset_password', 'AdminAuth@reset_password_action');
    Route::get('login', 'AdminAuth@login');
    Route::post('login', 'AdminAuth@login_action');
    Route::group(['middleware' => 'admin:admin'], function (){
        Route::get('/', function () {
            return view('admin.home');
        });
        Route::any('/logout', 'AdminAuth@logout');
    });

});