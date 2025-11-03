<?php

// app/Models/News.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title','slug','category','published_at','image','excerpt','content'
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
