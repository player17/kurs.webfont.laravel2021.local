<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        /*
         * Тестирование sluggable для тега
        $tag = new Tag();
        $tag->title = 'Привет мир';
        $tag->save();
        */
        return view('admin.index');
    }
}
