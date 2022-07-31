<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['res' => 5, 'name' => 'super']);
    }

    public function test() {
        return __METHOD__;
    }
}
