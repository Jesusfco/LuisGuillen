@extends('structure.visitor')

@section('title', $blog->title . ' || Luis Guillen || Couch Mental')
@section('activeLink', 'blog')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/article.css') }}">    
    <meta property="og:url"                content="{{ url('blog', $blog->id)}}" />
    <meta property="og:type"               content="article" />
    <meta property="fb:app_id"               content="951140095064464" />
    <meta property="og:title"              content="{{ $blog->title }}" />
    <meta property="og:description"        content="{{ $blog->resume }}" />
    <meta property="og:image"              content="{{ $blog->getImgUrl() }}" />

    <style>
    


    .youtubeContainer {
        position: relative;
        width: 75%;
        margin: 0 auto;
        display: block;
        height: 0;
        padding-bottom: 56.25%;
        margin-bottom: 35px;

    }

    .youtubeContainer iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    @media screen and (max-width: 800px) {
        .youtubeContainer {
            width: 100%;
        }
    }

    </style>
@endsection

@section('content')  

<div class="backgroundImg backgroundArticle" style="background-image: url({{ $blog->getImgUrl() }})"></div>

<section class="blogContainer" id="app">    
    <div class="principalArticle">      
        <p><a href="{{ url('/')}}">Inicio</a> >> <a href="{{ url('/blog')}}"> Blogs</a> >> {{ $blog->title}}

        <h1 class="title"> {{ $blog->title}}</h1>
        <p class="">{{ Carbon::parse($blog->date)->format('M d, Y') }}</p>        
        <p class="resume">{{ $blog->resume}}</p>        
        <img class="imgPrincipalBlog" src="{{ $blog->getImgUrl() }}">
            
            

            {{-- <div class="autor flex">
                <div class="avatar">
                    @if($blog->user->img != NULL)
                    <img src="{{ url('images/users', $blog->user->img) }}">
                    @else
                    <img src="{{ url('images/users/2.jpg') }}">
                    @endif
                </div>
                <div class="text flex centerElements">                    
                    <p class="outMargin"> Autor: 

                        @if($blog->user != NULL)

                            <span class="ABlack">{{ $blog->user->name }}</span>

                        @else

                            <span class="ABlack">Luis Guillén</span> 
                            
                        @endif

                        - Escrito: {{ $blog->created_at }}</p>

                </div>
            </div> --}}

            <div class="justify-text">{!! $blog->text !!}</div>   

            @if($blog->youtube != NULL)
                <div class="youtubeContainer">{!! $blog->youtube !!}</div>
            @endif

            <hr>
            <br>           
            
            <div class="fb-share-button" data-href="{{ url()->current()}}" data-layout="button_count" data-size="" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
            
            <br><br>
            <hr>

            <div class="fb-comments" data-href="{{ url()->current() }}" data-width="" data-numposts="5" data-mobile="true"></div>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v4.0&appId=951140095064464&autoLogAppEvents=1"></script>

            {{-- SECCION DE COMENTARIOS --}}

        {{--     @if(Auth::check())         

            <div class="newComment flex">

                <div class="avatar">
                
                    @if(Auth::user()->img != NULL)
                        <img src="{{ url('images/users', Auth::user()->img) }}">
                    @else
                        <img src="{{ url('images/app/user.png') }}">
                    @endif
                </div>

                <div class="text ">
                    <h5>Agrega un comentario</h5>

                    <form v-on:submit.prevent="newComment()">                    
                        <textarea v-model="comment.comment"></textarea>
                        <span class="messageComment" v-if="!validateLength">Su comentario es demasiado extenso</span>
                        <p class="counter">@{{ comment.comment.length }} / 191</p>
                        
                        <button>Agregar Comentario</button>
                    </form>

                </div>

            </div>

            @else

            <h3 class="centerText">Inicia Sesión para agregar un comentario</h3>

            <a href="{{ url('lastUrl/LoginFacebook')}}" class="loginFacebookBtn">
                <button><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</button>
            </a>

            @endif

            <div class="commentary" v-for="com in comments">

                <div class="autor flex">

                    <div class="avatar">
                        <img v-bind:src="com.img">
                    </div>

                    <div class="text">                        
                        <p class="outMargin">  <span class="">@{{ com.user }}</span></p>
                        <p>@{{ com.comment }}</p>
                        <p class="right-text time">@{{ com.created_at }}</p>
                    </div>

                </div>

                

                
            </div>             --}}
    </div>

    <div class="moreArticles">
        <h5 class="movil">Mas Articulos</h5>
        @foreach($blogs as $article)
        <a href="{{ url('blog', $blog->id)}}" class="article">
            <img src="{{url('images/blog/' . $article->id . '/' . $article->img) }}">            
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->resume }}</p>
        </a>
        @endforeach
    </div>
</section>

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
    <script>
    
    var app = new Vue({
        el: '#app',
        data: {
           comment: {
               user_id: @if(Auth::check()) {{Auth::id()}} @else null @endif,
               blog_id: {{ $blog->id }},
               comment: '',
               created_at: null,               
           },

           comments: [],
           validateLength: true,
           paginate: 1,
           url: '{{url("/")}}/'

        },

        created: function () {

            setTimeout(() => {
                                
                app.getComments();                 
                
            }, 100);

        },

        methods: {
            newComment: function() {
                
                if(this.comment.comment.length > 191) {
                    this.validateLength = false;
                    return;
                }

                this.validateLength = true;

                var formD = new FormData();
                formD.append('blog_id', this.comment.blog_id);
                formD.append('user_id', this.comment.user_id);
                formD.append('comment', this.comment.comment);
                               
                axios.post( this.comment.blog_id + '/newComment', formD)
                

                .then(function(response) {
                    response.data.img = app.setImageUrl(response.data.img);   
                    response.data.created_at = app.formatTimestamp( response.data.created_at);   
                    app.comments.unshift(response.data);
                    app.setNewComment();


                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });

            },

            deleteDesc: function(desc) {

                var formD = new FormData();
                formD.append('id', desc.id);
               

                axios.post('../deleteDescription', formD)

                .then(function(response) {

                    let i = 0;

                    for(let d of app.descriptions) {

                        if(d.id == desc.id) {
                            break;
                        }

                        i++;
                    }

                    app.descriptions.splice(i,1);

                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });

            }, 

            setImageUrl: function(img){

                if(img == null ){
                    return app.url + 'images/app/user.png';
                }
                return app.url + 'images/users/' + img;

            },

            
            setNewComment: function() {
                
                app.comment.comment = '';                                                    

            }, 

            getComments: function() {                
                
                axios.get( this.comment.blog_id + '/getComment?page=' + app.paginate)
                // axios.get('/getComment')                

                .then(function(response) {
                    for(let x of response.data.data) {
                        x.created_at = app.formatTimestamp(x.created_at);
                        x.img = app.setImageUrl(x.img);                        
                        app.comments.push(x);

                    }                
                    
                    app.paginate++;

                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });

            },

            formatTimestamp: function(datetime) {

                let string = '';

                let date = datetime.split(' ');
                // console.log(date);

                let values = date[0].split('-');

                if(values[1] == '01') {
                values[1] = 'Enero';
                } else if (values[1] == '02') {
                values[1] = 'Febrero';
                } else if (values[1] == '03') {
                values[1] = 'Marzo';
                } else if (values[1] == '04') {
                values[1] = 'Abril';
                } else if (values[1] == '05') {
                values[1] = 'Mayo';
                } else if (values[1] == '06') {
                values[1] = 'Junio';
                } else if (values[1] == '07') {
                values[1] = 'Julio';
                } else if (values[1] == '08') {
                values[1] = 'Agosto';
                } else if (values[1] == '09') {
                values[1] = 'Septiembre';
                } else if (values[1] == '10') {
                values[1] = 'Octubre';
                } else if (values[1] == '11') {
                values[1] = 'Noviembre';
                } else if (values[1] == '12') {
                values[1] = 'Diciembre';
                }

                // return values[2] + ' de ' + values[1] + ' del ' + values[0];
                string =  values[2] + '/' + values[1] + '/' + values[0];
                
                let value = date[1].split(':');

                return value[0] + ':' + value[1] + ' ' + string;

            },
            
        }
        });
    
    </script>

@endsection