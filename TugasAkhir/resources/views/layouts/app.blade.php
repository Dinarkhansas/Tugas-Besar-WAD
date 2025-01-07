<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #4250ef;
        }

        .navbar-nav .nav-link {
            color: white;
            margin-right: 12px;
            margin-left: 12px;
        }

        .navbar-nav .nav-link.active {
            background-color: white;
            border-radius: 6%;
            color: #4250ef;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            border-radius: 6%;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-primary {
            background-color: #4250ef;
        }

        .btn-secondary {
            background-color: #8b42ef;
        }

        .btn-info {
            background-color: #42a6ef;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/linkup-logo-alt-white.png') }}" alt="Logo" style="height: 60px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarNav">
                <ul class="navbar-nav me-auto"> <!-- Menambahkan me-auto untuk memindahkan item ke kiri -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('layanan.index') ? 'active' : '' }}"
                            href="{{ route('layanan.index') }}">Jasa</a>
                    </li>
                </ul>
                <div class="dropdown dropstart ms-auto">
                    @auth
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownProfile"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownProfile">
                            <li><a class="dropdown-item" href="{{ route('pesanan.index') }}">Kelola Pesanan</a></li>
                            <li><a class="dropdown-item" href="{{ route('pembayaran.index') }}">History Pembayaran</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item"
                                        style="border: none; background: none; cursor: pointer;">Logout</button>
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div>
        @yield('content') <!-- Tempat untuk konten halaman -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
