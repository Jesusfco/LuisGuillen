@extends('structure.admin')
@section('title', 'Crear Recibo')
@section('styles')
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')            

<h1>Crear Recibo</h1>
  <form class="row" role="form" method="POST" enctype="multipart/form-data"  autocomplete="off">
    {{ csrf_field() }}

    <div class="form-group col l6 s12">
      <label>Evento</label>
      <input type="email" id="event" class="form-control" placeholder="Nombre del Evento" required>
      <input type="hidden" name="event_id" id="event_id">      
    </div>

    <div class="form-group col l6 s12">
        <label>Cliente</label>
        <input type="email" id="client" class="form-control" placeholder="Nombre del Cliente" required>
        <input type="hidden" name="client_id" id="client_id">      
      </div>

    <div class="input-field col l6 s12">
      <input type="number" name="amount" id="amount">
      <label>Monto</label>
    </div>
    
    <div class="col s12">
      <button type="submit" class="btn blue col s12">Crear Nuevo Usuario</button>
    </div>
    
  </form>

@endsection

@section('scripts')

  <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js" integrity="sha256-UezNdLBLZaG/YoRcr48I68gr8pb5gyTBM+di5P8p6t8=" crossorigin="anonymous"></script>      
  <script>
    
    $(document).ready(function(){
      
      let link1 = "{{ url('app/util/eventSugest')}}";	
      let link2 = "{{ url('app/util/clientSugest')}}";	
      
      $('#event').autocomplete({

        source: function(request, response) {

          $.ajax({
            method: 'GET',
            url: link1,
            dataType: "json",
            data: {term: request.term },

            success: function(data) {
              console.log(data);
              

              let events = [];
              for(let d of data) {
                events.push({value: d.name, data: d.id});
              }
              

              response(events);
            }

          });

        }, // another stuff

        minLength: 3,
        select: function(event, ui) {
          
          $('#event_id').val(ui.item.data);
          
        }

        });

    });
      
  </script>
@endsection