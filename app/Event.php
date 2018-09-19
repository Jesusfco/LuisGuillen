<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'name', 'resume', 'date_to', 'date_from', 'description'
    ];

    public function scopeSearch($query, $name) 
    {
        $n = $query->where('name', 'LIKE', "%$name%")->get();
        return $query->where('name', 'LIKE', "%$name%");
    }
}
