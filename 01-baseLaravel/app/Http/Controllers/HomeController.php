<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use App\Post;
use App\Tag;
use App\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Главная страница';
        $h1 = '<h1>Home page</h1>';
        $data1 = range(1, 20);
        $data2 = [
            'title' => 'Title',
            'content' => 'Content',
            'keys' => 'Keywords',
        ];

        //$posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->get();

        return view('home', compact('title', 'h1', 'data1', 'data2', 'posts'));

    }

    public function create()
    {
        $title = 'Create posts';
        $rubrics = Rubric::pluck('title', 'id')->all();
        return view('create', compact('title', 'rubrics'));
    }

    public function store(Request $request)
    {
        //$request->input('title');
        Post::create($request->all());
        return redirect()->route('home');
    }

    public function test()
    {
        return __METHOD__;
    }
}
