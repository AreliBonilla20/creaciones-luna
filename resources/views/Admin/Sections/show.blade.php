@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
    <div class="pb-4 btn-back">
        <a href="{{route('products.index')}}"><button class="btn"><i class="bi bi-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="pb-4 content-title">
        <h4>Consultar producto</h4>
        <p>{{$product->name}}</p>
    </div>

  <div class="card">
    <div class="card-header">
      Producto N°. {{$product->id}}
    </div>
    <div class="card-body">
      <div class="py-4 show-img">
          <img src="{{$product->get_image}}" alt="Imagen del producto" height="300" width="200">
      </div>
      <h4 class="card-title">{{$product->name}}</h4>
      <p class="card-text pt-4">{{$product->description}}</p>
      <p>Categoría : <strong>{{$product->category->name}}</strong></p>
      <p>Precio : <strong>$ {{number_format($product->price, 2)}}</strong></p>
      <p>Disponibilidad : <strong>{{$product->get_availability}}</strong></p>
    
      <div class="btn-show">
          <a href="{{route('products.edit', $product)}}"><button class="btn btn-edit"><i class="bi bi-pencil"></i> Editar</button></a>
          <a href="{{route('products.destroy', $product)}}"><button class="btn btn-delete"><i class="bi bi-trash"></i> Eliminar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/avisos.js') }}"></script>
@endsection