@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
    <div class="pb-4 btn-back">
        <a href="{{route('packages.index')}}"><button class="btn"><i class="bi bi-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="pb-4 content-title">
        <h4>Consultar paquete</h4>
        <p>{{$package->name}}</p>
    </div>

  <div class="card">
    <div class="card-header">
      Paquete N°. {{$package->id}}
    </div>
    <div class="card-body">
      <h4 class="card-title">{{$package->name}}</h4>
      <p class="card-text pt-4">{{$package->description}}</p>
      <p>Sección : <strong>{{$package->section->name}}</strong></p>
      <p>Cantidad de personas : <strong>{{$package->amount_people}}</strong></p>
      <p>Condiciones : <strong>{{$package->conditions}}</strong></p>
      <p>Precio : <strong>$ {{number_format($package->price, 2)}}</strong></p>

      <div class="items-package">
        <h6>El paquete incluye:</h6>
        @foreach($package->items as $item)
          <li>{{$item->name}}</li>
        @endforeach
      </div>
      
        
      <h4 class="center py-4">Multimedia</h4>
      <div class="py-4 show-img">
          
          @if($package->get_image1)
          <img src="{{$package->get_image1}}" alt="Imagen del paquete" height="250" width="300">
          @endif
          @if($package->get_image2)
          <img src="{{$package->get_image2}}" alt="Imagen del paquete" height="250" width="300">
          @endif
          @if($package->get_image3)
          <img src="{{$package->get_image3}}" alt="Imagen del paquete" height="250" width="300">
          @endif
          <div class="center py-4">
          @if($package->get_video)
            <video height="300" width="400" controls>
              <source src="{{$package->get_video}}">
            </video>
          @endif
          </div>
         
      </div>
     
    
      <div class="btn-show">
          <a href="{{route('packages.edit', $package)}}"><button class="btn btn-edit btn-sm"><i class="bi bi-pencil"></i> Editar</button></a>
          <a href="{{route('packages.destroy', $package)}}"><button class="btn btn-delete btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/avisos.js') }}"></script>
@endsection