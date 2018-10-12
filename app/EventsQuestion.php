<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsQuestion extends Model
{
    protected $fillable = [
        'event_id', 'question'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event', 'id', 'event_id');
    }

    public function answers()
    {
        return $this->belongsTo('App\EventsQuestionsAnswer', 'question_id', 'id');
    }

    public function countAnswers() {
        $answers = EventsQuestionsAnswer::where('question_id', $this->id)->get();
        return count($answers);
    }

}
