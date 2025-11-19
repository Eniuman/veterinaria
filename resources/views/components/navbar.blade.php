<nav class="navbar navbar-expand-lg" style="background-color: #dcdcdc !important;">
  <div class="container-fluid">

    <a class="navbar-brand" href="{{ route('home') }}">VeterinaHD</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto">
        
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            Home
          </a>
        </li>

        @auth
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('usuarios') ? 'active' : '' }}"
              href="{{ route('usuarios') }}">
                Usuarios
            </a>
        </li>
        @endauth

        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm">Cerrar sesión</button>
          </form>
        </li>

      </ul>

    </div>
  </div>
</nav>
