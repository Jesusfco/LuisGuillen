@extends('structure.admin')
@section('title', 'Dudas Evento')
@section('content')            
<h5>Eventos >> Preguntas de clientes</h5>
<p>Evento: {{ $event->name }} </p>
  <form class="row" role="form" v-if="doubtSelected" v-on:submit.prevent="update()">
    <p>@{{ doubtEdit.question}}</p>

    <div class="input-field col l6 s12">
            <select v-model="doubtEdit.public">            
                <option value="0">Privado</option>
                <option value="1">Publico</option>              
            </select>
            <label>Publico</label>
          </div>
    
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Respuesta</label>
      <textarea class="form-control"  placeholder="Escribe una respuesta" required v-model="doubtEdit.answer"></textarea>
    </div>
    <div class="form-group col s12">
        <button type="submit" class="btn blue">Actualizar</button>
        <button type="button" v-on:click="cancelEdit()" class="btn red">Cancelar</button>
    </div>

  </form>


  <table v-if="!doubtSelected">
        <thead>        
            <th>#</th>
            <th>Pregunta</th>
            <th>Respuesta</th>                
            <th>Cliente</th>
            <th>Publico</th>
            <th>Fecha / Hora</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <tr v-for="doubt in doubts">            
                <td>@{{ doubt.id }}</td>
                <td>@{{ doubt.question }}</td>
                <td>@{{ doubt.answer }}</td>                    
                <td>@{{ doubt.name }}</td>                    
                <td>@{{ doubt.public }}</td>                    
                <td>@{{ doubt.created_at }}</td>                    
                <td>
                    <button v-on:click="edit(doubt)" class="btn blue">Editar</button>
                    <button v-on:click="destroy(doubt.id)"  class="btn red">Eliminar </button>
                </td>
            </tr>
        </tbody>
    </table>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
    <script>
    
            var app = new Vue({
                el: '#app',
              
        
                data: {
        
                    idEvent: {{ $event->id }},
                    doubts: [],
                    doubtSelected: false,                                      
        
                    doubtEdit: {
                        id: null,
                        question: '',
                        event_id: null,
                        question: null,
                        answer: null,
                        responder_id: null,
                        user: null,
                        public: null,
                    }
                   
                },
        
                created: function () {
        
                    
                    axios.get(this.idEvent + '/getDoubts')
                        .then((response) => {
                            
                            for(let d of response.data) {
                                this.doubts.push(d);
                            }
                            
                        }).catch(function(error) {
        
                        });
        
                },
        
                methods: {
                           
                              
                    cancelEdit:function() {
                        this.doubtSelected = false;
                    },
                    edit: function(doubt) {
                        this.doubtSelected = true;
                        this.doubtEdit = doubt;
                        setTimeout(() => $('select').formSelect(), 100);
                        
                    },
        
                    update: function() {
        
                        var formD = new FormData();
                        formD.append('id', this.doubtEdit.id);
                        formD.append('question', this.doubtEdit.question);
                        formD.append('answer', this.doubtEdit.answer);
                        formD.append('public', this.doubtEdit.public);
                       
                        axios.post(this.idEvent + '/updateDoubt', formD)
        
                            .then((response)  => {
        
                                this.doubtSelected = !this.doubtSelected;                        
        
                                for(let i = 0; x < this.doubts.length; i++) {
                                    
                                    if(this.doubts[i].id == response.data.id) { 
                                        this.doubts[i].question = response.data.question; 
                                        this.doubts[i].answer = response.data.answer; 
                                        this.doubts[i].public = response.data.public; 
                                    }
        
                                }                                                                        
        
                            }).catch((error) => {                        
        
                            });
                    }, 
        
                    destroy: function(id) {
        
                        var formD = new FormData();
                        formD.append('id', id);                
        
                        axios.post(this.idEvent + '/deleteDoubt', formD)
        
                            .then((response) => {
        
                                let i = 0;
        
                                for(let d of this.doubts) {
                                    if(d.id == id) {
                                        break;
                                    }
        
                                    i++;
                                }
        
                                this.doubts.splice(i,1);
        
                            }).catch(function(error) {  });
                    },                      
        
                },
        
             
            });
            
    </script>
    
@endsection