<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use App\Post;
use App\Tag;
use App\Rubric;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Главная страница';
        $h1 = '<h1>Home page</h1>';
        return view('home', compact('title','h1'));

    }

    public function test() {
        return __METHOD__;
    }
}
