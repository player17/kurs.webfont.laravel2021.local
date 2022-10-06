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

/*
Route::get('/', function () {
    return view('welcome');
})->name('home');
*/

Route::get('/', 'PostController@index')->name('home');
Route::get('/article/{slug}', 'PostController@show')->name('posts.single');

Route::get('/category/{slug}', 'CategoryController@show')->name('categories.single');
Route::get('/tag/{slug}', 'TagController@show')->name('tags.single');

// поиск
Route::get('/search', 'SearchController@index')->name('search');


// Доступен только для слоя admin в /app/Http/Kernel.php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
    // ./admin  // Admin\MainController@index  // `php artisan make:controller Admin\MainController`
    // `php artisan route:list --path=admin`
    Route::get('/', 'MainController@index')->name('admin.index');
    // https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

// Доступен только для слоя auth в /app/Http/Kernel.php
Route::get('/logout', 'UserController@logout')->middleware('auth')->name('logout');

// https://laravel.com/docs/9.x/middleware#assigning-middleware-to-routes
// Доступен только для слоя guest в /app/Http/Kernel.php
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
});


