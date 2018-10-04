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


<section class="blogContainer container" id="app">

        
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
            <br>
            
            <div class="fb-share-button" data-href="{{ url()->current()}}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
            
            <br><br>
            <hr>

            {{-- SECCION DE COMENTARIOS --}}

            @if(Auth::check())         

            <div class="newComment flex">

                <div class="avatar">
                
                    @if(Auth::user()->img != NULL)
                        <img src="{{ url('images/users', Auth::user()->img) }}">
                    @else
                        <img src="{{ url('images/app/user.png') }}">
                    @endif
                </div>

                <div class="text ">
                    {{-- <h5>Agrega un comentario</h5> --}}

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