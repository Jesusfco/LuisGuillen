@extends('structure.admin')
@section('styles')
    <link href="{{url('assets/sweet/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('content')            

            <div class="panel panel-default" id="principal">
                <div class="panel-heading">
                    <div class="row">
                    
                    <div class="col-xs-12 col-sm-6">
                    <h2>Usuarios >> Lista</h2>
                    </div>

                    <a href="{{ url('app/users/create') }}"><button class="btn">Crear Usuario</button></a>
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
                
                
                    <table class="striped responsive-table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($users as $n)
                        
                        <tr id="noticia{{$n->id}}">
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->name }}</td>
                            <td>{{ $n->email }}</td>
                            <td>{{ $n->phone }}</td>
                            <td>
                                @if($n->user_type == 1) Cliente 
                                @elseif($n->user_type == 2) Vendedor
                                @elseif($n->user_type == 3) Host
                                @elseif($n->user_type == 4) Editor
                                @elseif($n->user_type == 5) Manager
                                @elseif($n->user_type == 10) Administrador
                                @endif
                            </td>

                            <td>
                                @if($n->status == 1) Activo
                                @elseif($n->status == 2) Inactivo
                                @endif
                            </td>
                            <td>
                                
                                <a href="{{ url('app/users/update/'.$n->id.'') }}" class="btn yellow">Editar </a>
                                <a  onclick="eliminar({{ $n->id }}, '{{ $n->name }}')" class="btn red"> Eliminar</a>
                                <a href="{{ url('users', $n->id) }}" class="btn green">Ver</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    </table>
                
                <center>
                    {{ $users->links() }}
                </center>

            </div>

            

@endsection

@section('scripts')
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{url('js/aplication/usersList.js')}}"></script>
@endsection
