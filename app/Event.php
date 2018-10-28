<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    public $avaibleC = 0;
    //
    protected $fillable = [
        'name', 'resume', 'place', 'date_to', 'date_from', 'description', 'img', 'cost', 'principal', 'capacity'
    ];

    public function betweenDates() {
        $dateFrom = new Carbon($this->date_from . ' 00:00:00');
        $now = new Carbon();
        // return $now;
        // return $dateFrom;
        if($this->date_to == NULL) {
            if($dateFrom->year == $now->year && $dateFrom->month == $now->month && $dateFrom->day == $now->day) {
                return true;
            } else {
                return false;
            }
        } else {

            $dateTo = new Carbon($this->date_to . ' 23:59:59');

            if($now->greaterThanOrEqualTo($dateFrom)) {

                if($now->lessThanOrEqualTo($dateTo)) {
                    return true;
                }
                
            }

            return false;
        }
        
    }
    
    public function scopeSearch($query, $name) 
    {
        $n = $query->where('name', 'LIKE', "%$name%")->get();
        return $query->where('name', 'LIKE', "%$name%");
    }

    public function doubtsCountWithoutAnswer() {
        $x = 0;
        foreach($this->doubts as $doubt) {
            if($doubt->answer == NULL) {
                $x++;
            }
        }
        return $x;
    }

    public function avaibleSpace(){
        $this->avaibleC = $this->capacity - count($this->receipts);
        return $this->avaibleC;
    }
    
    public function doubts()
    {
        return $this->hasMany('App\EventsDoubt', 'event_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany('App\EventsQuestion', 'event_id', 'id');
    }

    public function judments()
    {        
        return $this->hasMany('App\Judment', 'event_id', 'id');
    }

    public function receipts() 
    {
        return $this->hasMany('App\Receipt', 'event_id', 'id');
    }

    public function records() 
    {
        return $this->hasMany('App\Record', 'event_id', 'id');
    }

}
