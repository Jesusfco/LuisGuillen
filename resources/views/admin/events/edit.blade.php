@extends('structure.admin')

@section('content')            

    <h1>Editar Evento</h1>
    <button v-on:click="returnEditEvent()">Editar Evento</button>
    <button v-on:click="select = 2">Adminsitrar Preguntas</button>

    @if (session()->has('msj'))
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel blue">
            <span class="white-text"> El evento ha sido actualizado.
            </span>
            </div>
        </div>
        </div>
    @endif
    {{-- v-bind:class="{ active: select == 1 }" --}}
    <form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return crearNoticia()" v-if="select == 1">
        {{ csrf_field() }}

        <div class="form-group col l12">
            <label for="exampleInputEmail1">Nombre del Evento</label>
            <input type="text" name="name"  value="{{ $event->name }}" class="form-control"  placeholder="Titulo de la noticia" required>
        </div>

        <div class="form-group col l12">
            <label for="exampleInputPassword1">Resumen</label>
            <input type="text" name="resume"  value="{{ $event->resume }}" class="form-control"  placeholder="Escribe brevemente de que se trara la noticia" required>
        </div>

        <div class="form-group col s6 l4">
            <label for="exampleInputPassword1">Costo</label>
            <input type="number" name="cost"  value="{{ $event->cost }}" class="form-control"  placeholder="$$$$$" required>
        </div>

        <div class="form-group col s6 l4">
            <label for="exampleInputPassword1">Lugar</label>
            <input type="text" name="place" value="{{ $event->place }}" class="form-control"  placeholder="Tuxtla Gtz, CDMX" required>
          </div>

        <div class="form-group col s6 l4">
            <label>Actualizar Imagen</label><br>
            <input type="file" name="img" id="imagen" accept="image/x-png,image/gif,image/jpeg" >

            <p class="help-block">Cargue una fotografía del evento</p>
        </div>                       
            
        <div class="form-group col s12 l6">
            <label>Fecha Inicio</label>
            <input type="date" name="date_from"  value="{{ $event->date_from }}" class="form-control" required>
        </div>

        <div class="form-group col s12 l6">
            <label>Fecha Final - Opcional</label>
            <input type="date" name="date_to" value="{{ $event->date_to }}" class="form-control" >
        </div>

        <div class="form-group col s6 l4">
            <label>Cupo</label>
            <input type="number" name="capacity" value="{{ $event->capacity }}" class="form-control" required>
          </div>
        
        <div class="col l12">
                
            <label>Da una descripcion completa de tu evento</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                {{ $event->description }}
            </textarea>
        </div>

        <input type="hidden" class="contenidoNota" name="description" required>
        
        {{-- <div class="form-group">
            <label>Iframe de Youtube</label>
            <input type="text" name="youtube" class="form-control" name="youtube">
        </div> --}}
        
        
        <button type="submit" class="btn btn-default">Actualizar Evento</button>
    </form>

    {{-- Div de administracion de pregunas --}}
    <div v-if="select == 2">

        <form class="row" v-on:submit.prevent="create()" v-if="!questionSelected">
            <input type="text" placeholder="Nueva Pregunta" v-model="questionNew.question">
            <button type="submit" class="btn btn-default">Nueva Pregunta</button>
        </form>

        <form class="row" v-on:submit.prevent="update()" v-if="questionSelected">
            <input type="text" placeholder="Escribe una Pregunta para obtener información de los clientes" v-model="questionEdit.question">
            <button type="submit" class="btn btn-default">Actualizar Pregunta</button>
        </form>

        <table>
            <thead>        
                <th>#</th>
                <th>Pregunta</th>
                <th># Respuestas</th>                
                <th>Acciones</th>
            </thead>
            <tbody>
                <tr v-for="question in questions">            
                    <td>@{{ question.id }}</td>
                    <td>@{{ question.question }}</td>
                    <td>@{{ question.answersCount }}</td>                    
                    <td>
                        <button v-on:click="edit(question)" class="btn blue">Editar</button>
                        <button v-on:click="destroy(question.id)"  class="btn red">Eliminar </button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    {{-- Termina Div de administracion de preguntas --}}
    

    <br><br>
    <br><br>

@endsection

@section('scripts')

    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        $(document).ready(function() {
            CKEDITOR.replace( 'editor1' );
        });

        function crearNoticia(){
            var data = CKEDITOR.instances.editor1.getData();
            $('.contenidoNota').val(data);

            if(data.length == 0) return false;

//            return false;
        }
    </script>

    <script>
    
    var app = new Vue({
        el: '#app',
      

        data: {

            idEvent: {{ $event->id }},
            questions: [],
            questionSelected: false,
            select: 1,
            questionNew: {
                event_id: {{ $event->id }},
                question: '',
            },

            questionEdit: {
                id: null,
                question: '',
                event_id: null,
            }
           
        },

        created: function () {

            
            axios.get(this.idEvent + '/getQuestions')
                .then(function(response) {
                    
                    for(let d of response.data) {
                        app.questions.push(d);
                    }
                    
                }).catch(function(error) {

                });

        },

        methods: {

            returnEditEvent: function() {
                this.select = 1 ;
                setTimeout(() => CKEDITOR.replace( 'editor1' ), 200);
                
            },

            create: function() {

                var formD = new FormData();
                formD.append('question', this.questionNew.question);
                
                axios.post(this.idEvent + '/storeQuestion', formD)

                    .then((response) => {

                        this.questions.push(response.data);
                        this.questionNew.question = '';

                    }).catch(function(error) {   });

            },            

            edit: function(question) {
                this.questionSelected = true;
                this.questionEdit = question;
            },

            update: function() {

                var formD = new FormData();
                formD.append('id', this.questionEdit.id);
                formD.append('question', this.questionEdit.question);
               
                axios.post(this.idEvent + '/updateQuestion', formD)

                    .then((response)  => {

                        this.questionSelected = !this.questionSelected;                        

                        for(let i = 0; x < this.questions.length; i++) {
                            console.log(i)
                            if(this.questions[i].id == response.data.id) { 
                                this.questions[i] = response.data; 
                            }

                        }                                                                        

                    }).catch(function(error) {                        

                    });
            }, 

            destroy: function(id) {

                var formD = new FormData();
                formD.append('id', id);                

                axios.post(this.idEvent + '/deleteQuestion', formD)

                    .then((response) => {

                        let i = 0;

                        for(let d of this.questions) {
                            if(d.id == id) {
                                break;
                            }

                            i++;
                        }

                        this.questions.splice(i,1);

                    }).catch(function(error) {  });
            },                      

        },

     
    });
    
    </script>
@endsection