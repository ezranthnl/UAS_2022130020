<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Kisah Manis</title>
    <link rel="icon" href="{{ asset('storage/icon.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Set background dengan gambar dan warna */
        body {
            background-image: url('background1.jpg'); /* Ganti dengan path gambar yang kamu inginkan */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333; /* Warna teks default */
        }

        /* Ubah warna navbar */
        nav {
            background-color: #e98b21; /* Hijau Tua */
        }

        /* Styling untuk teks di navbar dan elemen lainnya */
        .navbar-brand, .nav-link {
            color: rgb(255, 255, 255); /* Warna teks navbar */
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #FF851B; /* Warna saat hover navbar */
        }

        /* Styling untuk button */
        .btn-warning {
            background-color: #FF851B; /* Orange */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #FF6300; /* Orange lebih gelap */
        }

        /* Styling untuk form label */
        .form-label {
            color: #FFD700; /* Kuning emas */
        }

        /* Styling untuk input box */
        .form-control {
            background-color: #ffffff00; /* Hijau tua lebih gelap */
            color: #000000;
            border: 1px solid #000000; /* Kuning emas */
        }

        .form-control:focus {
            border-color: #FF851B; /* Orange */
            box-shadow: 0 0 0 0.2rem rgba(255, 133, 27, 0.25);
        }

        /* Styling untuk dropdown */
        .form-select {
            background-color: #ffffff00;
            color: #000000;
            border: 1px solid #000000;
        }

        .form-select:focus {
            border-color: #FF851B;
            box-shadow: 0 0 0 0.2rem rgba(255, 133, 27, 0.25);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">Kopi Kisah Manis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Link Login dan Register di atas -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Isi konten halaman di sini -->
    @yield('content')

    <!-- Skrip Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
