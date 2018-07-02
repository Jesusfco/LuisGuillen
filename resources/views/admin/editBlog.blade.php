@extends('structure.admin')

@section('content')            
            <form role="form" method="POST" enctype="multipart/form-data" onsubmit="return crearNoticia()">
                        {{ csrf_field() }}

                        <div class="form-group">
                          <label for="exampleInputEmail1">Titulo</label>
                          <input type="text" name="title" class="form-control" value="{{ $blog->title }}"  placeholder="Titulo de la noticia" required>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Resumen</label>
                          <input type="text" name="resume" value="{{ $blog->resume }}" class="form-control"  placeholder="Escribe brevemente de que se trara la noticia" required>
                        </div>

                        <div class="form-group">
                          <label>Imagen</label>
                          <input type="file" name="img" id="imagen" accept="image/x-png,image/gif,image/jpeg">

                          <p class="help-block">Cargue una fotografía de la noticia</p>
                        </div>
                        
                        <div class="row"><div class="col-sm-12 col-lg-3">
                            
                         <div class="form-group">
                          <label>Fecha</label>
                          <input type="date" value="{{ $blog->date }}" name="date" class="form-control" required>
                        </div>
                        
                        </div></div>
                                
                        <label>Redacta tu noticia</label>
                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                        {{ $blog->text }}
                        </textarea>
                        <input type="hidden" class="contenidoNota" name="text" required>
                        
                        <div class="form-group">
                          <label>Iframe de Youtube</label>
                          <input type="text" value="{{ $blog->youtube }}" name="youtube" class="form-control" name="youtube">
                        </div>
                        
                        
                        <button type="submit" class="btn btn-default">Editar Blog</button>
                      </form>

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