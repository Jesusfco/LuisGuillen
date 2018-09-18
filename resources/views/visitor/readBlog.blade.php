@extends('structure.visitor')

@section('title', $blog->title . ' || Luis Guillen || Couch Mental')
@section('activeLink', 'blog')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/article.css') }}">    
@endsection

@section('content')  


<br>
    <br><br>


<section class="blogContainer container">

        
            <div class="autor flex">
                <div class="avatar">
                    <img src="{{ url('images/users/2.jpg') }}">
                </div>

                <div class="text flex centerElements">
                    
                    <p class="outMargin"> Autor: <span class="ABlack">Luis Guillén</span> - Escrito: {{ $blog->created_at }}</p>
                </div>
            </div>

            <br>

            <h1 class="title"> {{ $blog->title}}</h1>
            <p>{{ $blog->resume}}</p>
            <img src="{{ url('images/blog/' . $blog->id . '/' . $blog->img) }}">
            
            <h4> {{ $blog->date }}</h4>

            <p>{!! $blog->text !!}</p>            

</section>

@endsection