@extends('layouts.admin')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="pt-4" style="text-align:center;">
        <h5>Actualizar producto</h5>
    </div>

<form class="py-4 px-4" action="{{route('products.update', $product)}}" style="background: #fdf2f2" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="py-2" style="text-align:center;">
            <img src="{{$product->get_image}}" alt="Imagen del producto" height="300" width="200">
        </div>
    <div class="form-group row py-4">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{$product->name}}">
        @foreach ($errors->get('name') as $mensaje)
            <small style="color:#B42020;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-10">
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Descripción del producto" rows="5" value="{{$product->description}}"></textarea>
        @foreach ($errors->get('description') as $mensaje)
            <small style="color:#B42020;">{{ $mensaje }}</small>
        @endforeach    
    </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Precio</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="price" name="price" placeholder="Precio del producto" step="any" value="{{$product->price}}">
        @foreach ($errors->get('price') as $mensaje)
            <small style="color:#B42020;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>

    <div class="form-group row">
        <label for="available" class="col-sm-2 col-form-label">Existencias</label>
        <div class="col-sm-10">
        <select class="custom-select" name="available" id="available" value="{{$product->available}}" >
            <option value="1">Disponible</option>
            <option value="0">No disponible</option>
        </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="url_image" class="col-sm-2 col-form-label">Imagen</label>
        <div class="col-sm-10">
        <input type="file" class="form-control" id="url_image" name="url_image" value="{{$product->url_image}}">
        @foreach ($errors->get('url_image') as $mensaje)
            <small style="color:#B42020;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>

    <div class="form-group py-4">
        <div class="col-sm-10 ">
        <button type="submit" class="btn btn-secondary">Actualizar</button>
        </div>
    </div>
    </form>

</div>

@endsection