<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('favicon1.ico') }}">

    <title>@yield('title')</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126665403-1"></script>
    <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-126665403-1');</script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Roboto:100,300,400,500,900" rel="stylesheet">
    
    <link href="{{ url('assets/sweet/sweetalert.css') }}" type="text/css" rel="stylesheet" >

    <link rel="stylesheet" type="text/css" href="{{ url('styles/visitor/template.css') }}">
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('css')

    
</head>
<body>

    <header>

        <div class="container">

            <div>
                <img src="{{ url('images/logo2.png') }}" alt="">
            </div>

            <div class="links pc">
                
                <a href="{{ url('/')}}" id="homeWWW">Inicio</a>
                <a href="" id="luisWWW">Luis Guillén</a>
                <a href="" id="coachWWW">Coach Mental</a>
                <a href="" id="servicesWWW">Servicios</a>
                <a href="{{ url('eventos')}}" id="eventWWW">Eventos</a>
                <a href="{{ url('blog')}}" id="blogWWW">Blog</a>
                <a href="">Contáctame</a>
                <a href="{{ url('login')}}" id="blogWWW">Login</a>
            </div>

            <div class="iconMenuContainer movil" id="activeMovMenu">
                
                <i class="fas fa-bars"></i>
                
            </div>

        </div>

    </header>

    <div id="movMenu" class="centerElements inactive opacity">
        <div class="background" id="movMenuBackground">

        </div>

        <div class="movMenuContainer">
                                
            <a href="{{ url('/')}}" id="homeWWW">Inicio</a>
            <a href="" id="luisWWW">Luis Guillén</a>
            <a href="" id="coachWWW">Coach Mental</a>
            <a href="" id="servicesWWW">Servicios</a>
            <a href="{{ url('eventos')}}" id="eventWWW">Eventos</a>
            <a href="{{ url('blog')}}" id="blogWWW">Blog</a>
            <a href="">Contáctame</a>                

        </div>
    </div>
    
    
    @yield('content')

    <footer>

        <div class="container flex pc">

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

        <div class="social-icons movil">
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
                <br><br>
            </div>
        <div class="movil">
            <p class="centerText">© 2018 Desarrollado por <br><a href="http://roguezservices.com/" target="_blank" rel="noopener noreferrer">
                <img src="http://roguezservices.com/img/logoNav.png"></a>
            </p>
        </div>
    
       

        
    </footer>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ url('assets/sweet/sweetalert.min.js') }}"></script>
    <script src="{{ url('js/visitor/email.js') }}"></script>
    <script> var linkToActivated = "#@yield('activeLink')WWW"; </script>
    <script src="{{ url('js/visitor/activeLink.js') }}"></script>
    <script src="{{ url('js/visitor/menu.js') }}"></script>
    @yield('scripts')

</body>
</html>