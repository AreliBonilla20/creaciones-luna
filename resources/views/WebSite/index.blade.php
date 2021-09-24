@extends('layouts.site')

@section('content')
    <!--Main start-->
    <main id="main">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('images/web/carousel1.jpg')}}" class="d-block w-100" alt="Cumpleaños">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/web/carousel2.jpg')}}" class="d-block w-100" alt="Cumpleaños">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/web/carousel3.jpg')}}" class="d-block w-100" alt="Boda">
              </div>
    
              <div class="overlay carousel-caption">
                  <div class="container">
                      <div class="row align-items-center text-center">
                          <div class="offset-lg-2 col-lg-8 offset-lg-2 text-center">
                            <img src="{{asset('images/web/logo.png')}}" alt="Logo" width="300" height="300">
                            <div class="d-none d-md-block">
                              <h1 class="title-index">Creaciones Luna</h1>
                              <p class="d-none d-lg-block">
                                  {{$page->description_header}}
                              </p>
                              <a href="" class="btn btn-outline btn-cl">Ver más...</a>
                            </div>
                          </div>
                        
                      </div>
                  </div>
              </div>
    
            </div>
          
          </div>
    </main>

    <!--About us start-->
    <section id="about-us">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-12 col-lg-5 pt-5">
                    <h2 class="about-us-title"> <strong>¿ Quiénes somos ?</strong> <br>__________ ... __________</h2>
                    <div class="pt-4 px-3">
                        {{$page->who_we_are}}
                          <br> _________ ... __________
                        <hr>
                    </div>
                </div>

                <div class="col-12 col-lg-7">
                    <img  src="{{asset('images/web/colage1.png')}}" alt="Creaciones luna local" width="750" height="500">
                </div>
    
            </div>
        </div>
    </section>
    <!--About us end-->

      <!--Popular products us start-->
      <section id="popular-products">
        <div class="container">
            <h2 class="pb-4 popular-products-title"> <strong>Productos populares</strong> <br>__________ ... __________</h2>
            <div class="row">
                <div class="col-12 col-lg-4 pt-2">
                    <a href=""><img src="{{asset('images/web/popular-prod1.jpg')}}" alt="Producto popular"></a>
                </div>
                <div class="col-12 col-lg-4 pt-2">
                    <a href=""><img src="{{asset('images/web/popular-prod2.jpg')}}" alt="Producto popular"></a>
                </div>
                <div class="col-12 col-lg-4 pt-2">
                    <a href=""><img src="{{asset('images/web/popular-prod3.jpg')}}" alt="Producto popular"></a>
                </div>
            <div class="col-12 pt-3">
                <a href="" class="btn btn-lg btn-popular-products">Ver más</a>
            </div>
        </div>
    </section>
    <!--Popular products end-->

      <!--Popular products us start-->
      <section id="services-done">
        <div class="container">
            <h2 class="pb-4 services-done-title"> <strong>Algunos de nuestros trabajos...</strong> <br>__________ ... __________</h2>
            <div class="row">
                <div class="col-12 col-lg-3 pt-2">
                    <a href=""><img src="{{asset('images/web/popular-prod1.jpg')}}" alt="Producto popular"></a>
                </div>
                <div class="col-12 col-lg-3 pt-2">
                    <a href=""><img src="{{asset('images/web/popular-prod1.jpg')}}" alt="Producto popular"></a>
                </div>
                <div class="col-12 col-lg-3 pt-2">
                    <a href=""><img src="{{asset('images/web/popular-prod1.jpg')}}" alt="Producto popular"></a>
                </div>
                <div class="col-12 col-lg-3 pt-2">
                    <a href=""><img src="{{asset('images/web/popular-prod1.jpg')}}" alt="Producto popular"></a>
                </div>
            </div>
            <div class="col-12 pt-3">
                <a href="" class="btn btn-lg btn-services-done">Ver más</a>
              </div>
        </div>
    </section>
    <!--Popular products end-->

@endsection