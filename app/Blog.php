<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

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
    
    public function getImgUrl() {
        return url('images/blog/' . $this->id . '/' . $this->img);
    }

    public function getFormatDate(){
        return Carbon::parse($this->date)->format('M d, Y');
    }
}
