@extends('layout.masterpage')
@section('titulo','Plotter')
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
<form action="{{route('plotters.update',['plotter' => $plotter])}}" method="post">
	@method('PUT')
	@csrf
	<div class="card">
		<div class="row">
			<aside class="col-sm-5 border-right">
	<article class="gallery-wrap"> 
	<div class="img-big-wrap">
	<div> <a href="#"><img src="../images/plotters/{{$plotter->imagen}}" style="width:100%;"></a></div>
	</div> <!-- slider-product.// -->
	<div class="img-small-wrap">
	<div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
	<div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
	<div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
	<div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
	</div> <!-- slider-nav.// -->
	</article> <!-- gallery-wrap .end// -->
			</aside>
			<aside class="col-sm-7">
	<article class="card-body p-5">
		<h3 class="title mb-3">{{$plotter->nombre}}</h3>

	<p class="price-detail-wrap"> 
		<span class="price h3 text-warning"> 
			<span class="num">{{$plotter->velocidad}}</span>
		</span> 
		<span>mm/hora</span> 
	</p> <!-- price-detail-wrap .// -->
	<dl class="item-property">
	<dt>Descripcion</dt>
	<dd><p><input type="text" name="descripcion" value="{{$plotter->descripcion}}"> </p></dd>
	</dl>
	<dl class="param param-feature">
	<dt>Modelo</dt>
	<dd><input type="text" name="modelo" value="{{$plotter->modelo}}"></dd>
	</dl>  <!-- item-property-hor .// -->
	<dl class="param param-feature">
	<dt>Marca</dt>
	<dd><input type="text" name="marca" value="{{$plotter->marca}}"></dd>
	</dl>  <!-- item-property-hor .// -->


	<hr>
		<div class="row">
			<div class="col-sm-5">
				<dl class="param param-inline">
				<dt>Cantidad: </dt>
				<dd>
					<select class="form-control form-control-sm" style="width:70px;">
						<option> 1 </option>
						<option> 2 </option>
						<option> 3 </option>
					</select>
				</dd>
				</dl>  <!-- item-property .// -->
			</div> <!-- col.// -->
			
		</div> <!-- row.// -->
		<hr>
		<a href="#" class="btn btn-lg btn-success text-uppercase"> Actualizar </a>
		<a href="#" class="btn btn-lg btn-outline-danger text-uppercase"> <i class="fas fa-shopping-cart"></i> Eliminar </a>
	</article> <!-- card-body.// -->
			</aside> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- card.// -->
</form>
@endsection



