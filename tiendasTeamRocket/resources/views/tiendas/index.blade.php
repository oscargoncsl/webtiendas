@extends('layout.masterpage')
@section('titulo','Listado de tiendas')
@section('contenido')



<h2>Tiendas   <!-- Button trigger modal -->
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Añadir comercio
  </button>
</h2>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Direccion</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tiendas as $tienda)
            <tr>
                <th scope="row">{{$tienda->nombre}} </th>
                <td>{{ $tienda->descripcion}}</td>
                <td>{{ $tienda->direccion}}</td>
                <td>
                    {{--Ver la ficha completa--}}
                        <a href="./tiendas/{{$tienda->id}}"><i class="fas fa-eye"></i></a>
                    {{--Eliminar este comercio--}}
                    <form action="{{route('tiendas.destroy',['tienda' => $tienda])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-small btn-warning" ><i class="fas fa-trash"></i> Eliminar </button>
                    </form>

                </td>

            </tr>
        @endforeach
    </tbody>
  </table>







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form class="row g-3" action="{{route('tiendas.store')}}" method="post"  enctype="multipart/form-data"  >
    {{csrf_field()}}
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo comercio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


          <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>

          <div class="col-12">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" placeholder="Autonomia 32">
          </div>
          


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Añadir comercio</button>
      </div>

    </div>
  </div>
</form>
</div>
@endsection
