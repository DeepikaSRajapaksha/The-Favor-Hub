<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Flavor Hub – Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1600891964091-00bcb7c8b6b3?auto=format&fit=crop&w=1600&q=80') 
                        no-repeat center center/cover;
            min-height: 100vh;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            padding: 2rem;
        }

        .login-header {
            font-weight: 700;
            color: #343a40;
        }

        .btn-login {
            background-color: #ffc107;
            border: none;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: #ffb100;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">

    <div class="login-card text-center" style="max-width: 400px; width: 100%;">
        <h3 class="login-header mb-3">Admin Login</h3>
        <p class="text-muted mb-4">Access The Flavor Hub Dashboard</p>

        {{-- Flash messages --}}
        @if(session('error'))
            <div class="alert alert-danger py-2">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success py-2">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="admin@flavorhub.com">
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn btn-login w-100 py-2">Login</button>
        </form>

        <p class="mt-4 mb-0 text-muted small">&copy; {{ date('Y') }} The Flavor Hub</p>
    </div>

</body>
</html>
