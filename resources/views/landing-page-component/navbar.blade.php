<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProXperty</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">ProXperty</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-3">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">BERANDA</a></li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dijual') || (request()->is('pesan') && request('status') == 'jual') ? 'active' : '' }}" href="/dijual">
                            DIJUAL
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('disewa') || (request()->is('pesan') && request('status') == 'sewa') ? 'active' : '' }}" href="/disewa">
                            DISEWA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">
                            TENTANG KAMI
                        </a>
                    </li>
                </ul>

                @if(session('login'))
                    <div class="akun-dropdown">
                        <div class="akun-toggle" onclick="toggleAkunMenu()">
                            <i class="bi bi-person-circle"></i>
                            <span>{{ session('name') }}</span>
                        </div>

                        <!-- INI TEMPATNYA -->
                        <div class="akun-menu" id="akunMenu">
                            <a href="{{ url('/profile') }}" onclick="localStorage.removeItem('activeTab'); localStorage.setItem('activeTab', 'profile');">Profile</a>
                            <a href="{{ url('/logout') }}" class="text-danger">Log out</a>
                        </div>

                    </div>
                @else
                    <a href="{{ url('/signin') }}" class="btn btn-custom rounded-3 px-3">Sign In</a>
                @endif

            </div>
        </div>
    </nav>
</header>

<script>
    function toggleAkunMenu() {
        document.getElementById('akunMenu').classList.toggle('show');
    }

    document.addEventListener('click', function(e) {
        const dropdown = document.querySelector('.akun-dropdown');
        const menu = document.getElementById('akunMenu');

        if (!dropdown.contains(e.target)) {
            menu.classList.remove('show');
        }
    });
</script>

</body>
</html>