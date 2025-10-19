<style>
    .navbar{
        padding: 10px;
        border-radius: 15px;
        margin: 15px;
    }
</style>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard.index') }}">🍔 The Flavor Hub Admin</a>
        <div class="d-flex align-items-center">
            <span class="text-light me-3">Hi, {{ session('admin_name') }}</span>
        </div>
    </div>
</nav>
