@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
  <div class="pb-4 content-title">
    <h4>Listado de secciones</h4>
  </div>

  <div class="index-content">
  <a href="{{route('sections.create')}}"><button class="btn btn-add"><i class="bi bi-plus"></i>Agregar sección</button></a>
 
  @if(count($sections)>0)
  <div class="py-4">
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Paquetes</th>
        <th scope="col">Consultar</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
    @foreach($sections as $section)
      <tr>
        <th scope="row">{{$section->id}}</th>
        <td>{{$section->name}}</td>
        <td>{{$section->description}}</td>
        <td>3</td>
        <td><a href="{{route('sections.show', $section)}}"><button class="btn btn-consult btn-sm"><i class="bi bi-eye"></i> Consultar</button></a></td>
        <td><a href="{{route('sections.edit', $section)}}"><button class="btn btn-edit btn-sm"><i class="bi bi-pencil"></i> Editar</button></a></td>
        <td>
        <form method="POST" id="formulario{{$section->id}}" action="{{route('sections.destroy', $section->id)}}" >
            @csrf
            @method('DELETE')
            <button type="button" onClick="confirmar({{$section->id}})" class="btn btn-delete btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
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
<script src="{{ asset('js/delete_product.js') }}"></script>
@endsection