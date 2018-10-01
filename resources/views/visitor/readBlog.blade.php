@extends('structure.visitor')

@section('title', $blog->title . ' || Luis Guillen || Couch Mental')
@section('activeLink', 'blog')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/article.css') }}">    
<meta property="og:url"                content="{{ url('blog', $blog->id)}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $blog->title }}" />
    <meta property="og:description"        content="{{ $blog->resume }}" />
    <meta property="og:image"              content="{{ url('images/blog/' . $blog->id . '/' . $blog->img) }}" />

    
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

            <div class="justify-text">{!! $blog->text !!}</div>   

            <hr>

            @if(Auth::check())         

            <div class="autor flex">

                <div class="avatar">
                
                    @if(Auth::user()->img != NULL)
                        <img src="{{ url('images/users', Auth::user()->img) }}">
                    @else
                        <img src="{{ url('images/app/user.png') }}">
                    @endif
                </div>

                <div class="text flex centerElements">
                    <h5>Agrega un comentario</h5><br>

                    <form v-on:submit.prevent="newComment()">                    
                        <textarea v-model="comment.comment"></textarea>
                        <button>Publicar</button>
                    </form>

                </div>

            </div>

            @else

            @endif

            <div class="commentary">

                <div class="autor flex">

                    <div class="avatar">
                        <img src="{{ url('images/users/2.jpg') }}">
                    </div>

                    <div class="text flex centerElements">                        
                        <p class="outMargin">  <span class="ABlack">JESUS FCO CORTES</span></p>
                    </div>

                </div>

                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam, incidunt iste. Error fuga expedita architecto sapiente non. Voluptates similique veritatis iusto doloribus, deleniti distinctio molestiae incidunt quia repudiandae exercitationem? Ipsum.</p>
                <p> 21 de marzo 2018 - 7:00 PM</p>


            </div>            

</section>

@endsection