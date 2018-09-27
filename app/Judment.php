<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judment extends Model
{
    protected $fillable = [
        'user_id', 'event_id', 'question1', 'question2', 
        'question3', 'question4','qualification', 'opinion'
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
