<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'user_id', 'creator_id','event_id', 'amount'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event', 'id', 'event_id');
    }

    public function user() 
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function creator() 
    {
        return $this->hasOne('App\User', 'id', 'creator_id');
    }
}
