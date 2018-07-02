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
//        $m = $query->where('TEXTO', 'LIKE', "%$name%")->union($n)->get();
        return $query->where('title', 'LIKE', "%$name%");
    }
}
