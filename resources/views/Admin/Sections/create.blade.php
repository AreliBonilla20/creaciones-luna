@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
    <div class="pb-4 btn-back">
        <a href="{{route('sections.index')}}"><button class="btn"><i class="bi bi-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="pb-4 content-title">
        <h4>Agregar sección</h4>
    </div>


    <form class="py-2 px-5" action="{{route('sections.store')}}" method="POST">
    @csrf
    <div class="form-text pb-4">
        <p>Ingrese los datos que solicita el formulario. Los campos con (*) son obligatorios</p>
    </div>

    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nombre <span>(*)</span></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la sección" value="{{old('name')}}">
        @foreach ($errors->get('name') as $mensaje)
            <small style="color:#333399;">{{ $mensaje }}</small>
        @endforeach
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-10">
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Descripción de la sección" rows="5" value="{{old('description')}}"></textarea>
        @foreach ($errors->get('description') as $mensaje)
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