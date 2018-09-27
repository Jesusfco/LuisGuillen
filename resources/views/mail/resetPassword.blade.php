<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reseta tu contraseña Luis Guillen</title>
</head>
<body>
    <img src="{{ url('images/logo1.png') }}" width="50%">
    <p>Haz click en el siguiente enlace para restaurar tu contraseña 
        <a href="{{ url('resetPassword/'. $token)}}">RESTAURAR</a></p>
</body>
</html>