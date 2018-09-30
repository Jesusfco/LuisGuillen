@extends('structure.admin')

@section('content')            

    <h1>Editar Evento</h1>

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

    <form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return crearNoticia()">
        {{ csrf_field() }}

        <div class="form-group col l12">
            <label for="exampleInputEmail1">Nombre del Evento</label>
            <input type="text" name="name"  value="{{ $event->name }}" class="form-control"  placeholder="Titulo de la noticia" required>
        </div>

        <div class="form-group col l12">
            <label for="exampleInputPassword1">Resumen</label>
            <input type="text" name="resume"  value="{{ $event->resume }}" class="form-control"  placeholder="Escribe brevemente de que se trara la noticia" required>
        </div>

        <div class="form-group col l6">
            <label for="exampleInputPassword1">Costo</label>
            <input type="number" name="cost"  value="{{ $event->cost }}" class="form-control"  placeholder="$$$$$" required>
        </div>

        <div class="form-group col l6">
            <label>Actualizar Imagen</label><br>
            <input type="file" name="img" id="imagen" accept="image/x-png,image/gif,image/jpeg" >

            <p class="help-block">Cargue una fotografía de la noticia</p>
        </div>                        
            
        <div class="form-group col l6">
            <label>Fecha Inicio</label>
            <input type="date" name="date_from"  value="{{ $event->date_from }}" class="form-control" required>
        </div>

        <div class="form-group col l6">
            <label>Fecha Final - Opcional</label>
            <input type="date" name="date_to" value="{{ $event->date_to }}" class="form-control" >
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
        
        
        <button type="submit" class="btn btn-default">Crear Nuevo Evento</button>
    </form>

    <br><br>
    <br><br>

@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );

        function crearNoticia(){
            var data = CKEDITOR.instances.editor1.getData();
            $('.contenidoNota').val(data);

            if(data.length == 0) return false;

//            return false;
        }
    </script>
@endsection