<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'img', 
        'phone', 'token', 'status', 'birthday', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSearch($query, $name) 
    {
        $n = $query->where('name', 'LIKE', "%$name%")->get();
        return $query->where('name', 'LIKE', "%$name%");
    }

    public function records() 
    {
        return $this->hasMany('App\Record', 'user_id', 'id');
    }

    public function receipts() 
    {
        return $this->hasMany('App\Receipt', 'user_id', 'id');
    }

    public function judments() 
    {
        return $this->hasMany('App\Judment', 'user_id', 'id');
    }

    public function doubts() 
    {
        return $this->hasMany('App\Doubt', 'user_id', 'id');
    }

    public function answers() 
    {
        return $this->hasMany('App\EventsQuestionsAnswer', 'user_id', 'id');
    }
}
