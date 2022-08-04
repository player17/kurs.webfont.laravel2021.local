<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubric
 * @package App
 * @mixin Builder
 */
class Rubric extends Model
{
    /*
    public function post()
    {
        //return $this->hasOne('App\Post');
        return $this->hasOne(Post::class,'rubric_my_id', 'id');
    }
    */

    public function posts()
    {
        return $this->hasMany(Post::class,'rubric_my_id', 'id');
    }
}
