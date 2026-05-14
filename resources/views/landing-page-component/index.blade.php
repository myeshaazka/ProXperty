<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProXperty</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<body>

@include('landing-page-component.navbar')

<!-- HERO -->
<section class="hero-section">
    <div class="container mt-4">
        <div class="row align-items-center">      
           <div class="col-lg-6 d-flex flex-column justify-content-center hero-content">
                <h1>Find A House That Suits You</h1>
                <p>Want to find a home? We are ready to help you find one that suits your lifestyle and needs</p>
                <a href="#" class="btn-getstarted mt-3">Get Started</a>
            </div>

            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <img src="{{ asset('storage/images/headline.png') }}" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- SEARCH BOX -->
<div class="container">
    <div class="search-box">
        
        <h6 class="mb-3 fw-semibold fw-bold">Search for available properties</h6>
        
        <div class="row g-3 align-items-center">
            <div class="col-lg-3 col-md-3 col-12">
                <div class="input-group search-input">
                    <input type="text" class="form-control" placeholder="Lokasi">
                    <span class="input-group-text">
                        <i class="bi bi-geo-alt-fill"></i>
                    </span>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-12">
                <div class="input-group search-input">
                    <input type="text" class="form-control" placeholder="Pilih Tipe">
                    <span class="input-group-text">
                        <i class="bi bi-house-door-fill"></i>
                    </span>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-12">
                <div class="input-group search-input">
                    <input type="text" class="form-control" placeholder="Harga">
                    <span class="input-group-text">
                        <i class="bi bi-coin"></i>
                    </span>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-12">
                <button class="btn btn-dark w-100">Cari</button>
            </div>
        </div>
    </div>
</div>

<!-- POPULAR -->
<section class="popular-section">
    <div class="container">

        <div class="popular-header">
            <div>
                <h5 class="popular-label">POPULAR</h5>
                <h3>Our Popular Properties</h3>
            </div>
            <a href="#" class="explore-all-custom">
                Explore All <span class="line-arrow"></span>
            </a>
        </div>

        <div class="row g-4">

            <!-- CARD 1 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card-property">

                    <div class="card-img">
                        <img src="{{ asset('storage/images/properti 1.png') }}">
                    </div>

                    <div class="card-content">
                        <h5 class="lokasi">
                            <i class="bi bi-geo-alt-fill"></i>
                            Tembalang, Semarang
                        </h5>

                        <div class="info">
                            <span><i class="ri-hotel-bed-line"></i> 4 Bed</span>
                            <span><i class="ri-bar-chart-box-line"></i> 10x10 m</span>
                            <span><i class="ri-line-chart-line"></i> 1600 m</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/rent" class="btn btn-dark btn-sm">Rent Now</a>
                            <b class="price">Rp 180.000.000</b>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card-property">

                    <div class="card-img">
                        <img src="{{ asset('storage/images/properti 2.png') }}">
                    </div>

                    <div class="card-content">
                        <h5 class="lokasi">
                            <i class="bi bi-geo-alt-fill"></i>
                            Tembalang, Semarang
                        </h5>

                        <div class="info">
                            <span><i class="ri-hotel-bed-line"></i> 4 Bed</span>
                            <span><i class="ri-bar-chart-box-line"></i> 10x10 m</span>
                            <span><i class="ri-line-chart-line"></i> 1600 m</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/rent" class="btn btn-dark btn-sm">Rent Now</a>
                            <b class="price">Rp 180.000.000</b>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card-property">

                    <div class="card-img">
                        <img src="{{ asset('storage/images/properti 3.png') }}">
                    </div>

                    <div class="card-content">
                        <h5 class="lokasi">
                            <i class="bi bi-geo-alt-fill"></i>
                            Tembalang, Semarang
                        </h5>

                        <div class="info">
                            <span><i class="ri-hotel-bed-line"></i> 4 Bed</span>
                            <span><i class="ri-bar-chart-box-line"></i> 10x10 m</span>
                            <span><i class="ri-line-chart-line"></i> 1600 m</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/rent" class="btn btn-dark btn-sm">Rent Now</a>
                            <b class="price">Rp 180.000.000</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        
<!-- ABOUT -->
<section class="about">
        <div class="container">
            <div class="row align-items-center">

                <!-- IMAGE -->
                <div class="col-lg-auto mb-4 mb-lg-0">
                    <div class="about-img-box">
                        <img src="{{ asset('storage/images/tentang kami.png') }}" alt="">
                    </div>
                </div>

                <!-- TEXT -->
                <div class="col-lg-5 about-text">
                    <h5 class="about-label">ABOUT US</h5>
                    <h2>Your Property Experts</h2>
                        <p>
                            ProXperty is a digital platform designed to simplify the process of finding,
                            managing, and marketing properties in an efficient and practical way.
                            By combining technology with market needs, ProXperty provides a modern solution
                            for users who want to search for a place to live or promote their properties.
                        </p>
                    </div>
                </div>
            </div> 
        </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container text-center">
        <div class="footer-line"></div>
        <p>© 2026 ProXperty All rights reserved</p>
    </div>
</footer>

<script>
    const akunToggle = document.getElementById('akunToggle');
    const akunMenu = document.getElementById('akunMenu');

    if (akunToggle && akunMenu) {
        akunToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            akunMenu.classList.toggle('show');
        });

        document.addEventListener('click', function() {
            akunMenu.classList.remove('show');
        });
    }
</script>

</body>
</html>
