@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
  <div class="pb-4 content-title">
    <h4>Listado de productos</h4>
  </div>

  <div class="index-content">
  <a href="{{route('products.create')}}"><button class="btn btn-add"><i class="bi bi-plus"></i>Agregar producto</button></a>
  
  @if(count($products)>0)
  <div class="py-4">
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Diponibilidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Consultar</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->get_availability}}</td>
        <td>$ {{ number_format($product->price, 2 ) }}</td>
        <td><a href="{{route('products.show', $product)}}"><button class="btn btn-consult btn-sm"><i class="bi bi-eye"></i> Consultar</button></a></td>
        <td><a href="{{route('products.edit', $product)}}"><button class="btn btn-edit btn-sm"><i class="bi bi-pencil"></i> Editar</button></a></td>
        <td>
        <form method="POST" id="formulario{{$product->id}}" action="{{route('products.destroy', $product->id)}}" >
            @csrf
            @method('DELETE')
            <button type="button" onClick="confirmar({{$product->id}})" class="btn btn-delete btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
        </form>                             
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
  @endif
  </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/delete_confirm.js') }}"></script>
@endsection