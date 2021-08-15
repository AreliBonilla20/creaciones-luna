@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
    <div class="pb-4 btn-back">
        <a href="{{route('page.index')}}"><button class="btn"><i class="bi bi-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="pb-4 content-title">
        <h4>Agregar contenido</h4>
    </div>


    <form class="py-2 px-5" action="{{route('page.store')}}" method="POST">
        @csrf
        <div class="form-text pb-4">
            <p>Ingrese los datos que solicita el formulario. Los campos con (*) son obligatorios</p>
        </div>

        <div class="form-group row">
            <label for="description_header" class="col-sm-2 col-form-label">Descripción del encabezado <span>(*)</span></label>
            <div class="col-sm-10">
            <textarea type="text" class="form-control" id="description_header" name="description_header" placeholder="Descripción del encabezado" rows="6" value="{{old('description_header')}}"></textarea>
            @foreach ($errors->get('description_header') as $mensaje)
                <small class="error-msg">{{ $mensaje }}</small>
            @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="who_we_are" class="col-sm-2 col-form-label">Quienes somos <span>(*)</span></label>
            <div class="col-sm-10">
            <textarea type="text" class="form-control" id="who_we_are" name="who_we_are" placeholder="Descripción de la sección" rows="6" value="{{old('who_we_are')}}"></textarea>
            @foreach ($errors->get('who_we_are') as $mensaje)
                <small class="error-msg">{{ $mensaje }}</small>
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