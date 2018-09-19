<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\EventsQuestion;
use App\EventsQuestionsAnswer;
use App\User;


class EventsController extends Controller
{
 
    
    public function list(Request $request) {
        $events = Event::search($request->name)
            ->orderBy('id','desc')
            ->paginate(15);
        return view('admin/events/list')->with(['events'=> $events]);
    }

    public function create() {
        return view('admin/events/create');
    }

    public function store(Request $request) {
        
    }

}
