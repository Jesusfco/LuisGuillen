<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsQuestionsAnswer extends Model
{
    protected $fillable = [
        'question_id', 'user_id', 'answer'
    ];

    public function records() 
    {
        return $this->belongsTo('App\EventsQuestion', 'id', 'question_id');
    }
}
