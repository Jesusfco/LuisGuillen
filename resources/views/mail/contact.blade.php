<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Luis Guillen NUEVO CONTACTO</title>
</head>
<body>

    <h1>Nuevo Contacto || {{ $client }}</h1>    
    <img src="{{ url('images/logo1.png') }}" width="50%">
    <p>CORREO: {{ $mail }}</p>
    <p>MENSAJE:<br> <br> {{ $text }}</p>
</body>
</html>