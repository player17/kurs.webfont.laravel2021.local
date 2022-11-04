<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // Получение данных для sidebar
        view()->composer('layouts.sidebar', function($view) {

            // Кеширование категорий
            if(Cache::has('cats')) {
                $cats = Cache::get('cats');
            } else {
                // https://laravel.com/docs/9.x/eloquent-relationships
                // select `categories`.*, (select count(*) from `posts` where `categories`.`id` = `posts`.`category_id`) as `posts_count` from `categories` order by `posts_count` desc
                $cats = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                // Кладем в кеш на 30 секунд
                Cache::put('cats', $cats, 30);
            }

            // Популярные посты
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get());

            // Список категорий + количество постов
            $view->with('cats', $cats);
        });
    }
}
