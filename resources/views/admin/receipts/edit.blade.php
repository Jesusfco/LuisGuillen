@extends('structure.admin')
@section('title', 'Editar Recibo')
@section('styles')
    <style>
    
        .profileImg img {
            width: 150px;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
        }
    </style>
@endsection

@section('content')            

<h1>Editar Recibo</h1>


@if (session()->has('msj'))
<div class="row">
    <div class="col s12 m5">
        <div class="card-panel blue">
        <span class="white-text"> El Usuario ha sido actualizado.
        </span>
        </div>
    </div>
    </div>
@endif

<form class="row" role="form" method="POST">
    {{ csrf_field() }}

    <div class="form-group col l6 s12">
      <label>Evento</label>
      <input type="text" value="{{ $receipt->event->name}}" disabled>      
    </div>

    <div class="form-group col l6 s12">
        <label>Cliente</label>
    <input type="text" value="{{ $receipt->user->name}}" disabled>
        
      </div>

    <div class="input-field col l6 s12">
      <input type="number" name="amount" id="amount"  value="{{ $receipt->amount}}">
      <label>Monto</label>
    </div>
    
    <div class="col s12">
      <button type="submit" class="btn blue col s12">Editar Recibo</button>
    </div>
    
  </form>

@endsection

