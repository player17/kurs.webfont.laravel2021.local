<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        // Оптимизация количества запросов
        //$posts = Post::paginate(5);
        $posts = Post::with('category', 'tags')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Получаем только нужные поля из базы, ключ массива будет id
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     * Заменили Request $request на StorePost $request для валидации
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image'
        ]);

        $data = $request->all();

        // Настраиваем загрузку изображений из форм
        /*
        if($request->hasfile('thumbnail')) {
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store('images/' . $folder);
        }
        */
        $data['thumbnail'] = Post::uploadImage($request);

        $post = Post::create($data);

        // Сохранение тегов // belongsToMany
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Пост добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    //public function update(StorePost $request, $id)
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image'
        ]);

        $post = Post::find($id);
        $data = $request->all();

        // Настраиваем загрузку изображений из форм
        //$data['thumbnail'] = Post::uploadImage($request, $post->thumbnail);
        //dump($data);
        if ($file = Post::uploadImage($request, $post->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        //dd($data);
        /*
        if($request->hasfile('thumbnail')) {
            // Удаляем старое изображение
            Storage::delete($post->thumbnail);

            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store('images/' . $folder);
        }
        */

        // Перегенерация slug библиотекой sluggable
        $post->slug = null;
        // Сохранение тегов // belongsToMany
        $post->tags()->sync($request->tags);

        $post->update($data);

        $request->session()->flash('success', 'Пост обновлен');
        return redirect()->route('posts.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Удаляем связаные теги
        $post->tags()->sync([]);
        // Удаляем изображение
        Storage::delete($post->thumbnail);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Пост удален');
    }
}
