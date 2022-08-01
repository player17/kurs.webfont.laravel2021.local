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
// '/'
Route::get('/', function () {
    $res = 555;
    $name = 'My name';
    //return view('home')->with('var', 'my var');
    //return view('home',['res' => $res, 'name' => $name]);
    return view('home', compact('res', 'name'));
})->name('home');

// '/test'
// Route::view('/test', 'test', ['test' => 'test data']);

// '/about'
// Route::redirect('/about', '/contact', 301);

// '/post'
// Route::get('post/{id}/{slug}', function ($id, $slug){return "Post $id : $slug";})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z0-9-]+']);
// /app/Providers/RouteServiceProvider.php::public function boot()
Route::get('post/{id}/{slug?}', function ($id, $slug = null) {
    return "Post $id : $slug";
})->name('post');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/posts', function () {
        return 'Posts List';
    });

    Route::get('/post/create', function () {
        return 'Post Create';
    });

    Route::get('/post/{id}/edit', function ($id) {
        return "Edit Posts $id";
    })->name('post');
});

Route::get('/contact', function() {
   return view('contact');
});

Route::post('/send-email', function (){
    if(!empty($_POST)) {
        dump($_POST);
    }
    return 'Send email';
});

//Route::any();
Route::match(['post', 'get', 'put'], '/contact', function () {
    if (!empty($_POST)) {
        dump($_POST);
    }
    return view('contact');
})->name('contact-route');
*/

Route::get('/', 'HomeController@index');
Route::get('/test', 'HomeController@test');
Route::get('/test2', 'Test\TestController@index');
Route::get('/page/{slug}', 'PageController@show', 301);

Route::resource('/admin/posts', 'PostController', ['parameters' => [
    'posts' => 'id',
]]);

Route::get('/about', function () {
    return 'page about';
});

// 404 redirect
Route::fallback(function () {
    //return redirect()->route('home');
    abort(404, 'Oops! Page not found...');
});


