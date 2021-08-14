@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
    <div class="pb-4 btn-back">
        <a href="{{route('products.index')}}"><button class="btn"><i class="bi bi-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="pb-4 content-title">
        <h4>Agregar producto</h4>
    </div>


    <form class="py-2 px-5" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-text pb-4">
        <p>Ingrese los datos que solicita el formulario. Los campos con (*) son obligatorios</p>
    </div>

    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nombre <span>(*)</span></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{old('name')}}">
        @foreach ($errors->get('name') as $mensaje)
            <small style="color:#333399;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Descripción <span>(*)</span></label>
        <div class="col-sm-10">
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Descripción del producto" rows="5" value="{{old('description')}}"></textarea>
        @foreach ($errors->get('description') as $mensaje)
            <small style="color:#333399;">{{ $mensaje }}</small>
        @endforeach    
    </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Precio ($) <span>(*)</span></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="price" name="price" placeholder="Precio del producto" step="any" value="{{old('price')}}">
        @foreach ($errors->get('price') as $mensaje)
            <small style="color:#333399;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>

    <div class="form-group row">
        <label for="available" class="col-sm-2 col-form-label">Categoría <span>(*)</span></label>
        <div class="col-sm-10">
        <select class="custom-select" name="category_id" id="category_id" value="{{old('category_id')}}">
            <option value="">--Seleccione una categoría</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @foreach ($errors->get('category_id') as $mensaje)
            <small style="color:#333399;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>

    <div class="form-group row">
        <label for="available" class="col-sm-2 col-form-label">Existencias <span>(*)</span></label>
        <div class="col-sm-10">
        <select class="custom-select" name="available" id="available" value="{{old('available')}}">
            <option selected value="1">Disponible</option>
            <option value="0">No disponible</option>
        </select>
        @foreach ($errors->get('available') as $mensaje)
            <small style="color:#333399;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>

    <div class="form-group row">
        <label for="url_image" class="col-sm-2 col-form-label">Imagen <span>(*)</span></label>
        <div class="col-sm-10">
        <input type="file" class="form-control" id="url_image" name="url_image" value="{{old('url_image')}}">
        @foreach ($errors->get('url_image') as $mensaje)
            <small style="color:#333399;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>

    <div class="form-group py-4 btn-save">
        <div class="col-sm-12 ">
        <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </div>
</form>

</div>
@endsection