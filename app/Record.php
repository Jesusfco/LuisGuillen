<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id', 'event_id'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event', 'id', 'event_id');
    }

    public function user() 
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
}
