<?php

namespace App\Http\Controllers;

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

        DB::delete('DELETE FROM posts WHERE id = ?', [3]);

        DB::beginTransaction();
        try {
            DB::update('UPDATE `posts` SET `created_at` = ? WHERE `created_at` IS NULL', [NOW()]);
            DB::update('UPDATE `posts` SET `updated_at` = ? WHERE `updated_at2` IS NULL', [NOW()]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dump($e->getMessage());
        }

        $posts = DB::select(
            'SELECT * FROM `posts` WHERE `id` >= :id',
            ['id' => 2]);
        return $posts;

    }

    public function test() {
        return __METHOD__;
    }
}
