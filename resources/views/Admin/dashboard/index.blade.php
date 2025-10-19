<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - The Flavor Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">🍔 Admin Dashboard</span>
        <div class="d-flex">
            <span class="text-white me-3">Hi, {{ session('admin_name') }}</span>
            <a href="" class="btn btn-warning btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container py-5 text-center">
    <h1 class="fw-bold mb-4">Welcome to The Flavor Hub Admin Dashboard</h1>
    <p class="lead">Manage your restaurant menu, reservations, and settings.</p>

    <a href="" class="btn btn-dark mt-3 px-4">Go to Menu Management</a>
</div>

</body>
</html>
