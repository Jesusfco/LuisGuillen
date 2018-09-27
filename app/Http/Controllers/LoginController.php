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

    public function resetPassword(){
        return view('auth/passwords/email');
    }

    public function sentTokenReset(Request $request) {

        
        $user = User::where('email', 'LIKE', $request->email)->first();        

        if(isset($user->id)){

            $reset = new Reset();
            $reset->user_id = $user->id;
            $reset->token = hash('tiger192,3', rand(1000, 10000));
            $reset->save();

            $data = array(
                'token' => $reset->token,
                'email' => $user->email,
                'name' => $user->name
            );

            
            $request->token = $reset->token;
            $request->email = $user->email;
            $request->email = $user->email;

            $data = (object) $data;

            Mail::send(new ResetMail($data));

            Session::flash('success', 'asdf');
            return back();

        } else {

            Session::flash('errorEmail', 'asdf');
            return back();

        }
    }

    public function resetPassword2($token){

        $reset = Reset::where('token', 'LIKE', $token)->first();

        if(isset($reset->id)){

            $user = User::find($reset->user_id);
            return view('auth/passwords/reset')->with('email', $user->email);

        } else {

            return redirect('login');

        }

    }

    public function updatePassword($token, Request $re){

        $reset = Reset::where('token', 'LIKE', $token)->first();
        
        if(isset($reset->id)){
            $user = User::find($reset->user_id);
            $user->password =  bcrypt($re->password);
            $user->save();

            Auth::login($user);
            $reset->delete();
            
        } 
          
        return redirect('login');
        
    }

    
}
