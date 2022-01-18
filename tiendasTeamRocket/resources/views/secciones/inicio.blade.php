@extends('layout.masterpage')
@section('titulo','Iniciooooooo')
@section('contenido')
<h2>Kaixo!!! </h2>
<br>
<p>Bienvenido a la plataforma de comerciantes de Bilbao. En esta web, podrás ver todas las tiendas que tiene tu municipio, consultar los productos que tiene cada comercio y descargarte el catálogo de cada uno. ¡¡¡Ayuda a tus comercios más cercanos!!!</p>

{{-- CARROUSEL  --}}
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('images/img_carrousel/computershop.jpg')}}" class="d-block w-100" alt="tienda ordenadores">
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/img_carrousel/ropa.jpg')}}" class="d-block w-100" alt="tienda ropa">
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/img_carrousel/comida.jpg')}}" class="d-block w-100" alt="tienda comida">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
{{-- END CARROUSEL  --}}


@endsection