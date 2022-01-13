@extends('layout.masterpage')
@section('titulo','Catalogo de productos')
@section('contenido')



<h2>Catalogo   <!-- Button trigger modal -->
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Añadir productos
  </button>
</h2>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($maquinas as $plotter)
            <tr>
                <th scope="row">{{$plotter->marca}} </th>
                <td>{{ $plotter->modelo }}</td>
                <td>{{ $plotter->descripcion }}</td>
                <td>
                    {{--Ver la ficha completa--}}
                        <a href="./plotters/{{$plotter->id}}"><i class="fas fa-eye"></i></a>
                    {{--Eliminar este plotter--}}
                    <form action="{{route('plotters.destroy',['plotter' => $plotter])}}" method="post">
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
  <form class="row g-3" action="{{route('plotters.store')}}" method="post"  enctype="multipart/form-data"  >
    {{csrf_field()}}
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creación de un nuevo plotter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          <div class="col-md-6">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca">
          </div>
          <div class="col-12">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo de plotter, no de lencería">
          </div>
          <div class="col-12">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Bla bla bla....">
          </div>
          <div class="col-12">
            <label for="velocidad" class="form-label">Velocidad</label>
            <input type="number" class="form-control" id="velocidad" name="velocidad" placeholder="¿300.000?">
          </div>
          <div class="mb-3">
            <label for="imagen" class="form-label">Foto</label>
            <input class="form-control" type="file" id="imagen" name="imagen">
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
               Confirma que aceptas que nos quedemos con toda tu información
              </label>
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Crear</button>
      </div>

    </div>
  </div>
</form>
</div>
@endsection
