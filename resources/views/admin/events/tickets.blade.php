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
                            <h5>Evento >> {{ $event->name }} >> Tickets </h5>
                        </div>                                        
                    
                    </div>
                                
                    <table class="striped responsive-table">
                        <thead>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Monto</th>
                            <th>Fecha de compra</th>                            
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($event->receipts as $n)                        
                        <tr id="noticia{{$n->id}}">
                        
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->user->name }}</td>
                            <td>${{ $n->amount }}</td>
                            <td>{{ $n->created_at }}</td>
                            <td>                                
                                {{-- <a href="{{ url('app/events/update/'.$n->id.'') }}" class="btn yellow">Ver </a> --}}
                                {{-- <a  onclick="eliminar({{ $n->id }}, '{{ $n->title }}')" class="btn red"> Eliminar</a> --}}
                            <a target="_blank" href="{{ url()->current() }}/{{ $n->id}}" class="btn green">Imprimir Ticket</a>                                
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    </table>                                

            </div>

            

@endsection

@section('scripts')
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{url('js/aplication/eventList.js')}}"></script>
@endsection
