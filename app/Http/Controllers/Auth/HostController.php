<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Record;
use App\Event;
use App\Receipt;
use QRCode;
use Carbon;

class HostController extends Controller
{
    public function __construct() {
        $this->middleware('host');
    }
    
    public function list(Request $request) {
        $events = Event::search($request->name)
            ->orderBy('id','desc')
            ->paginate(15);
        return view('admin/events/list')->with(['events'=> $events]);
    }

    public function confirmRecord($id) {
        
        $receipt = Receipt::find($id);
        $check = Record::where([
            ['user_id', $receipt->user_id],
            ['event_id', $receipt->event_id]
            ])->first();

        if($check != NULL) {
            return 'Asistencia creada';
        }

        $record = new Record();
        $record->user_id = $receipt->user_id;
        $record->event_id = $receipt->event_id;
        $record->save();
         
        return redirect('app/events/records/' . $receipt->id);

    }

    public function records($id) {

        $event = Event::find($id);
        if($event == NULL) {
            'Evento Inexistente';
        }

        return view('admin/events/records')->with('event', $event);

    }

}
