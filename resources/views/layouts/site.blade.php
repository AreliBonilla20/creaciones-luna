<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset ('css/site.css')}}">
    
    <title>Creaciones luna</title>
</head>
<body>
    
    <!--Header start-->
    <header>

        <nav class="navbar navbar-cl navbar-expand-lg navbar-light bg-light fixed-top">
            <img src="{{asset('images/web/logo-final.png')}}" alt="Logo" width="60" height="60">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="navbar-nav mr-auto">
                <li class="menu-li nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="menu-li nav-item">
                  <a class="nav-link" href="#about-us">Conócenos</a>
                </li>
                <li class="menu-li nav-item">
                  <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="menu-li nav-item">
                  <a class="nav-link" href="#">Paquetes</a>
                </li>
                <li class="menu-li nav-item">
                  <a class="nav-link" href="#">Librería</a>
                </li>

                  <li class="menu-li nav-item">
                    <a class="nav-link" href="#footer">Contáctanos</a>
                  </li>
              </ul>
             
            </div>
          </nav>
    </header>
    <!--Header end-->

        <div>
            @yield('content')
        </div>
        
    <!--Footer start-->
        <footer id="footer" class="pt-5">
            <div class="contactos">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-offset-2 col-8">
                            <h5><strong> Búscanos en nuestras redes sociales</strong></h5>
                            <div class="py-1">
                                <a href=""><img src="{{asset('images/web/facebook.png')}}" alt="Facebook logo" width="35px" height="35px"> facebook/creaciones-luna</a>
                            </div>
                            <div class="py-1">
                                <a href=""><img src="{{asset('images/web/tiktok.png')}}" alt="Tiktok logo" width="35px" height="35px"> @creacionesluna.v </a>
                            </div>
                            <div class="py-1">
                                <a href=""><img src="{{asset('images/web/whatsapp.png')}}" alt="Whatsapp logo" width="35px" height="35px"> 7239-3910 </a>
                            </div>

                            <h5 class="pt-4"><strong>Visítanos</strong></h5>
                            <div>
                                <a href="https://goo.gl/maps/zJSNXQUK7NC25UnQ8" target="_blank"><img src="{{asset('images/web/location.png')}}" alt="Location logo" width="35px" height="40px"> Ciudad Arce, Santa Lucía, La Libertad, El Salvador </a>
                            </div>
                           
                        </div>
                        <div class="col-md-2 d-none d-md-block">
                            <img src="{{asset('images/web/logo-final.png')}}" alt="Logo creaciones luna" width="200" height="200">
                        </div>
                    </div>
                </div>
               
            </div>

        
            <div class="menu pt-4">
                <hr class="h-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="">Inicio</a>
                        <a href="">Conócenos</a>
                        <a href="">Servicios</a>
                        <a href="">Productos</a>
                        <a href="">Paquetes</a>
                        <a href="">Contáctanos</a>
                    </div>
                </div>
                
            </div>
            <hr class="h-4">

            <div class="pt-4 footer-bottom">
                <p>CreacionesLuna @ <em> <strong>{{date('Y')}}</strong> </em></p>
            </div>
            <div class="right">
            <a href="{{route('login')}}"><img src="{{asset('images/web/settings.png')}}" width="20px" height="20px"></a>
            </div>
        </footer>
    
        <!--Footer end-->



        <!--Main end-->
  
    <!--Javascript files-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>