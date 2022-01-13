<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-1">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Plotters.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('plotters.index')}}">Listado</a>
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
    </div>
  </nav>
