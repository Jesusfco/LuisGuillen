<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Image;
use File;


class UsersController extends Controller
{
    public function list(Request $request) {
        $users = User::search($request->name)
            ->orderBy('id','desc')
            ->paginate(15);
        return view('admin/users/list')->with(['users'=> $users]);
    }

    public function create() {
        return view('admin/users/create');
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
}
