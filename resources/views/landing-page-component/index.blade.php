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

@include('landing-page-component.navbar')

<section class="hero-section">
    <div class="container mt-4">
        <div class="row align-items-center">
           <div class="col-lg-6 d-flex flex-column justify-content-center hero-content">
                <h1>Find A House That Suits You</h1>
                <p>Want to find a home? We are ready to help you find one that suits your lifestyle and needs</p>
                <a href="{{ url('/disewa') }}" class="btn-getstarted mt-3">Get Started</a>
            </div>

            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <img src="{{ \App\Support\AppAssets::headline() }}" class="img-fluid" alt="Hero">
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="search-box">
        <h6 class="mb-3 fw-semibold fw-bold">Search for available properties</h6>
        <div class="row g-3 align-items-center">
            <div class="col-lg-3 col-md-3 col-12">
                <div class="input-group search-input">
                    <input type="text" class="form-control" placeholder="Lokasi">
                    <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="input-group search-input">
                    <input type="text" class="form-control" placeholder="Pilih Tipe">
                    <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="input-group search-input">
                    <input type="text" class="form-control" placeholder="Harga">
                    <span class="input-group-text"><i class="bi bi-coin"></i></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-12">
                <a href="{{ url('/disewa') }}" class="btn btn-dark w-100">Cari</a>
            </div>
        </div>
    </div>
</div>

<section class="popular-section">
    <div class="container">
        <div class="popular-header">
            <div>
                <h5 class="popular-label">POPULAR</h5>
                <h3>Our Popular Properties</h3>
            </div>
            <a href="{{ url('/disewa') }}" class="explore-all-custom">
                Explore All <span class="line-arrow"></span>
            </a>
        </div>

        <div class="row g-4">
            @forelse($properties as $properti)
                @include('partials.property-card', ['properti' => $properti, 'pesanSource' => 'sewa'])
            @empty
                <div class="col-12">
                    <p class="text-center fw-bold">Belum ada properti tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-auto mb-4 mb-lg-0">
                <div class="about-img-box">
                    <img src="{{ \App\Support\AppAssets::about() }}" alt="Tentang Kami">
                </div>
            </div>
            <div class="col-lg-5 about-text">
                <h5 class="about-label">ABOUT US</h5>
                <h2>Your Property Experts</h2>
                <p>
                    ProXperty is a digital platform designed to simplify the process of finding,
                    managing, and marketing properties in an efficient and practical way.
                </p>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container text-center">
        <div class="footer-line"></div>
        <p>© 2026 ProXperty All rights reserved</p>
    </div>
</footer>

</body>
</html>
