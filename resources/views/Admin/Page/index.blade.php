@extends('layouts.admin')

@section('content')

<div class="main-wrapper mx-4">

    <div class="pb-4 content-title">
        <h4>Contenido principal</h4>
    </div>

    @if(!$page_content)
    <div class="content-index py-4">
      <a href="{{route('page.create')}}"><button class="btn btn-add"><i class="bi bi-plus"></i>Agregar contenido</button></a>
    </div>
    @endif

    @if($page_content)
   
    <div class="card text-left">
      <div class="card-header">
        Página inicio
      </div>
      <div class="offset-2 col-sm-8 offset-2">
      <div class="card-body">
        <h5 class="card-title">Sección : descripción del encabezado</h5>
        <p class="card-text">{{$page_content->description_header}}</p>
      </div>
      <hr>
      <div class="card-body">
        <h5 class="card-title">Sección : ¿Quiénes somos?</h5>
        <p class="card-text">{{$page_content->who_we_are}}</p>
      </div>
      </div>
      <div class="btn-show py-4 px-4">
          <a href="{{route('page.edit', $page_content)}}"><button class="btn btn-edit btn-sm"><i class="bi bi-pencil"></i> Editar</button></a>
          <a href="{{route('page.destroy', $page_content)}}"><button class="btn btn-delete btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
      </div>
    
    </div>
    @endif
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/delete_confirm.js') }}"></script>
@endsection