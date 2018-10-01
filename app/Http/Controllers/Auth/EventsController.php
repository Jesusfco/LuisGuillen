<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\EventsQuestion;
use App\EventsQuestionsAnswer;
use App\User;
use Image;
use File;

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

        $this->validate($request, [
            'name' => 'required',
            'resume' => 'required',
            'date_from' => 'required',            
            //  'youtube' => 'required',
            'img' => 'required|image',
            'description' => 'required'
 
        ]);
 
        ini_set('memory_limit','256M');

        $img = $request->file('img');
        $file_route = time().'_'. $img->getClientOriginalName();

        $event = new Event();

        $event->name = $request->name;
        $event->resume = $request->resume;
        $event->date_from = $request->date_from;
        $event->date_to = $request->date_to;
        $event->description = $request->description;
        $event->cost = $request->cost;        
        $event->place = $request->place;        
        $event->img = $file_route;
        
        $event->save();

        File::makeDirectory('images/events/' . $event->id);

        Image::make($request->file('img'))
        ->fit(900,600)
        ->save("images/events/" . $event->id . '/' . $file_route);

        return redirect('/app/events');

    }

    public function edit($id) {
        $event = Event::find($id);
        if($event == NULL) return 'Evento Inexistente';
        return view('admin/events/edit')->with('event', $event);
    }

    public function update($id, Request $request) {

        $event = Event::find($id);

        if($event == NULL) return 'Evento Inexistente';

        if($request->file('img')) {
            ini_set('memory_limit','256M');
            $img = $request->file('img');
            $file_route = time().'_'. $img->getClientOriginalName();



            Image::make($request->file('img'))
                  ->fit(900,600)
                  ->save('images/events/' . $id . '/' . $file_route);

            File::delete('images/events/' . $id . '/' .$event->img);

            $event->img = $file_route;

        }

        $event->name = $request->name;
        $event->resume = $request->resume;
        $event->date_from = $request->date_from;
        $event->date_to = $request->date_to;
        $event->description = $request->description;
        $event->cost = $request->cost;   
        $event->place = $request->place;               
        
        $event->save();

        return back()->with('msj', 'Evento Actualizado');;

    }
 
    public function delete($id){

        $id =  $request->id;
        $event = Event::find($id);   
        if($event == NULL) return;
        EventsDoubt::where('event_id', $event->id)->delete();
        $questions = EventsQuestion::where('event_id', $event->id)->get();

        foreach($questions as $q) {

            EventsQuestionsAnswer::where('question_id', $q->id)->delete();

        }

        EventsQuestionsAnswer::where('event_id', $event->id)->delete();
        
        File::deleteDirectory('images/events/' . $event->id);
        $event->delete();

        return 'true';

    }

}
