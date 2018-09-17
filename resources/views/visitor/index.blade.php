@extends('structure.visitor')

@section('title', 'Luis Guillen || Couch Mental || Inicio')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/index.css') }}">    
@endsection

@section('content')  

<div class="sliderContent">

    <div class="slide backgroundImg centerElements" style="background-image: url({{ url('images/index/slider1.jpg')}})">
        <div class="slide-text">
            <p>Reprograma tu mente, reprograma tu vida</p>
            <h1>Luis Guillén</h1>
            <h1><i class="fas fa-angle-down"></i></h1>
        </div>
    </div>

</div>

<section class="luisguillen">

    <div class="container flex">

        <div>

            <div class="line"></div>
            <h1>LUIS GUILLEN</h1>

            <br>

            <p>
                ¡Soy Coach Mental! <br><br>

                A través de diferentes técnicas como programación neurolingüística, hipnosis y neurociencia lograremos que tengas más enfoque en las situaciones que deseas cambiar de tu vida, de tu negocio, de tus relaciones interpersonales. <br><br>
                
                Te invito a replantear tu vida actual y dar el primer paso para lograr tus verdaderas metas
                <br><br>
            </p>

            <button class="button">Leer Más...</button>

        </div>

        <div>
            <img src="{{ url('images/index/luisguilenPersona.jpg')}}">
        </div>

    </div>
    
</section>

<section class="backgroundImg coachmental centerElements flex" style="background-image: url({{ url('images/index/background1.jpg') }})">

    {{-- <div class="absolute title">
            <div class="line"></div>
            <h1>COACH MENTAL</h1>
        </div> --}}

    <div class="container">
            
            <h1 class="centerText">COACH MENTAL</h1>
            
            <div class="services">
                <div>
                    <h2 class="centerText">Hipnosis</h2>
                    <h3 class="centerText"><i class="fa fa-line-chart"></i></h3>
                    <p>Es el trabajo con la mente subconsciente, quien es quien controla nuestros programas mentales</p>
                </div>

                <div>
                    <h2 class="centerText">PNL</h2>
                    <h3 class="centerText"><i class="fas fa-cubes"></i></h3>
                    <p>Es un método de comunicación, su premisa parte de las teorías constructivistas que afirman el ser humano no opera directamente sobre el mundo real</p>
                </div>

                <div>
                    <h2 class="centerText">Neurociencia</h2>
                    <h3 class="centerText"><i class="fa fa-pie-chart"></i></h3>
                    <p>Tenemos un cerebro y este es físico, PNL y la hipnosis mueven el software de la computadora humana (cerebro), con neurociencia tomamos en cuenta las condiciones físicas.</p>
                </div>
        
            </div>
    </div>
    
</section>

<section class="contactame">

    <div class="flex container">

        <div>

            <div class=" title">
                <div class="line"></div>
                <h1>CONTACTO</h1>
            </div>


            <p><br>
                Consultorio<br>
                Calle Newton 199 Int. 101<br>
                Polanco, Ciudad de México, CP 11560<br>
                Sesiones Individuales: (961) 1123427
            </p><br><br>

            <p>
                Conferencias, Talleres, Coaching<br>
                Correo: georgina@relancer.com.mx<br>
                Teléfono: (55) 22144116<br>
            </p>

        </div>

        <div>
            <form>
                <input type="text" required>
                <input type="email" required>
                <input type="text" required>
                <textarea required></textarea>
                <button class="button">Enviar Mensaje</button>
            </form>
        </div>

    </div>

</section>




@endsection