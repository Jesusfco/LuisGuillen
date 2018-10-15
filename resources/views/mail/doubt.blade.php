<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $doubt->event->name }} || Pregunta || Luis Guillen || Evento</title>
</head>
<body>

    <h5>Usted Realizo una pregunta del evento {{ $doubt->event->name }}</h5>    
    <p>Pregunta: <strong>{{ $doubt->question }}</strong><br> En breve le contestaremos su pregunta</p>

    <img src="{{ url('images/events/' . $doubt->event->id . '/' . $doubt->event->img) }}" width="50%">
    <h2>{{ $doubt->event->name }}</h2>
    <p>{{ $doubt->event->resume }}</p>
</body>
</html>