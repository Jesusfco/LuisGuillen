<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use App\Blog;
use App\BlogsComment;
use Auth;
use App\User;

class VisitorController extends Controller
{
    public function index() {
        $blogs = Blog::orderBy('date', 'DESC')->limit(3)->get();
        return view('visitor/index')->with(['blogs' => $blogs]);
    }

    public function blog() {
        $blogs = Blog::orderBy('date', 'DESC')->paginate(15);
        return view('visitor/blog')->with(['blogs' => $blogs]);
    }

    public function readBlog($id) {
        $blog = Blog::find($id);
        return view('visitor/readBlog')->with(['blog' => $blog]);
    }

    public function help() {
        return view('aspects');
    }

    public function mail(){
		
        Mail::send(new ContactMail());

        return 'Mail enviado || SERVIDOR';
        
    }

    public function getComment($id,Request $request) {

        $comments = BlogsComment::where('blog_id', $id)->paginate(7);

        for($i = 0; $i < count($comments); $i++) {

            $user = User::find($comments[$i]->user_id);
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
}
