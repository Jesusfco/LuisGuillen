<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judment extends Model
{
    protected $fillable = [
        'user_id', 'event_id', 'qualification', 'opinion'
    ];
}
