<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        dump(config('app.timezone'));
        dump(config('database.connections.mysql'));
        dump($_ENV);
        return view('home', ['res' => 5, 'name' => 'super']);
    }

    public function test() {
        return __METHOD__;
    }
}
