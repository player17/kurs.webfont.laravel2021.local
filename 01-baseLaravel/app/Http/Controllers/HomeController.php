<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use App\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
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


        //$post = Post::find(6);
        //$post->delete();
        Post::destroy(4);



        return view('home', ['res' => 555, 'name' => 'super']);

    }

    public function test() {
        return __METHOD__;
    }
}
