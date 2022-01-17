@extends('layout.masterpage')
@section('titulo','Catálogo productos')
@section('estilos')
<style>
.gallery-wrap .img-big-wrap img {
    height: 450px;
    width: auto;
    display: inline-block;
    cursor: zoom-in;
}


.gallery-wrap .img-small-wrap .item-gallery {
    width: 60px;
    height: 60px;
    border: 1px solid #ddd;
    margin: 7px 2px;
    display: inline-block;
    overflow: hidden;
}

.gallery-wrap .img-small-wrap {
    text-align: center;
}
.gallery-wrap .img-small-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 4px;
    cursor: zoom-in;
}
</style>
@endsection
@section('contenido')
<!-- <form action="{{route('tiendas.update',['tienda' => $tienda])}}" method="post">
	@method('PUT')
	@csrf
	<div class="card">
		<div class="row">
			<aside class="col-sm-7">
	<article class="card-body p-5">
		<h3 class="title mb-3">{{$tienda->nombre}}</h3>

	<dl class="item-property">
	<dt>Ubicación</dt>
	<dd><p><input type="text" name="ubicacion" value="{{$tienda->ubicacion}}"> </p></dd>
	</dl>

		<a href="#" class="btn btn-lg btn-success text-uppercase"> Actualizar </a>
		<a href="#" class="btn btn-lg btn-outline-danger text-uppercase"> <i class="fas fa-shopping-cart"></i> Eliminar </a>
	</article> <!-- card-body.// -->
			</aside> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- card.// -->
</form>
<h2>Productos   <!-- Button trigger modal -->
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
    Añadir producto
  </button>
</h2>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <th scope="row">{{$producto->nombre}} </th>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio }}</td>
                <td>
                  {{--Ver catálogo de tienda--}}
                      <a href="./productos/{{$tienda->id}}"><i class="fas fa-book-open"></i></a>
              </td>
                <td>
                    {{--Ver la ficha de tienda--}}
                        <a href="./tiendas/{{$tienda->id}}"><i class="fas fa-eye"></i></a>
                </td>
                <td>
                    {{--Eliminar este comercio--}}
                    <form action="{{route('productos.destroy',['producto' => $producto])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-small btn-primary" ><i class="fas fa-trash"></i> </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form class="row g-3" action="{{route('productos.store')}}" method="post"  enctype="multipart/form-data"  >
    {{csrf_field()}}
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo pruducto</h5>
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



