<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use App\Blog;
use App\BlogsComment;
use Auth;

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

    public function getComment(Request $request) {

        $comments = BlogsComment::where('blog_id', $request->blog_id)->paginate(7);
        return response()->json($comments);

    }

    public function newComment(Request $re) {

        if(Auth::check()) {

            $comment = new BlogsComment();

            $comment->user_id = Auth::id();
            $comment->blog_id = $re->blog_id;
            $comment->comment = $re->comment;
            $comment->save();

            return response()-json($comment);

        }

    }
}
