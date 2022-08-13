<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    // ./admin  // Admin\MainController@index  // `php artisan make:controller Admin\MainController`
    Route::get('/', 'MainController@index')->name('admin.index');
    // https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
    Route::resource('/categories', 'CategoryController');
});
