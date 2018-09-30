<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogsComment extends Model
{
    protected $fillable = [
        'user_id', 'blog_id', 'comment'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
