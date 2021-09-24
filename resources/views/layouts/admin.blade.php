<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/datatables.min.js') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
   

    <title>Creaciones luna</title>
  </head>
  
  <body>
      <header>
      <nav class="navbar navbar-cl navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
            <img src="{{asset('images/logo-final.png')}}" alt="Logo creaciones luna" width="40" height="40">
            <h5 class="navbar-brand title-nav" href="#">| Creaciones Luna</h5>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 panel-container">
                <div class="panel">
                    <h4> Panel de administración</h4>
                    <h6>Sitio web</h6>
                </div>
                </div>
            </div>
        </div>

        <div class="container panel-menu">
            <div class="row">
                <div class="col-12">
                    <ul class="nav justify-content-center" >
                        <li class="nav-item">
                            <a class="nav-link panel-link" href="{{route('page.index')}}"> <h6>Contenido</h6> </a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link panel-link" href="{{route('products.index')}}"> <h6>Productos</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link panel-link" href="{{route('sections.index')}}"><h6>Secciones</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link panel-link" href="{{route('packages.index')}}"><h6>Paquetes</h6></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>

        <div class="container main-content">
            @yield('content')
        </div>
 

    <footer class="footer">
        <div class="container-fluid">
            Creaciones Luna @ {{ date('Y') }}
        </div>
    </footer>

    
    @include('sweetalert::alert')
    
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>