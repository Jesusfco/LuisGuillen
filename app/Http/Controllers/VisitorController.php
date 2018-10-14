<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use App\Blog;
use App\BlogsComment;
use App\Event;
use App\EventsDoubt;
use Auth;
use App\User;
use Session;

class VisitorController extends Controller
{
    public function index() {
        $blogs = Blog::orderBy('date', 'DESC')->limit(3)->get();
        $event = Event::where('principal', true)->first();
        
        return view('visitor/index')->with(['blogs' => $blogs, 'event' => $event]);
    }

    public function blog() {
        $blogs = Blog::orderBy('date', 'DESC')->paginate(15);
        return view('visitor/blog')->with(['blogs' => $blogs]);
    }   

    public function readBlog($id) {
        $blog = Blog::find($id);
        if($blog == NULL) return 'Entrada inexistente';
        return view('visitor/readBlog')->with(['blog' => $blog]);
    }

    public function events() {
        $events = Event::orderBy('date_from', 'DESC')->paginate(15);
        return view('visitor/events')->with(['events' => $events]);
    }

    public function readEvent($id) {
        $event = Event::find($id);
        if($event == NULL) return 'Evento inexistente';
        return view('visitor/readEvent')->with(['event' => $event]);
    }

    public function newDoubt(Request $re, $id) { 
        $doubts = EventsDoubt::where([
            ['user_id', Auth::id()],
            ['event_id', $id],
            ['answer',  NULL]
            ])->get();

        if(count($doubts) != 0) {
            return 0;
        }

        $doubt = new EventsDoubt();
        $doubt->user_id = Auth::id();
        $doubt->event_id = $id;
        $doubt->question = $re->question;
        $doubt->save();

        return response()->json($doubt);

    }

    public function getDoubts($id) {
        
        $doubts = EventsDoubt::where([
                        ['event_id', '=', $id],
                        ['public', '=', true ],
                            ])->get();
        
        return response()->json($doubts);

    }

    public function myDoubts($id) {
        
        $doubts = EventsDoubt::where([
            ['event_id',  $id],
            ['user_id',  Auth::id() ],
                ])->get();

        return response()->json($doubts);

    }

    public function destroyDoubt($id, Request $re) {
        EventsDoubt::find($re->id)->delete();
        return 1;
    }

    public function help() {
        return view('aspects');
    }

    public function mail(){
		
        Mail::send(new ContactMail());

        return 'Mail enviado || SERVIDOR';
        
    }

    public function getComment($id,Request $request) {

        $comments = BlogsComment::where('blog_id', $id)->orderBy('created_at', 'DESC')->paginate(7);

        for($i = 0; $i < count($comments); $i++) {

            $user = User::find($comments[$i]->user_id);

            if($user == NUll) {
                $user->name = 'Usuario Desconocido';
                $user->img = NULL;
            }
            $comments[$i]->user = $user->name;
            $comments[$i]->img = $user->img;

        }

        return response()->json($comments);

    }

    public function newComment(Request $re) {

        if(Auth::check()) {

            $comment = new BlogsComment();

            $comment->user_id = Auth::id();
            $comment->blog_id = $re->blog_id;
            $comment->comment = $re->comment;
            $comment->save();

            $comment->user = Auth::user()->name;
            $comment->img = Auth::user()->img;

            return response()->json($comment);

        }

    }

    public function saveLastUrlLoginFacebook(){

        Session::put('lastUrl', url()->previous());        

        return redirect('/auth/facebook');

    }
}
