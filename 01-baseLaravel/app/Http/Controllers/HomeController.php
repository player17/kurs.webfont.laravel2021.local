<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use App\Post;
use App\Tag;
use App\Rubric;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        /*
        dump(config('app.timezone'));
        dump(config('database.connections.mysql'));
        dump($_ENV);
        return view('home', ['res' => 5, 'name' => 'super']);
        */

        /*$query = DB::insert(
            'INSERT INTO posts(`title`,`content`, `created_at`)
                VALUE (?, ?, ?)',
            ['Статья 5', 'Текст 5', date('Y-m-d H:i:s')]
        );
        dump($query);*/

        /*
        DB::update(
            'UPDATE `posts` SET created_at = ?, updated_at = ? WHERE `id` = 2',
            [NOW(), NOW()]
        );
        */

        /*
        DB::delete('DELETE FROM posts WHERE id = ?', [3]);
        */

        /*DB::beginTransaction();
        try {
            DB::update('UPDATE `posts` SET `created_at` = ? WHERE `created_at` IS NULL', [NOW()]);
            DB::update('UPDATE `posts` SET `updated_at` = ? WHERE `updated_at2` IS NULL', [NOW()]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dump($e->getMessage());
        }*/

        /*$posts = DB::select(
            'SELECT * FROM `posts` WHERE `id` >= :id',
            ['id' => 2]);*/

        /*
        //$data = DB::table('country')->select('Code', 'Name')->limit(10)->get();
        $data = DB::table('country')
            ->select('Code', 'Name')
            ->where([
                ['Code','LIKE','AR%'],
                ['Name','LIKE','A%']
            ])
            ->limit(10)
            ->orderBy('Code','Desc')
            ->get();
        //$data = DB::table('country')->select('Code', 'Name')->first();
        //$data = DB::table('city')->select('id', 'Name')->find(2);
        //$data = DB::table('country')->limit(10)->pluck('Name', 'Code');
        //$data = DB::table('country')->count();
        //$data = DB::table('country')->max('Population');
        //$data = DB::table('city')->select('CountryCode')->distinct()->get();
        $data = DB::table('city')
            ->select('city.ID', 'city.Name as city_name', 'country.Code', 'country.Name as country_name')
            ->limit(10)
            ->join('country', 'city.CountryCode', '=', 'country.Code')
            ->where('country.Code', '=', 'RUS')
            ->orderBy('city.ID')
            ->get();

        dd($data);
        */

        /*
        $post = new Post();
        $post->title = 'Статья 5';
        $post->content = 'Текст поста 2 ...';
        $post->save();
        */

        /*
        //$data = Country::all();
        //$data = Country::limit(5)->get();
        //$data = Country::query()->limit(5)->get();
        //$data = Country::limit(5)->get();
        //$data = Country::where('Code', '<', 'ALB')->offset(1)->limit(2)->get();
        //$data = City::find(5);
        //$data = Country::find('RUS');
        //dd($data);
        */

        /*
        $post = new Post();
        $post->title = 'Post 6';
        $post->content = 'Text post 6';
        $post->save();
        */

        /*
        //Post::query()->create(['title' => 'Post 7', 'content' => 'Text posts 7 ....']);
        $post = new Post();
        $post->fill(['title' => 'Post 8', 'content' => 'Text posts 8 ....']);
        $post->save();
        */

        /*
        $post = Post::find(7);
        $post->content = 'Txt 777 ....';
        $post->save();
        */

        /*
        Post::where('id','>','3')
            ->update(['updated_at' => NOW()]);
        */

        /*
        //$post = Post::find(6);
        //$post->delete();
        Post::destroy(4);
        */

        /*
        $post = Post::find(2);
        dump($post->title, $post->rubric->title);
        */

        /*
        $rubric = Rubric::find(1);
        dump($rubric->title, $rubric->post->title);
        $rubric = Rubric::find(3);
        dump($rubric->title, $rubric->posts);
        */

        /*
        $post = Rubric::find(3)->posts;
        //$post = Rubric::find(3)->posts()->select('title')->where('title', 'LIKE', '%3')->get();
        dump($post);
        */

        /*
        // Ленивая загрузка (на каждый объект цикла, свой запрос)
        $posts = Post::where('id', '>', 1)->get();
        foreach ($posts as $post) {
            //dd($post->rubric); // Коллекция
            //dd($post->rubric()); // Объект связи belongsTo
            dump($post->title, $post->rubric->title);
        }
        */

        /*
        // Жадная загрузка (один запрос для всех объектов цикла)
        $posts = Post::with('rubric')->where('id', '>', 1)->get();
        foreach ($posts as $post) {
            dump($post->title, $post->rubric->title);
        }
        */

        /*
        // Многие ко многим
        $post = Post::find(1);
        dump($post->title);
        foreach ($post->tags as $tag) {
            dump($tag->Title);
        }

        $tag = Tag::find(3);
        dump($tag->title);
        foreach ($tag->posts as $post) {
            dump($post->title);
        }
        */

        Log::warning('Test Log');
        //\Debugbar::warning('Watch out...');
        //Debugbar::info($request);
        Debugbar::info('Title info');
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');

        // Сессии
        $request->session()->put('test', 'test val');
        session(['cart' => [
            ['pord_id' => 12335, 'count' => 1],
            ['pord_id' => 777, 'count' => 2],
        ]]);
        session()->push('cart', ['pord_id' => 333, 'count' => 3]);
        //dump($request->session()->all());
        //dump($request->session()->get('cart')[2]);
        //dump(session('test'));
        $testSessionVal = session()->pull('test'); // test val
        //session()->forget('test');
        //dump($testSessionVal);
        //dump(session('test'));
        //session()->flush(); // полная очистка
        //dump(session()->all());

        // Куки // Cookie // dump блокирует создание Cookie, т.к. Cookie отправляются вместе с заголовком, до вывода контента
        // а dump до создания Cookie отправляет заголовки
        Cookie::queue('test', 'Test val 0000', 1);
        Cookie::queue(Cookie::forget('test'));
        Cookie::queue('test1', 'Test val 1111', 1);
        //dump(Cookie::get('test'));
        //dump($request->cookie('test'));
        //print_r($request->cookie('test'));
        echo '<div style="background: #171719; color: #2cad2c; padding: 4px 6px; font-size: 12px;">';
        echo 'Cookie: ' . $request->cookie('test1');
        echo '</div>';

        // Кеширование
        // /storage/framework/cache // Кеш данных
        // /storage/framework/views // Кеш страниц
        Cache::put('keyCache', 'cache val', 300);
        //$varCache = Cache::pull('keyCache');
        Cache::forget('keyCache'); // очистил кеш
        print_r(Cache::get('keyCache'));
        Cache::forever('keyForeverCache', 'cache val'); // кеш на всегда


        Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
        Debugbar::startMeasure('get_posts','Time for get posts');

        if(Cache::has('posts')) {
            $posts = Cache::get('posts');
        } else {
            // Пагинация
            //$posts = Post::orderBy('id', 'desc')->get();
            //$posts = Post::orderBy('id', 'desc')->simplePaginate();
            $posts = Post::orderBy('created_at', 'desc')->paginate(9);
            Cache::put('posts',$posts, 3600);
        }
        Cache::flush(); // очистил весь кеш

        Debugbar::stopMeasure('get_posts');
        Debugbar::measure('My long operation', function() {
            echo 'My long operation txt';
        });


        $title = 'Главная страница';
        $h1 = '<h1>Home page</h1>';
        $data1 = range(1, 20);
        $data2 = [
            'title' => 'Title',
            'content' => 'Content',
            'keys' => 'Keywords',
        ];

        //$posts = Post::all();
        //$posts = Post::orderBy('id', 'desc')->get();

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

        /*
        //$request->input('title');
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
        $request->session()->flash('success', 'Данные сохранены');
        return redirect()->route('home');
    }

    public function test()
    {
        return __METHOD__;
    }
}
