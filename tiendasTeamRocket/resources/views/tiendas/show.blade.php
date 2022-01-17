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

<div class="card">
	<div class="row">
		<aside class="col-sm-7">
			<article class="card-body p-5">
				<form action="{{route('tiendas.update',['tienda' => $tienda])}}" method="POST">
					@method('PUT')
					@csrf
					<h3 class="title mb-3">{{$tienda->nombre}}</h3>
					<dl class="item-property">
						<dt>Ubicación</dt>
						<dd><p><input type="text" name="ubicacion" value="{{$tienda->ubicacion}}"> </p></dd>
					</dl>
					<a><input type="submit" class="btn btn-lg btn-success text-uppercase" value="Actualizar"></input></a>
				</form>
				<form action="{{route('tiendas.destroy',['tienda' => $tienda])}}" method="post">
     @method('DELETE')
     @csrf
     <button type="submit" class="btn btn-lg btn-outline-danger text-uppercase" ><i class="fas fa-shopping-cart"></i>Eliminar </button>
    </form>
			</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->
@endsection
