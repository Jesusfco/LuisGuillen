@extends('structure.admin')
@section('title', 'Eventos')
@section('styles')
    <link href="{{url('assets/sweet/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('content')            


            <div class="panel panel-default" id="principal">
                <div class="panel-heading">
                    <div class="row">
                    
                    <div class="col-xs-12 col-sm-6">
                    <h2>Eventos >> Lista</h2>
                    </div>

                    @if(Auth::user()->user_type == 10)
                        <a href="{{ url('app/events/create') }}"><button class="btn">Crear Evento</button></a>
                    @endif

                    <div class="col-xs-12 col-sm-6">
                        
                    <form method="GET" class="navbar-form">
                         <div class="input-group">
                            <input name="name" class="form-control" placeholder="Buscar Evento" autofocus>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Buscar</button>
                            </span>
                        </div>
                    </form>     
                        
                    </div></div>
                    
                    
                </div>
                
                @if(Auth::user()->user_type == 10)
                    <table class="striped responsive-table">
                        <thead>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Costo</th>
                            <th>Fecha</th>
                            <th>Lugares Disponibles</th>
                            <th>Dudas sin contestar</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($events as $n)
                        @if($n->principal == true)
                        <tr id="noticia{{$n->id}}" class="yellow">
                        @else 
                        <tr id="noticia{{$n->id}}">
                        @endif
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->name }}</td>
                            <td>$ {{ $n->cost }}</td>
                            <td>{{ $n->date_from }} @if($n->date_to != NULL) al <br>{{$n->date_to }} @endif</td>
                            <td>{{ $n->avaibleSpace()}}</td>
                        <td><a href="{{ url('app/events/doubts', $n->id) }}">{{ $n->doubtsCountWithoutAnswer()}}</td>
                            <td>
                                
                                <a href="{{ url('app/events/update/'.$n->id.'') }}" class="btn yellow">Editar </a>
                                <a  onclick="eliminar({{ $n->id }}, '{{ $n->title }}')" class="btn red"> Eliminar</a>
                                <a href="{{ url('eventos', $n->id) }}" class="btn green">Ver</a>
                                <a href="{{ url('app/events/highlight', $n->id) }}" class="btn blue">Destacar</a>

                                @if($n->avaibleC > 1)
                                    <a href="{{ url('app/receipts/create', $n->id) }}" class="btn purple">Generar Recibo</a>
                                @endif

                                <a href="{{ url('app/events/tickets', $n->id) }}" class="btn black">Ver Boletos</a>
                                <a href="{{ url('app/events/records', $n->id) }}" class="btn orange">Asistentes</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    </table>
                
                @elseif(Auth::user()->user_type == 3)
                <table class="striped responsive-table">
                        <thead>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Costo</th>
                            <th>Fecha</th>
                            <th>Lugares Disponibles</th>
                            
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($events as $n)
                        @if($n->betweenDates() == true)
                        <tr id="noticia{{$n->id}}" class="yellow">
                        @else 
                        <tr id="noticia{{$n->id}}">
                        @endif
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->name }}</td>
                            <td>$ {{ $n->cost }}</td>
                            
                            <td>{{ $n->date_from }} @if($n->date_to != NULL) al <br>{{$n->date_to }} @endif</td>
                            <td>{{ $n->avaibleSpace()}}</td>
                        
                            <td>
                                
                                
                                <a href="{{ url('eventos', $n->id) }}" class="btn green">Ver</a>
                                

                                @if($n->avaibleC > 1)
                                    <a href="{{ url('app/receipts/create', $n->id) }}" class="btn purple">Generar Recibo</a>
                                @endif

                            

                                {{-- <a href="{{ url('app/events/tickets', $n->id) }}" class="btn black">Ver Boletos</a> --}}
                                <a href="{{ url('app/host/events/records', $n->id) }}" class="btn orange">Asistentes</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    </table>

                @endif
                <center>
                    {{ $events->links() }}
                </center>

            </div>

            

@endsection

@section('scripts')
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{url('js/aplication/eventList.js')}}"></script>
@endsection
