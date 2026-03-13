<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Seni</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --gallery-bg: #fcfcfc;
            --art-dark: #1a1a1a;
            --art-gray: #6c757d;
        }

        body {
            background-color: var(--gallery-bg);
            font-family: 'Inter', sans-serif;
            color: var(--art-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1,
        h2,
        h3,
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .navbar {
            background-color: #fff !important;
            border-bottom: 1px solid #eee;
            padding: 1.5rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .nav-link {
            text-transform: uppercase;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 1px;
            color: var(--art-dark) !important;
            margin: 0 10px;
        }

        .page-header {
            padding: 4rem 0;
            text-align: center;
            border-bottom: 1px solid #eee;
            margin-bottom: 3rem;
        }

        .btn-art {
            background-color: var(--art-dark);
            color: #fff;
            border-radius: 0;
            padding: 10px 25px;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-art:hover {
            background-color: #444;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('galeri.index') }}">GALERI SENI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeri.index') }}">Beranda</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeri.create') }}">Unggah Karya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('likes.index') ? 'active fw-bold' : '' }}"
                            href="{{ route('likes.index') }}">DISUKAI</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link border-0 bg-transparent">Logout ({{ Auth::user()->username }})</button>
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="text-center">
        <div class="container">
            <p class="small text">Hubungi atmint : admin@mail.com</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>