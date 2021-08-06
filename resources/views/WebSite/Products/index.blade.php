@extends('layouts.admin')

@section('content')
  <a href="{{route('products.create')}}"><button class="btn btn-success"><i class="bi bi-plus"></i>Agregar Producto</button></a>
  
  @if(count($products)>0)
    <div class="pt-4" style="text-align:center;">
      <h5>Listado de productos</h5>
    </div>

  
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>$ {{ number_format($product->price, 2 ) }}</td>
        <td><a href="{{route('products.show', $product)}}"><button class="btn btn-info"><i class="bi bi-eye"></i></button></a>
            <a href="{{route('products.edit', $product)}}"><button class="btn btn-warning"><i class="bi bi-pencil"></i></button></a>
            <a href="{{route('products.destroy', $product)}}"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
      </tr>
    @endforeach
    </tbody>
  </table>

  @endif
@endsection