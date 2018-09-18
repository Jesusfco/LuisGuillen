<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Roboto:100,300,400,500,900" rel="stylesheet">
    
    <link href="http://amerigas.mx/sweet/sweetalert.css" type="text/css" rel="stylesheet" >

    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/template.css') }}">
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('css')

    
</head>
<body>

    <header>

        <div class="container">

            <div>
                <img src="{{ url('images/logo1.png') }}" alt="">
            </div>

            <div class="links">
                
                <a href="{{ url('/')}}" id="homeWWW">Inicio</a>
                <a href="" id="luisWWW">Luis Guillén</a>
                <a href="" id="coachWWW">Coach Mental</a>
                <a href="" id="servicesWWW">Servicios</a>
                <a href="{{ url('eventos')}}" id="eventWWW">Eventos</a>
                <a href="{{ url('blog')}}" id="blogWWW">Blog</a>
                <a href="">Contáctame</a>
            </div>

        </div>

    </header>
    
    @yield('content')

    <footer class="">

        <div class="container flex">
            <div>
                <p>© 2018 Francisco Rodríguez. Desarrollado por <a href="http://roguezservices.com/" target="_blank" rel="noopener noreferrer">
                    <img src="http://roguezservices.com/img/logoNav.png"></a>
                </p>
            </div>
        
            <div class="social-icons">
                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/luisguillenoficial/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/luiseguillen?lang=es"><i class="fa fa-twitter"></i></a></li>
                    <!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>-->
                    <li><a href="https://www.youtube.com/user/REMA77"><i class="fa fa-youtube"></i></a></li>
                    <!--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>-->
                </ul>
            </div>
        </div>

        
    </footer>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://amerigas.mx/sweet/sweetalert.min.js"></script>
    <script src="{{ url('js/visitor/email.js') }}"></script>
    <script>
        var linkToActivated = "#@yield('activeLink')WWW"
    </script>
    <script src="{{ url('js/visitor/activeLink.js') }}"></script>
    @yield('scripts')

</body>
</html>