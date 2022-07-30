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
    $res = 555;
    $name = 'My name';
    //return view('home')->with('var', 'my var');
    //return view('home',['res' => $res, 'name' => $name]);
    return view('home', compact('res', 'name'));
});

Route::get('/about', function () {
   return 'page about';
});

/*
Route::get('/contact', function() {
   return view('contact');
});

Route::post('/send-email', function (){
    if(!empty($_POST)) {
        dump($_POST);
    }
    return 'Send email';
});
*/
//Route::any();
Route::match(['post', 'get'], '/contact', function (){
    if(!empty($_POST)) {
        dump($_POST);
    }
    return view('contact');
})->name('contact-route');

Route::view('/test', 'test', ['test' => 'test data']);

Route::redirect('/about', '/contact', 301);
