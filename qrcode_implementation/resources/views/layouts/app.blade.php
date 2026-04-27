<!DOCTYPE html>
<html>
<head>
    <title>QR Product System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }

        .qr-box svg {
            width: 90px;
            height: 90px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('products.index') }}">
            📦 QR Product System
        </a>

        <!-- SEARCH -->
        <form class="d-flex" method="GET" action="{{ route('products.index') }}">
            <input class="form-control form-control-sm me-2"
                   type="search"
                   name="search"
                   placeholder="Search product..."
                   value="{{ request('search') }}">

            <button class="btn btn-outline-light btn-sm">Search</button>
        </form>

    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>