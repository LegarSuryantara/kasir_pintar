<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Kasir Pintar')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
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
        .order-summary {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .order-item {
            background-color: #ffffff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        .order-item img {
            border-radius: 10px;
        }
        .order-item .item-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-item .item-details .item-name {
            font-weight: bold;
        }
        .order-item .item-details .item-price {
            color: #ff4d4d;
        }
        .order-summary .total {
            font-weight: bold;
            font-size: 1.2em;
        }
        .order-summary .btn-pay {
            background-color: #ffcc00;
            color: #ffffff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .order-summary .btn-cancel {
            background-color: #ffffff;
            color: #ffcc00;
            border: 2px solid #ffcc00;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .add-item-btn {
            background-color: #ffcc00;
            color: #ffffff;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2em;
            margin: 20px auto;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            background-color: #fff;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }
        .product-price {
            color: #e74c3c;
            font-size: 16px;
            font-weight: bold;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .filter-buttons .btn {
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .filter-buttons .btn.active {
            background-color: #007bff;
            color: #fff;
        }
        
    </style>
    @yield('additional_css')
</head>
<body>
    @include('layouts.sidebarKasir')
    
    <div class="main-content">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    @yield('scripts')
</body>
</html> 