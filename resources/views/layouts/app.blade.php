<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Kasir Pintar')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .nav-link {
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }
        .nav-link:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }
        .nav-link.active {
            background-color: rgba(0, 0, 0, 0.2);
        }
        .table th,
        .table td {
            vertical-align: middle;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .sidebar .nav-link {
            color: #000;
            opacity: 0.8;
            transition: all 0.3s;
            border-radius: 8px;
        }
        .sidebar .nav-link:hover {
            opacity: 1;
            background-color: rgba(0, 0, 0, 0.1);
        }
        .sidebar .nav-link.active {
            background-color: rgba(0, 0, 0, 0.2);
            opacity: 1;
        }
        .sidebar img {
            filter: brightness(0);
        }
    </style>
    @yield('additional_css')
</head>
<body>
    @include('layouts.sidebar')
    
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    @yield('scripts')
</body>
</html> 