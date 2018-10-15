<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $doubt->event->name }} || Pregunta || Luis Guillen || Evento</title>
</head>
<body>

    <h5>Respuesta || {{ $doubt->event->name }}</h5>    
    <p>Usted Preguntó: <strong>{{ $doubt->question }}</strong><br> 
    Respuesta: {{ $doubt->answer }}</p>

    <p><a href="{{ url('eventos/'. $doubt->id)}}">Ver Evento & Mis preguntas</a></p></p>
    
</body>
</html>