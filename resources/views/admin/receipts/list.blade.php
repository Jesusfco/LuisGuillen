@extends('structure.admin')
@section('styles')
    <link href="{{url('assets/sweet/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('content')            

            <div class="panel panel-default" id="principal">
                <div class="panel-heading">
                    <div class="row">
                    
                    <div class="col-xs-12 col-sm-6">
                    <h2>Recibos >> Lista</h2>
                    </div>

                    <a href="{{ url('app/receipts/create') }}"><button class="btn">Crear Recibo</button></a>
                    
                    
                    
                </div>
                
                
                    <table class="striped responsive-table">
                        <thead>
                            <th>ID</th>
                            <th>Evento</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Monto</th>
                            <th>Fecha/Hora</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($receipts as $receipt)
                        
                        <tr id="noticia{{$receipt->id}}">
                            <td>{{ $receipt->id }}</td>
                            <td>{{ $receipt->event->name }}</td>
                            <td>{{ $receipt->user->name }}</td>
                            <td>{{ $receipt->creator->name }}</td>
                            <td>{{ $receipt->amount }}</td>
                            <td>{{ $receipt->created_at }}</td>                           
                            <td>
                                
                                <a href="{{ url('app/users/update/'.$receipt->id.'') }}" class="btn yellow">Editar </a>
                                <a  onclick="eliminar({{ $receipt->id }}, '{{ $receipt->name }}')" class="btn red"> Eliminar</a>
                                <a href="{{ url('users', $receipt->id) }}" class="btn green">Ver</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    </table>
                
                <center>
                    {{ $receipts->links() }}
                </center>

            </div>

            

@endsection

@section('scripts')
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{url('js/aplication/usersList.js')}}"></script>
@endsection
