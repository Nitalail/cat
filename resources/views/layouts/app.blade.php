<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Meow Mart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #ffebcd;
        }
        .btn-primary {
            background-color: #ff4500;
            border-color: #ff4500;
        }
        .btn-secondary {
            background-color: #ff6347;
            border-color: #ff6347;
        }
        .btn-info, .btn-warning, .btn-danger {
            margin-right: 5px;
        }
        .navbar {
            background-color: #ff6347 !important;
            height: 70px; /* Menentukan tinggi navbar */
        }
        .navbar .navbar-brand, .navbar .nav-link {
            color: #fff !important; 
        }
        .navbar .navbar-brand {
            font-size: 24px; /* Menentukan ukuran font untuk brand */
        }
        .navbar .nav-link {
            font-size: 18px; /* Menentukan ukuran font untuk link */
        }
        .navbar-nav .nav-item {
            display: flex;
            align-items: center;
            height: 100%;
        }
        .navbar-brand img {
            height: 230px; /* Menentukan tinggi gambar logo */
            margin-right: 5px; /* Menambahkan jarak antara logo dan teks */
            margin-top: 50px;
        }
        .text-orange {
            color: #ff4500;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="logo">
            Meow Mart
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cats.index') }}">Cats</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        {{-- <a class="dropdown-item" href="{{ route('categories.index') }}">Cat Category</a> --}}
                        <a class="dropdown-item" href="{{ route('aksesoriscategory.index') }}">Cat Category</a>
                        <a class="dropdown-item" href="{{ route('foodscategories.index') }}">Food Category</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    

    <div class="container">
        @yield('content')
    </div>

    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
