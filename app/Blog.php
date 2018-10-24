<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'user_id', 'title', 'resume', 'text', 'youtube' , 'date', 'img'
    ];

    public function scopeSearch($query, $name) 
    {
        $n = $query->where('title', 'LIKE', "%$name%")->get();
        return $query->where('title', 'LIKE', "%$name%");
    }

    public function photos()
    {
        return $this->hasMany('App\BlogPhoto', 'blog_id', 'id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
}
