<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Receipt;

class ReceiptsController extends Controller
{
    public function list(Request $request) {
        $receipts = Receipt::orderBy('id','desc')
            ->paginate(25);
        return view('admin/receipts/list')->with(['receipts'=> $receipts]);
    }

    public function create() {
        return view('admin/receipts/create');
    }

    public function store(Request $request) {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'resume' => 'required',
        //     'date_from' => 'required',            
        //     //  'youtube' => 'required',
        //     'img' => 'required|image',
        //     'description' => 'required',
        //     'place' => 'required'
 
        // ]);
    }
}
