<nav class="navbar navbar-expand-lg bg-primary py-1">
  <div class="container-fluid ps-0">
    <div class="d-flex flex-row fw-bold">
      <button id="sidebar-toggle-btn"
              type="button"
              class="btn border-0 text-white"
              data-bs-toggle="collapse"
              data-bs-target="#sidebar"
              aria-expanded="true"
              aria-controls="sidebar">
        <i class="bi bi-list"></i>
      </button>
      <a class="navbar-brand ms-2 {{ config('app.debug') ? 'text-light' : 'text-white' }}" href="{{ route('index') }}">
        O.V.
      </a>
    </div>

    <button id="toggle-color-mode" class="btn text-white btn-sm me-2">
      <i class="bi bi-moon-fill"></i>
    </button>

    <div class="dropdown me-2">
      <button class="btn text-white btn-sm dropdown-toggle py-1 border-0"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false">
      </button>

      <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <button class="dropdown-item">Cerrar sesión</button>
        </li>
      </ul>
    </div>
  </div>
</nav>