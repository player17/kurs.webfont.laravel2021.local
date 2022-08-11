<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected $fillable = ['title', 'content', 'rubric_my_id'];
    protected $guarded = [];

    public function rubric()
    {
        return $this->belongsTo('App\Rubric', 'rubric_my_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getPostDate()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    // Мутатор // Mutators // Вызывается перед сохранением в БД
    public function setTitleAttribute($value)
    {
        // dd($value);
        $this->attributes['title'] = Str::title($value);
    }

    // Акссесор // Accessors // Вызывается перед выводом данных из базы
    public function getTitleAttribute($value)
    {
        return Str::upper($value);
    }

}
