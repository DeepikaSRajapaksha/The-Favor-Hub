{{-- ===== Navbar ===== --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        {{-- Logo / Brand --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            🍔 {{ config('app.name') }}
        </a>

        {{-- Mobile toggle button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar links --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="{{ url('/menu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                </li>

                {{-- 🔹 Admin Login Button --}}
                <li class="nav-item ms-lg-3">
                    <a href="{{ url('/admin/login') }}" class="btn btn-warning btn-sm fw-semibold px-3 py-2">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

