<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        // /app/Category->posts() // тут настроена связь категории и постов

        //$posts = $tag->posts()->orderBy('id', 'desc')->paginate(2);
        // Жадно запросил категории
        // select * from `categories` where `categories`.`id` in (3, 7)
        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(2);
        return view('tags.show', compact('tag', 'posts'));
    }
}
