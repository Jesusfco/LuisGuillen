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
            ->orderBy('name','asc')
            ->paginate(15);
        return view('admin/users/list')->with(['users'=> $users]);
    }

    public function create() {
        return view('admin/users/create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',             
        ]);
 
        $user = new User();

        $user->name = $this->upper($request->name);
        $user->email = strtolower($request->email);
        $user->user_type = $request->user_type;
        $user->status = 1;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->city = $this->upper($request->city);
        $user->state = $this->upper($request->state);
        $user->country = $this->upper( $request->country);

        $user->save();

        if($request->file('img') != NULL)
            $this->saveProfileImage($user, $request->file('img'));        

        return redirect('/app/users')->with('msj', 'Usuario Creado');

    }

    public function edit($id) {
        $user = User::find($id);
        if($user == NULL) return 'Usuario Inexistente';
        return view('admin/users/edit')->with('user', $user);
    }

    public function update($id, Request $request) {

        $user = User::find($id);

        if($user == NULL) return 'Usuario Inexistente';

        $check = User::where('email', 'LIKE', $request->email)->first();

        if(isset($check->id)) {            
            if($check->id != $id) {                
                return back()->with('dup', $request->email);                
            }
        } 

        $user->name = $this->upper($request->name);
        $user->email = strtolower($request->email);
        $user->user_type = (int)$request->user_type;
        $user->status = (int)$request->status;
        $user->gender =(int) $request->gender;
        $user->birthday = $request->birthday;
        $user->city = $this->upper($request->city);
        $user->state = $this->upper($request->state);
        $user->country =$this->upper( $request->country);

        $user->save();

        if($request->file('img') != NULL)
            $this->saveProfileImage($user, $request->file('img'));     

        return back()->with('msj', 'Usuario Actualizado');

    }

    public function saveProfileImage (User $user, $img) {

        ini_set('memory_limit','256M');

        if($user->img != NULL) {
            File::delete('images/users/' . $user->img);
        }

        $user->img = $user->id . '.' . $img->getClientOriginalExtension();

        $image = Image::make($img);    
        $image->fit(250, 250);
        $image->save('images/users/' . $user->img);

        $user->save();

    }

    public function upper($string) {
        // $string =  strtr($string, "ÁÉÍÓÚ", "áéíóú");
        // $string = strtolower($string);
        // $string = ucwords($string);
        $string = strtoupper($string);
        $string =  strtr($string, "áéíóú", "ÁÉÍÓÚ");
        return $string;
    }

}
