<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title',
        'description',
        'content',
        'category_id',
        'thumbnail',
    ];

    /**
     * Многие ко многим
     * $post->tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * Один ко одному
     * $post->category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasfile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store('images/' . $folder);
        }
        return null;
    }

    /**
     * Получение изображение статьи
     *
     * @return string
     */
    public function getImage()
    {
        if(!$this->thumbnail) {
            return asset('no-image.png');
        }
        return asset('uploads/' . $this->thumbnail);
    }
}
