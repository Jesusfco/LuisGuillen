@extends('structure.visitor')

@section('title', 'Luis Guillen || Couch Mental || Inicio')
@section('activeLink', 'home')

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
            <img src="{{ url('images/index/luisguilenPersona.jpg')}}" class="movil">

            <p>
                ¡Soy Coach Mental! <br><br>

                A través de diferentes técnicas como programación neurolingüística, hipnosis y neurociencia lograremos que tengas más enfoque en las situaciones que deseas cambiar de tu vida, de tu negocio, de tus relaciones interpersonales. <br><br>
                
                Te invito a replantear tu vida actual y dar el primer paso para lograr tus verdaderas metas
                <br><br>
            </p>

            <button class="button">Leer Más...</button>

        </div>

        <div class="pc">
            <img src="{{ url('images/index/luisguilenPersona.jpg')}}" >
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
                    <h3 class="centerText blueFont"><i class="fa fa-line-chart"></i></h3>
                    <p class="centerText">Es el trabajo con la mente subconsciente, quien es quien controla nuestros programas mentales</p>
                </div>

                <div>
                    <h2 class="centerText">PNL</h2>
                    <h3 class="centerText blueFont"><i class="fas fa-cubes"></i></h3>
                    <p class="centerText">Es un método de comunicación, su premisa parte de las teorías constructivistas que afirman el ser humano no opera directamente sobre el mundo real</p>
                </div>

                <div>
                    <h2 class="centerText">Neurociencia</h2>
                    <h3 class="centerText blueFont"><i class="fas fa-brain"></i></h3>
                    <p class="centerText">Tenemos un cerebro y este es físico, PNL y la hipnosis mueven el software de la computadora humana (cerebro), con neurociencia tomamos en cuenta las condiciones físicas.</p>
                </div>
        
            </div>
    </div>
    
</section>

<section class="blog">

        <div class="container">
                
        
                <div class="line"></div>
                <h1>BLOG</h1>

                <br><br>

                <div class="blogContainer flex">

                    @foreach($blogs as $blog)
                    <div class="blog-piece">
                    <img src="{{ url('images/blog/' . $blog->id . '/' . $blog->img) }}">
                        <div>
                            <h3> {{ $blog->title}}</h3><br>
                            <p>{{ $blog->resume }}</p>
                            <br>
                            <hr>
                        <a href="{{ url('blog', $blog->id ) }}"><button class="button">Leer más...</button></a>
                        </div> 
                    </div>

                    @endforeach
                </div>
                  


</section>

<section class="backgroundImg eventoProximo centerElements flex" style="background-image: url({{ url('images/index/background2.jpg') }})">

    <div class=" container">
        <div class="line"></div>
        <h1>PROXIMO EVENTO</h1>
        <br><br>

        <div class="cardBackground">
            <h3 class="centerText">{{ $event->name }}</h3>
            <div class="flex">

                <div class="textEvent">
                    <p>{{ $event->resume }}</p>
                    <p>Lugar: {{ $event->place}}</p>
                    <p>Fecha: {{ $event->date_from}}
                    
                </div>
                <div class="eventDivImg">
                <img src="{{ url('images/events/' . $event->id . '/' . $event->img ) }}">
                </div>

            </div>
            <br>
            <div class="flex centerElements">
                <button class="button">Aparta tu lugar</button>
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
                <strong>Consultorio</strong><br>
                Calle Newton 199 Int. 101<br>
                Polanco, Ciudad de México, CP 11560<br>
                Sesiones Individuales: (961) 1123427
            </p>

            <p>
                Conferencias, Talleres, Coaching<br>
                Correo: georgina@relancer.com.mx<br>
                Teléfono: (55) 22144116<br>
            </p>

        </div>

        <div>
            <form method="POST" onsubmit="return sendEmail()">

                {{ csrf_field() }}
                <input value="{{ url('/')}}" id="url" type="hidden" required>

                <input type="text" placeholder="Nombre" id="name" required>
                <input type="email" placeholder="Correo" id="email" required>
                <input type="text" placeholder="Asunto" id="subject" required>
                <textarea placeholder="Mensaje" id="message" required></textarea>
                <button class="button">Enviar Mensaje</button>
            </form>
        </div>

    </div>

</section>




@endsection