@extends('structure.admin')
@section('styles')
    <link href="{{url('assets/sweet/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('content')            

            <div class="panel panel-default" id="principal">
                
                <div class="panel-heading">
                    
                    <div class="row">
                    
                        <div class="col-xs-12 col-sm-6">

                            <h2>Sesión Iniciada</h2>
                            <h5>Bienvenido - {{Auth::user()->name }}</h5>
                            
                        </div>

                    </div>

                </div>

            </div>

            

@endsection

@section('scripts')
    <script src="{{url('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{url('js/aplication/noticiasList.js')}}"></script>
@endsection
