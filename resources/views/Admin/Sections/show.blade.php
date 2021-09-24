@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
    <div class="pb-4 btn-back">
        <a href="{{route('products.index')}}"><button class="btn"><i class="bi bi-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="pb-4 content-title">
        <h4>Consultar sección</h4>
        <p>{{$section->name}}</p>
    </div>

  <div class="card">
    <div class="card-header">
      Sección N°. {{$section->id}}
    </div>
    <div class="card-body">
      
      <h4 class="card-title">{{$section->name}}</h4>
      <p class="card-text pt-4">{{$section->description}}</p>
    
      <div class="btn-show">
          <a href="{{route('sections.edit', $section)}}"><button class="btn btn-edit btn-sm"><i class="bi bi-pencil"></i> Editar</button></a>
          <a href="{{route('sections.destroy', $section)}}"><button class="btn btn-delete btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/avisos.js') }}"></script>
@endsection