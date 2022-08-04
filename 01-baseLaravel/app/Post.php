<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 * @mixin Builder
 */
class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $incrementing = true;
    //protected $keyType = 'string';
    public $timestamps = true;
    protected $attributes = [
        'content' => 'Lorem ipsum...'
    ];

    protected $fillable = ['title'];
    protected $guarded = [];

    public function rubric()
    {
        return $this->belongsTo('App\Rubric','rubric_my_id', 'id');
    }

}
