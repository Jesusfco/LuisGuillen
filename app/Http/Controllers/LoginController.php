<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    
    public function login() {

        if (Auth::check()) {
            return redirect('app');
        }

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

    public function logout(){
        if (Auth::check()) {

            Auth::logout();

        }

        return redirect('/');

    }

    public function homeApp() {

        if (Auth::check()) {

            return view('admin/home');

        }

        return back();

    }

    
}
