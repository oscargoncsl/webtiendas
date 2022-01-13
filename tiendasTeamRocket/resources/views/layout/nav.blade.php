<<<<<<< HEAD
<nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Eighth navbar example">
  <div class="container">
    <a class="navbar-brand" href="#">Tiendas Bilbao</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" href="#">Listado comercios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Acceso</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false">Comercios</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown07">
            <li><a class="dropdown-item" href="#">Ver listado productos</a></li>
            <li><a class="dropdown-item" href="#">Añadir producto</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown07">
            <li><a class="dropdown-item" href="#">Añadir comercio</a></li>
          </ul>
        </li>
      </ul>

=======
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-1">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">TiendasTeamRocket.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Listado</a>
          </li>
          @if(!Auth::check())
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('register')}}">Registro</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" aria-current="page"onclick="event.preventDefault()
            docment.getElementById('logout').submit();">Cerrar Sesion</a>
            <form id="logout" action="{{route('logout')}}" method="POST" style="display:none;"></form>
            @csrf
          </li>
          @endif
          <!-- {{-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li> --}} -->
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
>>>>>>> 72ba2adab80328b9c20bb3b0f442653c19f11547
    </div>
  </div>
</nav>