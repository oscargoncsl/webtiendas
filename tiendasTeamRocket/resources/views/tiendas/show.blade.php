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
<form action="{{route('tiendas.update',['tienda' => $tienda])}}" >
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
@endsection
