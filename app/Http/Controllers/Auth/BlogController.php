<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\BlogPhoto;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class BlogController extends Controller
{
    public function index(Request $request) {

        $noticias = Blog::search($request->name)
            ->orderBy('id','desc')
            ->paginate(15);

        return view('admin/blog/blogs')->with(['noticias'=> $noticias]);
    }

    public function create() {
        return view('admin/blog/createBlog');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required',
             'resume' => 'required',
             'date' => 'required',
             'text' => 'required',
            //  'youtube' => 'required',
             'img' => 'required|image'
 
        ]);
 
        ini_set('memory_limit','256M');

        $img = $request->file('img');
        $file_route = time().'_'. $img->getClientOriginalName();

        $blog = new Blog();

        $blog->title = $request->title;
        $blog->resume = $request->resume;
        $blog->date = $request->date;
        $blog->text = $request->text;
        $blog->youtube = $request->youtube;
        $blog->img = $file_route;
        $blog->user_id = Auth::id();
        $blog->save();

        File::makeDirectory('images/blog/' . $blog->id);

        Image::make($request->file('img'))
        ->fit(900,600)
        ->save("images/blog/" . $blog->id . '/' . $file_route);

        return redirect('/app/blog');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);          
        return view('admin/blog/editBlog')->with(['blog'=> $blog]);
    }

    public function update($id, Request $request) {

        $this->validate($request, [
            'title' => 'required',
             'resume' => 'required',
             'date' => 'required',
             'text' => 'required',
        ]);

        $blog = Blog::find($id);  
        
        if($request->file('img')) {
            ini_set('memory_limit','256M');
            $img = $request->file('img');
            $file_route = time().'_'. $img->getClientOriginalName();



            Image::make($request->file('img'))
                  ->fit(900,600)
                  ->save('images/blog/' . $id . '/' . $file_route);

            File::delete('images/blog/' . $id . '/' .$blog->img);

            $blog->img = $file_route;

        }
        
        $blog->title = $request->title;
        $blog->resume = $request->resume;
        $blog->date = $request->date;
        $blog->text = $request->text;
        $blog->youtube = $request->youtube;
        $blog->save();

        return redirect('/app/blog/update/'.$blog->id);
    }

    public function destroy(Request $request)
    {
        $id =  $request->id;
        $n = Blog::find($id);
        BlogPhoto::where('blog_id', $n->id)->delete();
        File::deleteDirectory('images/blog/' . $n->id);
        $n->delete();
        return 'true';
    }

}
