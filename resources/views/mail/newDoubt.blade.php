<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Pregunta || {{ $doubt->event->name }} || Luis Guillen || Evento</title>
</head>
<body>

    <h5>Nueva pregunta de evento || {{ $doubt->event->name }}</h5>    
    <p>Pregunta: <strong>{{ $doubt->question }}</strong> - Cliente: {{ $doubt->user->name }}</p>

    <img src="{{ url('images/events/' . $doubt->event->id . '/' . $doubt->event->img) }}" width="50%">
    <h2>{{ $doubt->event->name }}</h2>
    <p>{{ $doubt->event->resume }}</p>
</body>
</html>