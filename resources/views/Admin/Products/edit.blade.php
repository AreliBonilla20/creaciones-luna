@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
    <div class="pb-4 btn-back">
        <a href="{{route('products.index')}}"><button class="btn"><i class="bi bi-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="pb-4 content-title">
        <h4>Editar producto</h4>
        <p>{{$product->name}}</p>
    </div>


    <form class="py-2 px-5" action="{{route('products.update', $product)}}" method="POST" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-text pb-4">
            <p>Ingrese los datos que solicita el formulario. Los campos con (*) son obligatorios</p>
        </div>

        <div class="py-4 product-edit-img">
            <img src="{{$product->get_image}}" alt="Imagen del producto" height="300" width="200">
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombre <span>(*)</span></label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{$product->name}}">
            @foreach ($errors->get('name') as $mensaje)
                <small style="color:#960303;">{{ $mensaje }}</small>
            @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Descripción <span>(*)</span></label>
            <div class="col-sm-10">
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Descripción del producto" rows="5">{{$product->description}}</textarea>
            @foreach ($errors->get('description') as $mensaje)
                <small style="color:#960303;">{{ $mensaje }}</small>
            @endforeach    
        </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Precio ($) <span>(*)</span></label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" placeholder="Precio del producto" step="any" value="{{number_format($product->price,2)}}">
            @foreach ($errors->get('price') as $mensaje)
                <small style="color:#960303;">{{ $mensaje }}</small>
            @endforeach
            </div>
        </div>
    
        <div class="form-group row">
            <label for="available" class="col-sm-2 col-form-label">Categoría <span>(*)</span></label>
            <div class="col-sm-10">
            <select class="custom-select" name="category_id" id="category_id">
                <option value="">--Seleccione una categoría</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ ($product->category_id == $loop->iteration ? "selected":"") }}>{{$category->name}}</option>
                @endforeach
            </select>
            @foreach ($errors->get('category') as $mensaje)
                <small style="color:#960303;">{{ $mensaje }}</small>
            @endforeach
            </div>
        </div>

        <div class="form-group row">
            <label for="available" class="col-sm-2 col-form-label">Existencias <span>(*)</span></label>
            <div class="col-sm-10">
            <select class="custom-select" name="available" id="available" value="{{$product->available}}">
                <option value="1" {{ ($product->available == 1 ? "selected":"") }}>Disponible</option>
                <option value="0" {{ ($product->available == 0 ? "selected":"") }}>No disponible</option>
            </select>
            @foreach ($errors->get('available') as $mensaje)
                <small style="color:#960303;">{{ $mensaje }}</small>
            @endforeach
            </div>
        </div>

        <hr>
        <div class="py-1 center">
            <p>Agregue una nueva imagen si desea cambiar la actual</p>
        </div>
    
        <div class="form-group row">
            <label for="url_image" class="col-sm-2 col-form-label">Imagen <span>(*)</span></label>
            <div class="col-sm-10">
            <input type="file" class="form-control" id="url_image" name="url_image" value="{{$product->url_image}}">
            </div>
        </div>

        <div class="form-group py-4 btn-save">
            <div class="col-sm-12 ">
            <button type="submit" class="btn btn-secondary">Actualizar</button>
            </div>
        </div>
    </form>

</div>

@endsection