@extends('layout.masterpage')
@section('titulo','Catalogo de productos')
@section('contenido')



<h2>Catalogo   <!-- Button trigger modal -->
    <!-- Button trigger modal -->
  @if(Auth::check() && Auth::user()->roles->name=='tienda')
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Añadir productos
  </button>
  @endif
</h2>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        @if(Auth::check())
        <th scope="col">Ver</th>
        <th scope="col">Eliminar</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <th scope="row">{{$producto->nombre}} </th>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                @if(Auth::check())
                  <td>
                    {{--Ver la ficha completa--}}
                        <a href="./productos/{{$producto->id}}"><i class="fas fa-edit"></i></a>
                    {{--Eliminar este producto--}}
                  </td>
                  <td>
                    <form action="{{route('productos.destroy',['producto' => $producto])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-small btn-primary" ><i class="fas fa-trash"></i> </button>
                    </form>
                  </td>
                @endif
            </tr>
        @endforeach

    </tbody>
  </table>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form class="row g-3" action="{{route('productos.store')}}" method="post"  enctype="multipart/form-data"  >
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
          <!-- <div class="col-md-6">
            <label for="marca" class="form-label">Ref</label>
            <input type="text" class="form-control" id="id" name="id">
          </div> -->
          <div class="col-12">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Bla bla bla....">
          </div>
          <div class="col-12">
            <label for="velocidad" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" placeholder="€">
          </div>
          <div class="mb-3">
            <label for="imagen" class="form-label">Foto</label>
            <input class="form-control" type="file" id="imagen" name="imagen">
          </div>
          <div class="col-12">
            <input id="tiendaId" name="tiendaId" type="hidden" value={{$id}}>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Añadir producto</button>
      </div>

    </div>
  </div>
</form>
<!--Envio correo de listado de productos-->
<form method="POST" action="">
            <input type="text" placeholder="Introduce tu nombre" ></br>
            <input type="email" placeholder="Introduce tu correo">
        </form>
</div>
@endsection
