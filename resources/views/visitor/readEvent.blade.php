@extends('structure.visitor')

@section('title', $event->name . ' || Luis Guillen || Couch Mental')
@section('activeLink', 'event')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/readEvent.css') }}">    
<meta property="og:url"                content="{{ url('eventos', $event->id)}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $event->name }}" />
    <meta property="og:description"        content="{{ $event->resume }}" />
    <meta property="og:image"              content="{{ url('images/events/' . $event->id . '/' . $event->img) }}" />

    <style>

    </style>
    
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


            <hr>
            <br>
            
            <div class="fb-share-button" data-href="{{ url()->current()}}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
            
            <br><br>
            <hr>

             {{-- SECCION DE PREGUNTAS --}}

            <h4 class="centerText" v-if="doubts.length > 0">Preguntas Destacadas</h4>
            <div class="doubt" v-for="doubt in doubts">

                <div class="text">                                                
                    <p><i class="fas fa-question-circle"></i>  @{{ doubt.question }}<br>
                    <i class="fas fa-comment-alt"></i>  @{{ doubt.answer }}</p>
                </div>

            </div>    

            <hr> 

            <div class="newComment flex">
 
                <div class="avatar">
                 
                    @if(Auth::user()->img != NULL)
                        <img src="{{ url('images/users', Auth::user()->img) }}">
                    @else
                        <img src="{{ url('images/app/user.png') }}">
                    @endif

                </div>

                <div class="text ">
                    <h5>¿Quieres sabes más?</h5>

                    <form v-on:submit.prevent="newDoubt()">                    
                        <textarea v-model="doubt.question" placeholder="Escribe una pregunta"></textarea>
                        <span class="messageComment" v-if="!validateLength">Su comentario es demasiado extenso</span>
                        <p class="counter">@{{ doubt.question.length }} / 191</p>
                        
                        <button>Preguntar</button>
                    </form>

                </div>

            </div>
            
            <h4 class="centerText" v-if="myDoubts.length > 0">Mis Preguntas</h4>
            <div class="doubt" v-for="doubt in myDoubts">                

                <div class="text">                                                
                    <p><i class="fas fa-question-circle"></i>  @{{ doubt.question }}</p>
                    <p v-if="doubt.answer != null"><i class="fas fa-comment-alt"></i>  @{{ doubt.answer }}</p>
                    <p v-on:click="deleteDoubt(doubt)"  v-if="doubt.answer == null" class="deleteP"> Eliminar mi pregunta <i class="fas fa-trash-alt"></i></p>
                </div>

            </div>    
             

            @else
                

            <h3 class="centerText"><a href="{{ url('login')}}">Inicia Sesión</a> para leer todo el evento</h3>

            <a href="{{ url('lastUrl/LoginFacebook')}}" class="loginFacebookBtn">
                <button><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</button>
            </a>

            @endif



           
            
            

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
    <script>

    var app = new Vue({
        el: '#app',
        data: {
            doubt: {
               user_id: @if(Auth::check()) {{Auth::id()}} @else null @endif,
               event_id: {{ $event->id }},
               question: '',
               created_at: null,               
           },

           doubts: [],
           myDoubts: [],
           validateLength: true,
           paginate: 1,
           url: '{{url("/")}}/'

        },

        created: function () {                    
            this.getDoubts();   
            this.getMyDoubts();                                             
        },

        methods: {
            newDoubt: function() {
                
                if(this.doubt.question.length > 191) {
                    this.validateLength = false;
                    return;
                }

                this.validateLength = true;

                var formD = new FormData();
                formD.append('event_id', this.doubt.event_id);
                formD.append('user_id', this.doubt.user_id);
                formD.append('question', this.doubt.question);
                               
                axios.post( this.doubt.event_id + '/newDoubt', formD)                
                    .then((response) => {

                        if(response.data == false) {
                            alert('Ya tiene una pregunta en proceso, no puede realizar mas');
                        }
                        // response.data.img = app.setImageUrl(response.data.img);   
                        response.data.created_at = app.formatTimestamp( response.data.created_at);   
                        this.myDoubts.unshift(response.data);
                        this.setNewDoubt();

                    }).catch((error) => {

                    });

            },

            deleteDoubt: function(doubt) {

                var formD = new FormData();
                formD.append('id', doubt.id);
               
                axios.post(this.doubt.event_id + '/destroyDoubt', formD)

                .then((response) => {

                    let i = 0;

                    for(let d of this.doubts) {

                        if(d.id == doubt.id) {
                            this.doubts.splice(i,1);
                            break;
                        }

                        i++;
                    }

                    i = 0;
                    for(let d of this.myDoubts) {

                        if(d.id == doubt.id) {
                            this.myDoubts.splice(i,1);
                            break;
                        }

                        i++;
                    }

                }).catch((error) => {
                    
                });

            }, 

            setImageUrl: function(img){

                if(img == null ){
                    return app.url + 'images/app/user.png';
                }
                return app.url + 'images/users/' + img;

            },

            
            setNewDoubt: function() {
                
                this.doubt.question = '';                                                    

            }, 

            getDoubts: function() {                

                axios.get( this.doubt.event_id + '/getDoubts?page=' + this.paginate)                        

                .then((response) => {
                    console.log(response.data);
                    for(let x of response.data) {

                        x.created_at = app.formatTimestamp(x.created_at);
                        // x.img = app.setImageUrl(x.img);                        
                        this.doubts.push(x);

                    }    
                    
                    this.paginate++;

                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });                 

            },

            getMyDoubts: function() {
                axios.get( this.doubt.event_id + '/myDoubts?page=' + this.paginate)                        

                .then((response) => {                    
                    for(let x of response.data) {

                        x.created_at = app.formatTimestamp(x.created_at);
                        // x.img = app.setImageUrl(x.img);                        
                        this.myDoubts.push(x);

                    }    
                    
                    // this.paginate++;

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