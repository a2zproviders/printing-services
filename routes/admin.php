<?php

use App\Http\Controllers\admin\WinController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest', 'namespace' => 'admin'], function () {
    Route::any('', 'UserController@index')->name('admin_login');
    Route::post('main/checklogin', 'UserController@checklogin');
});



Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin'], function () {

    // Dashboard
    Route::get('home', 'DashboardController@index')->name('admin_home');

    // User 
    Route::post('user/delete', 'UsersController@destroyAll');
    Route::post('state/delete', 'StateController@destroyAll');
    Route::post('city/delete', 'CityController@destroyAll');
    Route::post('role/delete', 'RoleController@destroyAll');
    Route::post('plan/delete', 'PlanController@destroyAll');
    Route::post('category/delete', 'CategoryController@destroyAll');

    // Master 
    Route::resources([
        'state'        => 'StateController',
        'city'         => 'CityController',
        'role'         => 'RoleController',
        'plan'         => 'PlanController',

        'category'     => 'CategoryController',
    ]);

    // setting 
    Route::resource('setting', 'SettingController');


    Route::get('logout', 'UserController@logout')->name('admin_logout');
    Route::get('general-setting', 'SettingController@edit')->name('general_setting');
});
