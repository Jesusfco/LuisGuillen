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


<section class="blogContainer container" id="app">

            <br>

            <h1 class="title"> {{ $event->name}}</h1>
            
            
            <img src="{{ url('images/events/' . $event->id . '/' . $event->img) }}">
            <h4> {{ $event->date_from }}</h4>
            <p>{{ $event->resume}}</p>            

            @if(Auth::check())
            <div class="justify-text">{!! $event->description !!}</div>   


            @else
                

            <h3 class="centerText">Inicia Sesión para leer todo el evento</h3>

            <a href="{{ url('lastUrl/LoginFacebook')}}" class="loginFacebookBtn">
                <button><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</button>
            </a>

            @endif



            <hr>
            <br>
            
            <div class="fb-share-button" data-href="{{ url()->current()}}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
            
            <br><br>
            <hr>
            

</section>
<br>

@endsection

@section('scripts')

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1&appId=951140095064464&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>    

@endsection