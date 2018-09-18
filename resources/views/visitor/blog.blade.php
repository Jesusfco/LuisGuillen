@extends('structure.visitor')

@section('title', 'Blog || Luis Guillen || Couch Mental')
@section('activeLink', 'blog')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/blog.css') }}">    
@endsection

@section('content')  

<div class="headBlog backgroundImg" style="background-image: url({{ url('images/blog/background.jpg')}})">
    <br>
    <br><br><br><br><br><br><br>
    <div class="container">
        <div class="line"></div>
        <h1>Blog - Luis Guillén</h1>
    </div>
</div>

<section class="blogContainer container">

        @foreach($blogs as $blog)
    
        <div class="blog-piece">

            <img src="{{ url('images/blog/' . $blog->id . '/' . $blog->img) }}">

            <div>
                <h3> {{ $blog->title}}</h3><br>
                <p>{{ $blog->resume }}</p>
                <br>
                <hr>
                <a href="{{ url('blog', $blog->id ) }}"><button class="button">Leer más...</button></a>
            </div> 

        </div>

        @endforeach

</section>

@endsection