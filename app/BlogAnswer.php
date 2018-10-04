<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogAnswer extends Model
{
    protected $fillable = [
        'user_id', 'blog_comment_id', 'answer'
    ];
}
