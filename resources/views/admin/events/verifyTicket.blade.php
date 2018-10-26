@extends('structure.admin')
@section('title', 'Eventos')
@section('styles')
    <link href="{{url('assets/sweet/sweetalert.css')}}" rel="stylesheet">
    <style>
        .background-img {
             width: 300px;
        }
    </style>
@endsection
@section('content') 
<h5>Boleto para evento {{ $receipt->event->name }}</h5>
<img class="background-img" src="{{ url('images/events/' . $receipt->id . '/' . $receipt->event->img) }}">
<p>#{{ $receipt->id }}</p>
<p>Cliente: {{ $receipt->user->name }}</p>
<form method="POST" action=" {{ url('boleto', $receipt->id)}}/confirm">
    <h4>¿Confirmar asistencia de {{ $receipt->user->name }}?</h4>
    {{ csrf_field() }}
    <button class="btn blue" type="submit">Confirmar</button>
</form>
@endsection

@section('scripts')
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{url('js/aplication/eventList.js')}}"></script>
@endsection
