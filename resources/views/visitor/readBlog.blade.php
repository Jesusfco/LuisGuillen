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
                        <span>@{{ comment.comment.length }} / 150</span>
                        <button>Agregar Comentario</button>
                    </form>

                </div>

            </div>

            @else

            @endif

            <div class="commentary" v-for="com in comments">

                <div class="autor flex">

                    <div class="avatar">
                        <img v-bind:src="com.img">
                    </div>

                    <div class="text flex centerElements">                        
                        <p class="outMargin">  <span class="ABlack">@{{ com.user }}</span></p>
                    </div>

                </div>

                <p>@{{ com.comment }}</p>
                <p>@{{ com.created_at }}</p>


            </div>            

</section>

@endsection

@section('scripts')

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
                

                var formD = new FormData();
                formD.append('blog_id', this.comment.blog_id);
                formD.append('user_id', this.comment.user_id);
                formD.append('comment', this.comment.comment);
                               
                axios.post( this.comment.blog_id + '/newComment', formD)
                

                .then(function(response) {

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
                        console.log(x);
                        con
                        app.comments.push(x);
                    }
                
                    
                    app.paginate++;

                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });

            },
            
        }
        });
    
    </script>

@endsection