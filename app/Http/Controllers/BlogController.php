<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogPhoto;  

class BlogController extends Controller
{

    public function getSingleBlog(Request $request) {

        $blog = Blog::where('title', 'LIKE', '%' . $request->title . '%')->first();

        return response()->json($blog);

    }

    public function getIndexBlog() {

        $blogs = Blog::select('title', 'resume', 'date', 'img')->orderBy('date','desc')->limit(3)->get();

        return response()->json($blogs);
    }
   
}
