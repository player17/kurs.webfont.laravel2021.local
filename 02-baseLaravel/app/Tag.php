<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;

    // разрешенные поля для массового заполнения в БД
    protected $fillable = [
        'title'
    ];

    /**
     * Связь многие ко многим
     * $tag->posts
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
