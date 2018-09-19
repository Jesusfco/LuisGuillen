@extends('structure.admin')
@section('styles')
    <link href="{{url('assets/sweet/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('content')            

            <div class="panel panel-default" id="principal">
                <div class="panel-heading">
                    <div class="row">
                    
                    <div class="col-xs-12 col-sm-6">
                    <h2>Noticias >> Lista</h2>
                    </div>

                    <a href="{{ url('app/blog/create') }}"><button class="btn">Crear Noticia</button></a>
                    <div class="col-xs-12 col-sm-6">
                        
                    <form method="GET" class="navbar-form">
                         <div class="input-group">
                            <input name="name" class="form-control" placeholder="Buscar Noticia" autofocus>
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
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($noticias as $n)
                        
                        <tr id="noticia{{$n->id}}">
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->title }}</td>
                            <td>{{ $n->date }}</td>
                            <td>
                                <a href="{{ url('app/blog/update/'.$n->id.'/uploadPhotos') }}" class="btn purple">Administrar Fotos </a>                                
                                <a href="{{ url('app/blog/update/'.$n->id.'') }}" class="btn yellow">Editar </a>
                                <a  onclick="eliminar({{ $n->id }}, '{{ $n->title }}')" class="btn red"> Eliminar</a>
                                <a href="{{ url('noticias', $n->id) }}" class="btn green">Ver</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    </table>
                
                <center>
                    {{ $noticias->links() }}
                </center>

            </div>

            

@endsection

@section('scripts')
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{url('js/aplication/noticiasList.js')}}"></script>
@endsection
