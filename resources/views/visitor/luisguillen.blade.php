@extends('structure.visitor')

@section('title', 'Luis Guillen || Couch Mental')
@section('activeLink', 'luis')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/luis.css') }}">    
@endsection

@section('content')  

<div class="navPadding topDiv">
    <div class="slider-container">
        <div class="slide" style="background-image: url({{ url('images/luis/1.jpg') }})"></div>
        <div class="slide" style="background-image: url({{ url('images/luis/2.jpg') }})"></div>
        <div class="slide" style="background-image: url({{ url('images/luis/3.jpg') }})"></div>
        <div class="slide" style="background-image: url({{ url('images/luis/4.jpg') }})"></div>
    </div>
    <div class="howIM">
        <div>
        <h2>¿Quien Soy?</h2>
        <p>Hola soy Luis Guillen, soy el creador de esta técnica que 
            llamo coaching mental, soy un apasionado de la conducta humana, 
            eh pasado mi vida investigando en torna a la pregunta, ¿Qué nos 
            hace comportarnos como nos comportamos? ¿Por qué hacemos lo que hacemos? 
            Y en esa búsqueda eh estudiado numerosas técnicas entre ellas PNL (programación Neurolingüística) 
            así como diferentes estrategias psicológicas, neurociencia e hipnosis, ahora aplico esos conocimientos 
            para crear sanación mental y emocional, creando entrenamientos mentales que han cambiado mi vida y de un gran número de atletas, empresarios, trabajadores amas de casa, niños adolecentes, y personas de toda edad y género, 
            transformando su vida, creando sanidad, libertad mental y éxito en sus carreras y vidas.</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ url('js/visitor/quienSlider.js')}}"></script>
@endsection