<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - The Flavor Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #cdcbcb;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 270px;
            background-color: #212529;
            color: white;
            padding-top: 1rem;
        }
        .sidebar a {
            color: #adb5bd;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #343a40;
            color: #fff;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 4px solid transparent;
        }
        .sidebar .nav-link:hover {
            background-color: #2c2c3c;
            color: #fff;
            border-left: 4px solid #ffc107;
        }
        .sidebar .nav-link.active {
            background-color: #34344a;
            color: #fff;
            border-left: 4px solid #ffc107;
        }
        .sidebar h4 {
            color: #ffc107;
        }
        .content {
            flex-grow: 1;
            padding: 2rem;
        }
        footer {
            background: #212529;
            color: #ccc;
            text-align: center;
            padding: 10px;
        }
        .sidebar .btn-danger {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s;
        }

        .sidebar .btn-danger:hover {
            background-color: #bb2d3b;
        }
        .content {
            margin: 0;
            padding: 0;
            border: none;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <div class="admin-wrapper">
        {{-- Include Sidebar --}}
        @include('Partial.admin-sidebar')

        <div class="content">

            {{-- Include Navbar --}}
            @include('Partial.admin-navbar')

            @yield('content')

            <br>
            
            {{-- Include Footer --}}
            @include('Partial.admin-footer')

        </div>
    </div>


</body>
</html>
