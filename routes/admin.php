<?php


//01066747425
Route::group(['prefix' => 'admin'], function () {
    Route::group([ 'namespace' => "Admin"], function () {
        Config::set('auth.defines', 'admin');
        Route::get('reset_password', 'AdminAuth@reset_password');
        Route::post('reset_password', 'AdminAuth@reset_password_action');
        Route::get('reset_password_final/{token}', 'AdminAuth@reset_password_by_token');
        Route::post('reset_password_final/{token}', 'AdminAuth@reset_password_by_token_action');
        Route::get('login', 'AdminAuth@login');
        Route::post('login', 'AdminAuth@login_action');
    });
    Route::group(['middleware' => 'admin:admin'], function () {
        Route::group([ 'namespace' => "Admin"], function () {
            Route::get('/', function () {
                return view('admin.home');
            });
            Route::get('create', 'AdminController@create');
            Route::post('create', 'AdminController@store');
            Route::any('/logout', 'AdminAuth@logout');
        });
        Route::group(['prefix' => 'manager', 'namespace'], function () {
            Route::resource('/', 'ManagerController');
            Route::get('/{user}', 'ManagerController@show');
            Route::get('/create', 'ManagerController@create');
            Route::post('/create', 'ManagerController@store');
            Route::get('/edit/{user}', 'ManagerController@edit');
            Route::patch('/update/{user}', 'ManagerController@update');
            Route::post('/destroy', 'ManagerController@destroy');
        });
        Route::group(['prefix' => 'inventory', 'namespace'], function () {
            Route::get('/', 'InventoryController@index');
            Route::get('/create', 'InventoryController@create');
            Route::post('/create', 'InventoryController@store');
            Route::get('/{inventory}', 'InventoryController@show');
            Route::post('/edit', 'InventoryController@edit');
            Route::post('/update', 'InventoryController@update');
            Route::post('/destroy', 'InventoryController@destroy');
        });
    });
});
