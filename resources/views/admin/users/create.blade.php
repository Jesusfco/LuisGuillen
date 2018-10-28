@extends('structure.admin')

@section('content')            

<h1>Crear Usuario</h1>
  <form class="row" role="form" method="POST" enctype="multipart/form-data"  autocomplete="off">
    {{ csrf_field() }}

    <div class="form-group col l12 s12">
      <label for="exampleInputEmail1">Nombre completo</label>
      <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="PEPE DE ALBA DEL CARMEN" required>
    </div>

    <div class="form-group col l6 s12">
      <label for="exampleInputPassword1">Correo</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}"  placeholder="ejemplo@gmail.com" required>
      @if ($errors->has('email'))
          <span class="helper-text">
              <strong class="red-text">{{ $errors->first('email') }}</strong>
          </span>
      @endif

    </div>

    <div class="input-field col l6 s12">
      <input type="password" name="password" >
      <label>Contraseña</label>
    </div>

    <div class="form-group col l6 s12">
      <label for="exampleInputPassword1">Teléfono</label>
      <input type="tel" value="{{ old('phone') }}" name="phone" class="form-control"  placeholder="000-000-0000" >
    </div>
    <br>

    <div class="input-field col l6 s12">
      <select name="user_type">            
        <option value="1" selected>Cliente</option>
        <option value="2">Vendedor</option>
        <option value="3">Host</option>
        <option value="4">Editor</option>
        <option value="5">Manager</option>
        <option value="10">Administrador</option>
      </select>
      <label>Tipo de Usuario</label>
    </div>

    <div class="input-field col l6 s12">
        <select name="gender">            
          <option value="1" selected>Masculino</option>
          <option value="2">Femenino</option>          
        </select>
        <label>Sexo</label>
      </div>

    <div class="input-field col l6 s12">
      <select disabled>            
        <option value="1" selected>Activo</option>        
      </select>
      <label>Status</label>
    </div>

    <div class="input-field col l6 s12">
      <input type="date" name="birthday" value="{{ old('birthday') }}">
      <label>Fecha de Nacimiento</label>
    </div>

    <div class="input-field col l6 s12">
      <input type="text" name="state" value="{{ old('state') }}">
      <label>Estado</label>
    </div>

    <div class="input-field col l6 s12">
      <input type="text" name="city" value="{{ old('city') }}">
      <label>Ciudad</label>
    </div>

    <div class="input-field col l6 s12">
      <input type="text" name="country" value="{{ old('country') }}">
      <label>País</label>
    </div>

    <div class="input-field col l6 s12">
      <input type="text" name="ocupation" value="{{ old('ocupation') }}">
      <label>Ocupación</label>
    </div>

    <div class="file-field input-field col l6 s12">
        <div class="btn">
          <span>Imagen</span>
          <input type="file" name="img" accept="image/x-png,image/gif,image/jpeg">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>
    
        
  
    
    <div class="col s12">
      <button type="submit" class="btn blue col s12">Crear Nuevo Usuario</button>
    </div>
    
  </form>

@endsection

@section('scripts')
    {{-- <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script> --}}
    <script>
      
      $(document).ready(function(){
        $('select').formSelect();
      });
       
    </script>
@endsection