@extends('layout.masterpage')
@section('titulo','ComercioFelizBilbao')
@section('contenido')



<h2>Tiendas   <!-- Button trigger modal -->
    <!-- Button trigger modal -->
    @if(Auth::check() && Auth::user()->roles->name=='admin')
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Añadir comercio
      </button>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Añadir comerciante nuevo
    </button>
    @endif

</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ubicacion</th>
            @if(Auth::check() && Auth::user()->roles->name=='admin')
        <th scope="col">Comerciante</th>
        @endif
        <th scope="col">Catálogo</th>
        @if(Auth::check())
        <th scope="col">Ver</th>
        <th scope="col">Eliminar</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($tiendas as $tienda)
            <tr>
                <th scope="row">{{$tienda->nombre}} </th>
                <td>{{$tienda->ubicacion}}</td>
               @if(Auth::check() && Auth::user()->roles->name=='admin')
                <td>{{$tienda->user->name }}</td>
                 @endif
                <td>
                  {{--Ver catálogo de tienda--}}
                        <a href="./productos?id={{$tienda->id}}"><i class="fas fa-book-open"></i></a>
                </td>
              @if(Auth::check() && Auth::user()->roles->name=='tienda' && Auth::user()->id==$tienda->user->id )
                <td>
                    {{--Ver la ficha de tienda y editarla--}}
                        <a href="./tiendas/{{$tienda->id}}"><i class="fas fa-edit"></i></a>
                </td>

                <td>
                    {{--Eliminar este comercio--}}
                    <form action="{{route('tiendas.destroy',['tienda' => $tienda])}}" method="post">
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
            <div class="col-12">
                <label for="usuario" class="form-label">Usuario</label>
                <select name="usuario">
                @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
                </select>
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
