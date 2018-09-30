@extends('structure.admin')

@section('content')            

<h1>Crear Usuario</h1>
  <form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return crearNoticia()">
    {{ csrf_field() }}

    <div class="form-group col l12">
      <label for="exampleInputEmail1">Nombre completo</label>
      <input type="text" name="name" class="form-control"  placeholder="Titulo de la noticia" required>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputPassword1">Correo</label>
      <input type="email" name="resume" class="form-control"  placeholder="ejemplo@gmail.com" required>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputPassword1">Teléfono</label>
      <input type="phone" name="resume" class="form-control"  placeholder="000-000-0000" required>
    </div>
    <br>

    <div class="input-field col l12">
      <select>            
        <option value="1" selected>Cliente</option>
        <option value="2">Vendedor</option>
        <option value="3">Host</option>
        <option value="4">Editor</option>
        <option value="5">Manager</option>
        <option value="10">Administrador</option>
      </select>
      <label>Tipo de Usuario</label>
      </div>

    {{-- <div class="form-group col l6">
      <label>Imagen</label><br>
      <input type="file" name="img" id="imagen" accept="image/x-png,image/gif,image/jpeg" required>

      <p class="help-block">Cargue una fotografía del Usuario</p>
    </div> --}}
        
        
    <div class="form-group">
      <label>Fecha Inicio</label>
      <input type="date" name="date_from" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Fecha Final - Opcional</label>
        <input type="date" name="date_to" class="form-control" >
      </div>
    
    
            
    <label>Da una descripcion completa de tu evento</label>
    <textarea name="editor1" id="editor1" rows="10" cols="80">

    </textarea>

    <input type="hidden" class="contenidoNota" name="description" required>
    
    {{-- <div class="form-group">
      <label>Iframe de Youtube</label>
      <input type="text" name="youtube" class="form-control" name="youtube">
    </div> --}}
    
    
    <button type="submit" class="btn btn-default">Crear Nuevo Evento</button>
  </form>

@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>

      
      $(document).ready(function(){
        $('select').formSelect();
      });
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