<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - The Flavor Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #cdcbcb;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            position: fixed;
            width: 270px;
            height: 100vh;
            background-color: #212529;
            color: white;
            overflow-y: auto;
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
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .btn-primary {
            background-color: #ffc107;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #e0a800;
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
            margin-left: 270px;          
            height: 100vh;
            overflow-y: auto;            
            background-color: #cdcbcb;
            padding: 0;
            box-sizing: border-box;
        }
        .btn-outline-primary i,
        .btn-outline-danger i {
            font-size: 1.1rem;
            vertical-align: middle;
        }

        .btn-outline-primary:hover,
        .btn-outline-danger:hover {
            transform: scale(1.1);
            transition: 0.2s ease;
        }
    </style>
</head>
<body>

    <div class="admin-wrapper">
        {{-- Sidebar --}}
        @include('Partial.admin-sidebar')

        {{-- Scrollable Main Content --}}
        <div class="content">

            @include('Partial.admin-navbar')

            @include('Partial.flash')

            @yield('content')

            <br>
            <br>
            <br>
            @include('Partial.admin-footer')
            
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.flash-container .alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 300);
                }, 4000);
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Select all delete buttons
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    const form = this.closest('form'); // find parent form

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This category will be permanently deleted!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // proceed with form delete
                        }
                    });
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>
