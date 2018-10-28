@extends('structure.visitor')

@section('title', 'Login || Luis Guillen || Couch Mental')
@section('activeLink', 'login')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/login.css') }}">    
@endsection

@section('content')  <!DOCTYPE html>

<div class="cardSpace" style="background-image: url({{ url('images/login.JPG') }})">



        <div class="loginCardModule">
            <h2 id="bienvenida">INICIA SESIÓN</h2>
    
            <img id="logo" src="{{url('images/logo1.png')}}">
    
            <br>
    
    
    
            <div id="formSpace">
    
                <form (submit)="accesar()" method="POST" action="">
                    
                    {{ csrf_field() }}
    
                    <input name="email" type="email" placeholder="Correo" #focus><br>
    
                    <input  name="password" type="password" placeholder="Contraseña"><br>
    
    
    
                    <button type="submit" class="btn black">Iniciar sesión</button>
                    
    
                </form>
    
                <p>¿Olvidaste tu Contraseña?</p>
    
                <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
            </div>
    
    
        </div>
    </div>    
    
