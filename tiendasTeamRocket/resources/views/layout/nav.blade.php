<nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Eighth navbar example">
  <div class="container">
    <a class="navbar-brand" href="#">Tiendas Bilbao</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
      @if(!Auth::check())  
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('tiendas.index')}}">Listado comercios</a>
      </li>   -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login')}}">Acceso</a>
      </li>
        @else
        <li class="nav-item">
            {{-- Petición POST (La ruta así lo espera)  --}}
            <a class="nav-link" aria-current="page" href="" 
              onclick="event.preventDefault();
                document.getElementById('logout').submit();" >
              Cerrar Sesion
            </a>
            {{-- Solo usuarios identificados --}}
            <form id="logout" action="{{route('logout')}}" method="POST" style="display:none">
              @csrf
            </form>
          </li>
        @endif
        @if(Auth::check() && Auth::user()->roles->name=='tienda')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false">Comercios</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown07">
              <li><a class="dropdown-item" href="{{route('tiendas.index', ['id'=>Auth::user()->id])}}">Listado comercios</a></li>
            </ul>
            <ul class="dropdown-menu" aria-labelledby="dropdown07">
              <li><a class="dropdown-item" href="{{route('productos.index')}}">Listado productos</a></li>
            </ul>
          </li>
        @endif
       @if(Auth::check() && Auth::user()->roles->name=='admin')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown07">
            <li><a class="dropdown-item" href="{{route('tiendas.index')}}">Listado comercios</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>