<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Receipt;
use App\Event;
use Auth;

class ReceiptsController extends Controller
{ 

    public function __construct() {
        $this->middleware('admin');
    }

    public function list(Request $request) {
        $receipts = Receipt::orderBy('id','desc')
            ->paginate(25);
        return view('admin/receipts/list')->with(['receipts'=> $receipts]);
    }

    public function create() {
        return view('admin/receipts/create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'amount' => 'required',
            'event_id' => 'required',
            'client_id' => 'required',                        
        ]);
            
        $receipt = new Receipt();
        $receipt->amount = $request->amount;
        $receipt->event_id = $request->event_id;
        $receipt->user_id = $request->client_id;
        $receipt->creator_id = Auth::id();
        $receipt->save();

        return redirect('app/receipts');

    }

    public function edit(Request $request, $id) {
        $receipt = Receipt::find($id);
        if($receipt == NULL) return 'El recibo no existe';
        return view('admin/receipts/edit')->with('receipt', $receipt);
    }
    
    public function update($id, Request $request) {
        $receipt = Receipt::find($id);
        $receipt->amount = $request->amount;
        $receipt->save();

        return back()->with('msj', 'Monto Actualizado del recibo');
    }

    public function destroy($id) {
        Receipt::find($id)->delete();
        return back();
    }

    public function createEvent($id) {
        $event =  Event::find($id);
        if($event == NULL) return 'No se puede  encontrar el evento';
        return view('admin/receipts/create')->with('event', $event);
    }

}
