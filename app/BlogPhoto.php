<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPhoto extends Model
{
    protected $fillable = [
        'name', 'blog_id', 'order'
    ];

    public $timestamps = false;
}
