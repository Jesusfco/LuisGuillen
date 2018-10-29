@extends('structure.admin')
@section('title', 'Eventos')
@section('styles')
    <link href="{{url('assets/sweet/sweetalert.css')}}" rel="stylesheet">
    <link href="{{url('styles/admin/records.css')}}" rel="stylesheet">
@endsection
@section('content')            

            <div class="panel panel-default" id="app">
                <div class="panel-heading">

                    <div class="row">
                    
                        <div class="col-xs-12 col-sm-6">
                            <h5>Evento >> {{ $event->name }} >> Asistentes </h5>
                        </div>      
                        
                        @if($event->betweenDates())
                        <a class="btn blue" v-on:click="openPop()">Registrar Asistencia</a>
                        @endif
                    
                    </div>
                                
                    <table class="striped responsive-table">
                        <thead>
                            <th>ID</th>
                            <th>Asistente</th>
                            <th>Fecha/Hora</th>
                            
                            {{-- <th>Acciones</th> --}}
                        </thead>
                        <tbody>
                        
                        <tr v-for="record in records" >
                        
                            <td>@{{ record.id }}</td>
                            <td>@{{ record.user.name }}</td>
                            <td>@{{ record.created_at }}</td>                            
                            <td>                                
                                {{-- <a href="{{ url('app/events/update/'.$n->id.'') }}" class="btn yellow">Ver </a> --}}
                                {{-- <a  onclick="eliminar({{ $n->id }}, '{{ $n->title }}')" class="btn red"> Eliminar</a> --}}
                            {{-- <a target="_blank" href="{{ url()->current() }}/{{ $n->id}}" class="btn green">Imprimir Ticket</a>                                 --}}
                            </td>
                        </tr>
                        
                        
                    </tbody>
                    </table>                                

            </div>

            <div class="popOut" v-if="recordWindow > 0">

                <div class="backShadow" v-on:click="cancelRegister()"></div>

                <div class="card blue-grey darken-1">


                    <div class="card-content white-text">
                        <div v-if="recordWindow == 1">

                            <span class="card-title">Registrar asistencia</span>
                            <form v-on:submit.prevent="checkTicket()">
                                <span>Numero de boleto</span>
                                <input type="number" v-model="newRecord.receipt_id" id="input1" required min="0">
                                <button class="btn blue" type="submit">Verificar</button>
                            </form>

                        </div>

                        <div v-if="recordWindow == 2">
                            <h4>Evento: @{{ newRecord.event.name }}</h4>
                            <img v-bind:src="'{{ url('images/events') }}/' + newRecord.event.id + '/' + newRecord.event.img" width="100%">
                            <p>Asistente: @{{ newRecord.user.name }}</p>
                            <form v-on:submit.prevent="createNewRecord()">
                                <h5>¿Desea confirmar asistencia?</h5>
                                <button class="btn blue">Confirmar</button>
                                <button v-on:click="cancelRegister()" type="button" class="btn red">Cancelar</button>

                            </form>
                        </div>

                        <div v-if="recordWindow == 3">
                            <h3>Asistencia registrada correctamente</h3>
                            <h4>Evento: @{{ newRecord.event.name }}</h4>
                            <img v-bind:src="'{{ url('images/events') }}/' + newRecord.event.id + '/' + newRecord.event.img" width="100%">
                            <p>Asistente: @{{ newRecord.user.name }}</p>
                        </div>
                        
                    </div>
                    <div class="card-action" v-if="error != null">
                        <p class="red-text">Error: # @{{ error.status }} - <span v-if="error.data != null">@{{ error.data.msj }}</span></p>
                    </div>
                </div>

            </div>
        </div>
            

@endsection

@section('scripts')
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{url('js/aplication/eventList.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
    <script>
    
    var app = new Vue({
        el: '#app',
        data: {

            idEvent: {{ $event->id }},
            records: [],
            recordWindow: 0,            
            newRecord: {
                event_id: {{ $event->id }},
                id: null,
                receipt_id: null,
                created_at: null,

                user: null,
                event: null,
            },
            error: null,


            
           
        },

        created: function () {
            
            axios.get(this.idEvent + '/getRecords')
                .then((response) => {
                    
                    for(let d of response.data) {
                        this.records.push(d);
                    }
                    
                }).catch((error) => {

                });

        },

        methods: { 

            openPop: function() {
                this.recordWindow = 1;
                setTimeout(() =>  document.getElementById("input1").focus(), 100);
                
            },

            cancelRegister: function() {
                this.recordWindow = 0;
                this.newRecord.id = 0;
                this.newRecord.user = null;
                this.newRecord.event = null;
                this.error = null;
            },

            checkTicket: function () {
                this.error = null;
                formData = new FormData();
                formData.append('receipt_id', this.newRecord.receipt_id);
                formData.append('event_id', this.newRecord.event_id);

                axios.post(this.idEvent + '/verifyRecord', formData)
                .then((response) => {
                    
                   this.newRecord.user = response.data.user;
                   this.newRecord.event = response.data.event;
                   this.recordWindow = 2;
                    
                }).catch((error) => {
                    console.log(error);
                    this.error = error;
                });

            },

            createNewRecord: function() {

                formData = new FormData();
                formData.append('receipt_id', this.newRecord.receipt_id);
                formData.append('event_id', this.newRecord.event_id);

                axios.post(this.idEvent + '/postRecord', formData)
                .then((response) => {
                    let record = response.data;
                    record.user = this.newRecord.user;
                    record.event = this.newRecord.event;                    
                    this.records.unshift(record);
                    this.recordWindow = 3;
                    setTimeout(() => {
                        this.cancelRegister();
                    }, 2500);
                    
                }).catch((error) => {
                    this.error = error;
                });


            },
        
        }
    });

    </script>
@endsection
