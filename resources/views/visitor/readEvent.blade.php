@extends('structure.visitor')

@section('title', $event->name . ' || Luis Guillen || Couch Mental')
@section('activeLink', 'event')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/article.css') }}">    
<meta property="og:url"                content="{{ url('eventos', $event->id)}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $event->name }}" />
    <meta property="og:description"        content="{{ $event->resume }}" />
    <meta property="og:image"              content="{{ url('images/events/' . $event->id . '/' . $event->img) }}" />

    
@endsection

@section('content')  


<br>
    <br><br>


<section class="blogContainer container" id="app">

{{--         
            <div class="autor flex">
                <div class="avatar">
                    <img src="{{ url('images/users/2.jpg') }}">
                </div>

                <div class="text flex centerElements">
                    
                    <p class="outMargin"> Autor: <span class="ABlack">Luis Guillén</span> - Escrito: {{ $blog->created_at }}</p>
                </div>
            </div> --}}

            <br>

            <h1 class="title"> {{ $event->name}}</h1>
            
            <img src="{{ url('images/events/' . $event->id . '/' . $event->img) }}">
            <h4> {{ $event->date_from }}</h4>
            <p>{{ $event->resume}}</p>            

            <div class="justify-text">{!! $event->text !!}</div>   
            

           

</section>

@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>    

@endsection