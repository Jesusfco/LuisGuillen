@extends('structure.visitor')

@section('title', 'Blog || Luis Guillen || Couch Mental')
@section('activeLink', 'blog')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/blog.css') }}">    
@endsection

@section('content')  

<div class="navPadding headBlog">
    <div class="backgroundImg" style="background-image: url({{ url('images/blog/background3.jpg')}})">

        <div class="container">        
            <h1>Luis Guillén</h1>
            <p class="principalColor">Programador Mental, Hipnotista, Comunicador, Influenciador positivo, conferencista, investigador de la conducta humana.</p>
        </div>

    </div>

</div>

<section class="blogContainer container">

    @for($i = 0; $i < 4; $i++)
        @foreach($blogs as $blog)
    
        <div class="blog-piece">

            <img src="{{ url('images/blog/' . $blog->id . '/' . $blog->img) }}">

            <div class="dataBlog">
                <h3> {{ $blog->title}}</h3>
                <p>{{ $blog->resume }}</p>                                
                <a href="{{ url('blog', $blog->id ) }}">LEER MÁS >></a>                
            </div> 

            <div class="infBlog">
                @if($blog->user != NULL) 
                {{ $blog->user->name }} -
                @endif

                {{ $blog->date}}
            </div>

        </div>

        @endforeach
    @endfor

</section>

@endsection