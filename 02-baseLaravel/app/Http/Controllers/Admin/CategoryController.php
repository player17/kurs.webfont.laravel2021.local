<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * Заменили Request $request на StoreCategory $request для валидации
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(StoreCategory $request)
    {
        // перенастроил в /app/Http/Requests/StoreCategory.php
        /*
        $request->validate([
            'title' => 'required',
        ]);
        */

        // массовое заполнение -> в модели отвечает свойство - protected $fillable
        Category::create($request->all());

        // $request->session()->flash('success', 'Категория добавлена');
        // php artisan route:list --path=admin
        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(StoreCategory $request, $id)
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $category = Category::find($id);
        // Перегенерация slug библиотекой sluggable
        $category->slug = null;
        $category->update($request->all());

        $request->session()->flash('success', 'Категория обновлена');
        return redirect()->route('categories.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
