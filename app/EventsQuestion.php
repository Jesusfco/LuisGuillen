<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsQuestion extends Model
{
    protected $fillable = [
        'event_id', 'question'
    ];
}
