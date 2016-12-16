<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'books';

    protected $fillable = [
        'id',
        'tittle',
        'content',
        'num_pages',
        'public_date',
        'rate_avg',
        'image',
        'author_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function getImagePath ()
    {
        return asset(config('settings.image_url') . $this->image);
    }
}
