@extends('layouts.admin')

@section('content')

<div class="main-wrapper">
  <div class="pb-4 content-title">
    <h4>Listado de paquetes</h4>
  </div>

  <div class="index-content">
  <a href="{{route('packages.create')}}"><button class="btn btn-add"><i class="bi bi-plus"></i>Agregar paquete</button></a>
  
 
    @if(count($packages)>0)
    <div class="py-4">
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Sección</th>
          <th scope="col">Personas</th>
          <th scope="col">Precio</th>
          <th scope="col">Consultar</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
      @foreach($packages as $package)
        <tr>
          <th scope="row">{{$package->id}}</th>
          <td>{{$package->name}}</td>
          <td>{{$package->section->name}}</td>
          <td>{{$package->amount_people}}</td>
          <td>$ {{ number_format($package->price, 2 ) }}</td>
          <td><a href="{{route('packages.show', $package)}}"><button class="btn btn-consult btn-sm"><i class="bi bi-eye"></i> Consultar</button></a></td>
          <td><a href="{{route('packages.edit', $package)}}"><button class="btn btn-edit btn-sm"><i class="bi bi-pencil"></i> Editar</button></a></td>
          <td>
          <form method="POST" id="formulario{{$package->id}}" action="{{route('packages.destroy', $package->id)}}" >
              @csrf
              @method('DELETE')
              <button type="button" onClick="confirmar({{$package->id}})" class="btn btn-delete btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
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
<script src="{{ asset('js/delete_confirm.js') }}"></script>
@endsection