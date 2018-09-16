<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'name', 'resume', 'date_to', 'date_from', 'description'
    ];
}
