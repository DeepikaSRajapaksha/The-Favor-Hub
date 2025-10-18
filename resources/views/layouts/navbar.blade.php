<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">🍔 The Flavor Hub</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/menu*') ? 'active' : '' }}" href="{{ route('admin.menu.index') }}">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
