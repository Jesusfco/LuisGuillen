@extends('structure.admin')
@section('title', 'Crear Recibo')

@section('styles')
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')            

<h1>Crear Recibo</h1>
<form class="row" role="form" action="{{ url('app/receipts/create') }}" method="POST" onsubmit="return validateForm()">
    {{ csrf_field() }}

    
    <div class="form-group col l6 s12">
      <label>Evento</label>
      @if(isset($event))
      <input type="text" value="{{ $event->name }}" disabled>
      <input type="hidden" name="event_id" id="event_id" value="{{ $event->id }}">      
      @else
      <input type="text" id="event" class="form-control" placeholder="Nombre del Evento" required>
      <input type="hidden" name="event_id" id="event_id">      
      @endif
    </div>

    <div class="form-group col l6 s12">
        <label>Cliente</label>
        <input type="text" id="client" class="form-control" placeholder="Nombre del Cliente" required>
        <input type="hidden" name="client_id" id="client_id">      
      </div>

    <div class="input-field col l6 s12">
      @if(isset($event))

      <input type="number" name="amount" value="{{ $event->cost }}">        

      @else

      <input type="number" name="amount" id="amount">

      @endif
      <label>Monto</label>
    </div>
    
    <div class="col s12">
      <button type="submit" class="btn blue col s12">Crear Recibo</button>
    </div>
    
  </form>

@endsection

@section('scripts')

  <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js" integrity="sha256-UezNdLBLZaG/YoRcr48I68gr8pb5gyTBM+di5P8p6t8=" crossorigin="anonymous"></script>      
  <script>
    
    $(document).ready(function(){
      let token = $("input[name=_token]").val();
      let link1 = "{{ url('app/util/eventSugest')}}";	
      let link2 = "{{ url('app/util/clientSugest')}}";	
      
      $('#event').autocomplete({
        source: function(request, response) {

          $.ajax({
            method: 'POST',
            url: link1,
            dataType: "json",
            data: {term: request.term, _token: token },

            success: function(data) {
              console.log(data);
              

              let events = [];
              for(let d of data) {
                events.push({value: d.name, data: d.id, cost: d.cost});
              }
              

              response(events);
            }

          });

        }, // another stuff

        minLength: 3,
        select: function(event, ui) {
          
          $('#event_id').val(ui.item.data);
          $('#amount').val(ui.item.cost);
          
        }

        });

        $('#client').autocomplete({

          source: function(request, response) {

            $.ajax({
              method: 'POST',
              url: link2,
              dataType: "json",
              data: {term: request.term, _token: token },

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
            
            $('#client_id').val(ui.item.data);
            
            
          }

          });
          
    }); 

    function validateForm() {

      let id1 = $('#event_id').val();
      let id2 = $('#client_id').val();

      if(id2 == null) {

        alert('Seleccione a un Cliente de las sugerencias');
        return false;

      } else if(id2 == null){ 
        alert('Seleccione a un Evento de las sugerencias');
        return false;
      }

        return true;

      

      }
      
  </script>
@endsection