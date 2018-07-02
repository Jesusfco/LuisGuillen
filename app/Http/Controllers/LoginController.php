<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    
    public function login() {

        return view('login');

    }

    public function signin(Request $request)
    {        
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {

            return redirect('/app/blog');

        }

        return back();
    }

    
}
