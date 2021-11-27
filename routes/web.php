<?php

use Illuminate\Support\Facades\Route;


Route::get('/migrate', function () {
    \Artisan::call('migrate');
    return 'migrate';
});
Route::any('admin', function () {
    return false;
});
// Route::get('/passport', function () {
//     $exitCode = Artisan::call('passport:install');
//     return 'clearede';
// });


Route::get('', 'HomeController@index')->name('home');
