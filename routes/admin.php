<?php

use App\Http\Controllers\admin\WinController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest', 'namespace' => 'admin'], function () {
    // dd('dfskgjdk');
    Route::get('', 'UserController@index');
    Route::any('', 'UserController@index')->name('admin_login');
    Route::post('main/checklogin', 'UserController@checklogin');
    Route::get('register', 'UserController@register')->name('register');
    Route::post('register', 'UserController@store');
    Route::get('verify/{user:id}', 'UserController@verify')->name('verify');
    Route::post('verify/{user:id}', 'UserController@verifyed');
    Route::get('resend/{user:id}', 'UserController@resend')->name('resend');
});
Route::group(['middleware' => 'auth', 'namespace' => 'admin'], function () {
    Route::get('get_color_size', 'ColorController@get_category_wise')->name('get_color_size');
    Route::get('get_price', 'InqueryController@get_price')->name('get_price');
    // Dashboard
    Route::get('', 'DashboardController@index');
    Route::get('/home', 'DashboardController@index')->name('admin_home');

    // User 
    Route::post('user/delete', 'UsersController@destroyAll');
    Route::get('user/status/{user:id}', 'UsersController@status')->name('user.status');
    Route::post('state/delete', 'StateController@destroyAll');
    Route::post('city/delete', 'CityController@destroyAll');
    Route::post('role/delete', 'RoleController@destroyAll');
    Route::post('price/delete', 'PlanController@destroyAll');
    Route::post('inquery/delete', 'InqueryController@destroyAll');
    Route::get('inquery/status/{order}', 'InqueryController@change_status')->name('inquery_status');
    Route::post('category/delete', 'CategoryController@destroyAll');

    Route::post('color/delete', 'ColorController@destroyAll');
    Route::post('size/delete', 'SizeController@destroyAll');

    Route::get('inquery/status/{id}', 'InqueryController@changestatus');
    Route::get('inquery/pdf/{id}', 'InqueryController@invoicepdf');

    // Master 
    Route::resources([
        'state'        => 'StateController',
        'city'         => 'CityController',
        'role'         => 'RoleController',
        'price'        => 'PriceController',
        'inquery'      => 'InqueryController',

        'user'         => 'UsersController',
        'size'         => 'SizeController',
        'color'        => 'ColorController',
        'category'     => 'CategoryController',
    ]);

    // setting 
    Route::resource('setting', 'SettingController');


    Route::get('logout', 'UserController@logout')->name('admin_logout');
    Route::get('general-setting', 'SettingController@edit')->name('general_setting');
});
