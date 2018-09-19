<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LuisGuillen Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{ url('css/admin/login.css')}}">
    
    
</head>
<body>

   

    <div class="cardSpace">



        <div class="loginCardModule">
            <h2 id="bienvenida">INICIA SESIÓN</h2>
    
            <img id="logo" src="{{url('images/logo1.png')}}">
    
            <br>
    
    
    
            <div id="formSpace">
    
                <form (submit)="accesar()" method="POST" action="" autocomplete="off">
                    
                    {{ csrf_field() }}
    
                    <input name="email" type="email" placeholder="Correo" #focus><br>
    
                    <input  name="password" type="password" placeholder="Contraseña"><br>
    
    
    
                    <button type="submit" class="btn black">Iniciar sesión</button>
                    
    
                </form>
    
                <p>¿Olvidaste tu Contraseña?</p>
    
    
            </div>
    
    
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    
    
</body>
</html>