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

        return view('home', []);

    }

    public function test() {
        return __METHOD__;
    }
}
