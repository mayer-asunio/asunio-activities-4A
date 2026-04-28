<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student QR System')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #e4ecf3);
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            padding: 14px 0;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .container-main {
            padding: 40px 0;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            transition: 0.3s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 18px;
            font-weight: 600;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            border: none;
        }

        .btn-primary:hover {
            transform: scale(1.03);
        }

        .student-card {
            border-radius: 16px;
            overflow: hidden;
            transition: 0.3s;
            background: white;
        }

        .student-card:hover {
            transform: translateY(-8px);
        }

        .student-image {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .student-info {
            padding: 15px;
        }

        .student-name {
            font-weight: 700;
            font-size: 1.1rem;
            color: #2c3e50;
        }

        .badge {
            border-radius: 20px;
        }

        .footer {
            text-align: center;
            padding: 25px;
            margin-top: 40px;
            background: #2c3e50;
            color: white;
        }
    </style>

    @yield('styles')
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('students.index') }}">
            <i class="bi bi-qr-code"></i> Student QR System
        </a>

        <div class="ms-auto">
            <a href="{{ route('students.index') }}" class="btn btn-light btn-sm">Students</a>
            <a href="{{ route('students.create') }}" class="btn btn-warning btn-sm">Add</a>
        </div>
    </div>
</nav>

<main class="container container-main">
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

<footer class="footer">
    <p>Student QR Code System © 2026</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')

</body>
</html>