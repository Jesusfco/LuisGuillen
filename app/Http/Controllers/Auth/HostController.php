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

        $record = $this->storeRecord($receipt);

        return redirect('app/events/records/' . $receipt->id);

    }

    public function records($id) {

        $event = Event::find($id);
        if($event == NULL) {
            'Evento Inexistente';
        }

        return view('admin/events/records')->with('event', $event);

    }

    public function getRecords($id) {
        $records = Record::where('event_id', $id)->with('user')->get();
        return response()->json($records);
    }

    public function verifyRecord($id, Request $request) {

        $receipt = Receipt::find($request->receipt_id);
        if($receipt == NULL) {
            return response()->json(['msj' => 'Boleto Inexistente'], 422);
        }

        $check = Record::where([
            ['user_id', $receipt->user_id],
            ['event_id', $receipt->event_id]
            ])->first();

        if($check != NULL) {
            return response()->json(['msj' => 'Asistencia creada previamente'], 422);
        }

        $receipt = Receipt::where('id', $request->receipt_id)->with(['user', 'event'])->get()->first();
        
        return response()->json($receipt);
        

    }

    public function postRecord($id, Request $request) {

        $receipt = Receipt::find($request->receipt_id);
        $check = Record::where([
            ['user_id', $receipt->user_id],
            ['event_id', $receipt->event_id]
            ])->first();

        if($check != NULL) {
            return response()->json(['msj' => 'Asistencia creada previamente', 422]);
        }

        $record = $this->storeRecord($receipt);
        return response()->json($record);

    }

    public function storeRecord($receipt) {
        $record = new Record();
        $record->user_id = $receipt->user_id;
        $record->event_id = $receipt->event_id;
        $record->save();
        return $record;
    }

}
