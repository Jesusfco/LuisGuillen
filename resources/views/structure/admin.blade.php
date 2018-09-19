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
    <link rel="stylesheet" href="{{ url('css/admin/navegationAdmin.css') }}">
    @yield('styles')
</head>
<body>

    <div class="navegation">
        <br><br>
            <img id="logo" src="{{url('images/logo2.png')}}">
            
            <div class="links">
                <a href="{{ url('app/blog')}}"><p>Noticias</p></a>
                <a href="{{ url('app/events')}}"><p>Eventos</p></a>
                <a href="{{ url('app/resetPassword')}}"><p>Cambiar contraseña</p></a>
                <a href="{{ url('app/closeSession')}}"><p>Cerrar Sesión<p></a>
            </div>

    </div>

    <div class="content">
        <div class="margener">

        @yield('content')
        </div>
</div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    @yield('scripts')
    
</body>
</html>