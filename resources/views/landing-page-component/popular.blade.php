<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>