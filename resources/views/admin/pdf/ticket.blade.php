<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$receipt->event->name . ' #'. $receipt->id}} || Luis Guillen</title>
</head>
<body> 
    <img class="qr" src="{{ url('images/app/QR/tickets/'. $receipt->id . '.png') }}">
    <p class="passNumber">#{{ $receipt->id }}</p>
    <img class="background-img" src="{{ url('images/events/' . $receipt->id . '/' . $receipt->event->img) }}">
    <div class="data">
        <h1>{{ $receipt->event->name }}</h1><br>
        <p>Pase para: <br><span class="userName">{{ $receipt->user->name}}</span>
        <p>Fecha del evento: {{ $receipt->event->date_from}}</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae esse aliquam hic dolores aut, voluptatum nihil facilis consectetur! 
            Unde voluptatibus fugiat possimus assumenda dicta doloribus beatae architecto sit molestias voluptate!</p>
    </div>

    <style>
        *{margin:0; padding:0}
        .qr {
            position: absolute;
            top: 30px;
            right: 160px;
        }

        .userName {
            font-size: 25px;
        }

        .background-img {
            display: block;
            width: 100%;
        }
        .passNumber {
            position: absolute;
            top: 30px;
            left: 30px;
            background: black;            
            color: white;
            padding: 10px;
            width: 100px;
        }

        .data {
            padding: 20px;
            background: black;            
            color: white;
            text-align: center;
        }


    </style>

</body>
</html>