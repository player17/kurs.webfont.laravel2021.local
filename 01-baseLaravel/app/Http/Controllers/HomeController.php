<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use App\Post;
use App\Tag;
use App\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        /*
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_my_id' => 'required|integer',
        ]);
        */
        $rules = [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_my_id' => 'required|integer',
        ];
        $messages = [
            'title.required' => 'Заполните поле название',
            'title.min' => 'Минимум 5 символов',
            'rubric_my_id.integer' => 'Выберите рубрику из списка'
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        Post::create($request->all());
        return redirect()->route('home');
    }

    public function test()
    {
        return __METHOD__;
    }
}
