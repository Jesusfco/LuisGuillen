<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class VisitorController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function help() {
        return view('aspects');
    }

    public function mail(){
		
        Mail::send(new ContactMail());

        return 'Mail enviado || SERVIDOR';
        // Mail::send(['text' => 'mail'], ['name', 'JESUS RODRIGUEZ'], function($message){
        // 	$message->to('jfcr@live.com', 'TO Bitfumes')->subject('TEST EMAIL');
        // 	$message->from('rodriguez@amerigas.mx', 'Rodriguez');

        // 	$message->to('rodriguez@amerigas.mx', 'TO Bitfumes')->subject('TEST EMAIL');
        // 	$message->from('rodriguez@amerigas.mx', 'Rodriguez');
        // });
}
}
