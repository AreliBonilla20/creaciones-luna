@extends('layouts.admin')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="main-wrapper">
    <div class="pb-4 btn-back">
        <a href="{{route('packages.index')}}"><button class="btn"><i class="bi bi-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="pb-4 content-title">
        <h4>Actualizar paquete</h4>
    </div>


    <form class="py-2 px-5" action="{{route('packages.update', $package)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-text pb-4">
        <p>Ingrese los datos que solicita el formulario. Los campos con (*) son obligatorios</p>
    </div>

    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nombre <span>(*)</span></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del paquete" value="{{$package->name}}">
        @foreach ($errors->get('name') as $mensaje)
            <small class="error-msg">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Descripción <span>(*)</span></label>
        <div class="col-sm-10">
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Descripción del paquete" rows="5" value="{{old('description')}}">{{$package->description}}</textarea>
        @foreach ($errors->get('description') as $mensaje)
            <small class="error-msg">{{ $mensaje }}</small>
        @endforeach    
        </div>
    </div>

    <div class="form-group row">
        <label for="conditions" class="col-sm-2 col-form-label">Condiciones <span>(*)</span></label>
        <div class="col-sm-10">
        <textarea type="text" class="form-control" id="conditions" name="conditions" placeholder="Condiciones del paquete" rows="5" value="{{old('conditions')}}">{{$package->conditions}}</textarea>
        @foreach ($errors->get('conditions') as $mensaje)
            <small class="error-msg">{{ $mensaje }}</small>
        @endforeach    
        </div>
    </div>

    
    <div class="form-group row">
        <label for="category_id" class="col-sm-2 col-form-label">Sección <span>(*)</span></label>
        <div class="col-sm-10">
        <select class="custom-select" name="section_id" id="section_id" value="{{$package->name}}">
            <option value="">--Seleccione una categoría</option>
            @foreach($sections as $section)
            <option value="{{$section->id}}" {{ ($section->id == $package->section_id ? "selected":"") }}>{{$section->name}}</option>
            @endforeach
        </select>
        @foreach ($errors->get('section_id') as $mensaje)
            <small class="error-msg">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>

    <div class="form-group row">
        <label for="amount_people" class="col-sm-2 col-form-label">Cantidad de personas <span>(*)</span></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="amount_people" name="amount_people" placeholder="Cantidad de personas" min="0" value="{{$package->amount_people}}">
        @foreach ($errors->get('amount_people') as $mensaje)
            <small class="error-msg">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>


    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Precio ($) <span>(*)</span></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="price" name="price" placeholder="Precio del paquete" step="any" value="{{$package->price}}">
        @foreach ($errors->get('price') as $mensaje)
            <small class="error-msg">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>
    <hr>

    <h5 class="center">Contenido multimedia</h5>
    <div class="py-1 center">
        <p>Agregue nuevas imágenes o vídeos si desea remplazar los actuales</p>
    </div>
    <h6 class="my-4 center">Imágenes</h6>

    <div class="form-group row">
        <label for="url_image1" class="col-sm-2 col-form-label">Imagen 1</label>
        <div class="col-sm-10">
        <input type="file" class="form-control" id="url_image1" name="url_image1" value="{{old('url_image1')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="url_image2" class="col-sm-2 col-form-label">Imagen 2</label>
        <div class="col-sm-10">
        <input type="file" class="form-control" id="url_image2" name="url_image2" value="{{old('url_image2')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="url_image3" class="col-sm-2 col-form-label">Imagen 3</label>
        <div class="col-sm-10">
        <input type="file" class="form-control" id="url_image3" name="url_image3" value="{{old('url_image3')}}">
        </div>
    </div>

    <h6 class="my-4 center">Vídeos</h6>
    <div class="form-group row">
        <label for="url_video" class="col-sm-2 col-form-label">Vídeo </label>
        <div class="col-sm-10">
        <input type="file" class="form-control" id="url_video" name="url_video" value="{{old('url_video')}}">
        </div>
    </div>
  
    
    <hr>
    <div class="items-container">
        <h5>Servicios que contiene el paquete</h5>

        @foreach($package->items as $item)
            <div class="form-group row mx-0">
                <label for="item" class="col-sm-2 col-form-label">Servicio<span>(*)</span></label>
                    <input type="text" class="form-control col-sm-8" id="item" name="item[]" value="{{$item->name}}">
                    <button type="button" class="delete_item btn btn-delete ml-4"> <i class="bi bi-dash"></i> </button>
            </div>
        @endforeach
        
        <div class="col-sm-12">
            <button type="button" id="add_item" class="btn btn-add mb-3"><i class="bi bi-plus"></i>Agregar servicio</button>
        </div>
    </div>

    <div class="form-group py-4 btn-save">
        <div class="col-sm-12 ">
        <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </div>
  
</form>

<script>
    $(document).ready(function() {
    $("#add_item").click(function(){
        var counter = $("input[type='item']").length;

        $(this).before('<div class="form-group row"><label class="col-sm-2 col-form-label" for="item'+ counter +'">Servicio <span>(*)</span></label><input class="form-control col-sm-8" placeholder="Servicio del paquete" type="text" id="item'+ counter +'" name="item[]"/><button type="button" class="delete_item btn btn-delete ml-4"> <i class="bi bi-dash"></i> </button></div>');
    });
    $(document).on('click', '.delete_item', function(){
        $(this).parent().remove();
    });
    })
</script>

</div>
@endsection