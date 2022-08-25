<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     * Заменили Request $request на StoreTag $request для валидации
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);

        // массовое заполнение -> в модели отвечает свойство - protected $fillable
        Tag::create($request->all());

        // $request->session()->flash('success', 'Категория добавлена');
        // php artisan route:list --path=admin
        return redirect()->route('tags.index')->with('success', 'Тег добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(StoreTag $request, $id)
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $tag = Tag::find($id);
        // Перегенерация slug библиотекой sluggable
        $tag->slug = null;
        $tag->update($request->all());

        $request->session()->flash('success', 'Тег обновлен');
        return redirect()->route('tags.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$tag = Tag::find($id);
        //$tag->delete();

        //Tag::destroy($id);

        $tag = Tag::find($id);
        //dd($tag->posts->count());
        if($tag->posts->count()) {
            return redirect()->route('tags.index')->with('error', 'Ошибка удаления, есть прикрепленные записи');
        }
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Тег удален');
    }
}
