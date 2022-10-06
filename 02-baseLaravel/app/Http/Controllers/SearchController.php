<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        $request->validate([
            's' => 'required',
        ]);
        //dd($request->all());

        $s = $request->s;

        // select * from `posts` where `title` LIKE '%а%' limit 2 offset 6
        //$posts = Post::where('title', 'LIKE', "%{$s}%")->with('category')->paginate(2);
        // \app\Post.php :: scopeLike($query, $s)
        $posts = Post::like($s)->with('category')->paginate(2);
        return view('posts.search', compact('posts', 's'));
    }
}
