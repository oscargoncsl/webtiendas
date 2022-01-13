{{-- Mensajes de error --}}
@if($errors->any())
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{$error}}
      </div>
    @endforeach
@endif


{{-- Mensajes flash de la sesión --}}
@if (session('mensaje'))
      <div class="alert alert-{{session('tipoMensaje')}}" role="alert">
        {{session('mensaje')}}
      </div>
@endif