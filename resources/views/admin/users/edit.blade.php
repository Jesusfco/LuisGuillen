@extends('structure.admin')

@section('styles')
    <style>
    
        .profileImg img {
            width: 150px;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
        }
    </style>
@endsection

@section('content')            

<h1>Editar Usuario</h1>


@if (session()->has('msj'))
<div class="row">
    <div class="col s12 m5">
        <div class="card-panel blue">
        <span class="white-text"> El Usuario ha sido actualizado.
        </span>
        </div>
    </div>
    </div>
@endif

<form class="row" role="form" method="POST" enctype="multipart/form-data"  autocomplete="off">
  {{ csrf_field() }}

  <div class="col s12 profileImg">

        @if($user->img != NUll)
            <img src="{{ url('images/users', $user->img) }}">
        @else
            <img src="{{ url('images/app/user.png') }}">
        @endif
  </div>

  <div class="form-group col l12 s12">
    <label for="exampleInputEmail1">Nombre completo</label>
    <input type="text" name="name" value="{{ $user->name }}" class="form-control"  placeholder="PEPE DE ALBA DEL CARMEN" required>
  </div>

  <div class="form-group col l6 s12">
    <label for="exampleInputPassword1">Correo</label>
  <input type="email" name="email" class="form-control" value="{{$user->email }}"  placeholder="ejemplo@gmail.com" required>
  @if (session()->has('dup'))
    <span class="helper-text">
        <strong>El correo {{ session()->get('dup') }} ya fue asignado a otro usuario.</strong>
    </span>
    @endif

  </div>

  <div class="input-field col l6 s12">
    <input type="password" name="password" >
    <label>Contraseña</label>
  </div>

  <div class="form-group col l6 s12">
    <label for="exampleInputPassword1">Teléfono</label>
    <input type="tel" value="{{ $user->phone }}" name="phone" class="form-control"  placeholder="000-000-0000" >
  </div>
  <br>

  <div class="input-field col l6 s12">
    <select name="user_type" v-model="user_type">            
      <option value="1">Cliente</option>
      <option value="2">Vendedor</option>
      <option value="3">Host</option>
      <option value="4">Editor</option>
      <option value="5">Manager</option>
      <option value="10">Administrador</option>
    </select>
    <label>Tipo de Usuario</label>
  </div>

  <div class="input-field col l6 s12">
      <select name="gender" v-model="gender">            
        <option value="1">Masculino</option>
        <option value="2">Femenino</option>          
      </select>
      <label>Sexo</label>
    </div>

  <div class="input-field col l6 s12">
    <select name="status" v-model="status">            
      <option value="1">Activo</option>        
      <option value="2">Inactivo</option>        
    </select>
    <label>Status</label>
  </div>

  <div class="input-field col l6 s12">
    <input type="date" name="birthday" value="{{ $user->birthday }}">
    <label>Fecha de Nacimiento</label>
  </div>

  <div class="input-field col l6 s12">
    <input type="text" name="state" value="{{ $user->state }}">
    <label>Estado</label>
  </div>

  <div class="input-field col l6 s12">
    <input type="text" name="city" value="{{ $user->city }}">
    <label>Ciudad</label>
  </div>

  <div class="input-field col l6 s12">
    <input type="text" name="country" value="{{ $user->country }}">
    <label>País</label>
  </div>

  <div class="input-field col l6 s12">
    <input type="text" name="ocupation" value="{{ $user->ocupation }}">
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
    <button type="submit" class="btn blue col s12">Actualizar Usuario</button>
  </div>
  
</form>

@endsection

@section('scripts')
  
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>    
    <script>
        
        $(document).ready(function(){
        $('select').formSelect();
        });
        

        var app = new Vue({
        el: '#app',
        

        data: {
            
            user_type: {{ $user->user_type }},
            gender: {{ $user->gender }},
            status: {{ $user->status }},
            
            },

            created: function () {                
    
            }
        });

    </script>
@endsection