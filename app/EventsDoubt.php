<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsDoubt extends Model
{
    protected $fillable = [
        'user_id', 'responder_id', 'event_id', 'question', 'answer', 'public', 'read'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function responder()
    {
        return $this->hasOne('App\User', 'id', 'responder_id');
    }

    public function event()
    {
        return $this->hasOne('App\Event', 'id', 'event_id');
    }
}
