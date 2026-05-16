<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - ProXperty</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="about-page-body">

@include('landing-page-component.navbar')

<section class="about-full-page">

    <div class="container">

        <div class="about-main row align-items-center">
            <div class="col-lg-4">
                <div class="about-full-img">
                    <img src="{{ \App\Support\AppAssets::about() }}" alt="Tentang Kami">
                </div>
            </div>

            <div class="col-lg-7">
                <h5 class="about-full-label">TENTANG KAMI</h5>
                <h1>Your Property Experts</h1>

                <p>
                    ProXperty is a digital platform designed to simplify the process of
                    finding, managing, and marketing properties in an efficient and
                    practical way. By combining technology with market needs,
                    ProXperty provides a modern solution for users who want to search
                    for a place to live or promote their properties.
                </p>
            </div>
        </div>

        <div class="why-area">
            <h2>Kenapa ProXperty</h2>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="ri-shake-hands-line"></i>
                        </div>
                        <h4>Beli Properti Aman</h4>
                        <p>
                            ProXperty sebagai situs properti terpercaya siap membantu
                            menemukan hunian idaman Anda.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="ri-time-line"></i>
                        </div>
                        <h4>Jual Properti Cepat</h4>
                        <p>
                            Jual properti lebih mudah dan cepat dengan fitur dan layanan
                            terbaik ProXperty.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="ri-medal-line"></i>
                        </div>
                        <h4>Mitra Properti Terbaik</h4>
                        <p>
                            ProXperty adalah situs properti terbesar dan terpercaya yang
                            telah melayani jutaan masyarakat Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimoni-area">
            <h5 class="about-full-label">TESTIMONI</h5>
            <h2>Kata Mereka Tentang ProXperty</h2>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="testimoni-card">
                        <img src="{{ \App\Support\AppAssets::avatar() }}" class="testimoni-img" alt="User">

                        <i class="bi bi-quote quote-icon"></i>

                        <h4>Windah Basudara</h4>
                        <span>Klien</span>

                        <p>
                            “W ProXperty... 
                            Terima kasih ProXperty sudah menyediakan foto yg tukei.
                            Interfacenya gampang dipahami tinggal scroll-scroll, langsung keluar banyak
                            pilihan properti, lengkap banget lagi detailnya! Mulai dari harga, lokasi,
                            sampai spesifikasinya, semua ada!”
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="testimoni-card">
                        <img src="{{ \App\Support\AppAssets::avatar() }}" class="testimoni-img" alt="User">

                        <i class="bi bi-quote quote-icon"></i>

                        <h4>Kim Juhoon</h4>
                        <span>Klien</span>

                        <p>
                            "Sebagai pembeli, saya merasa ProXperty sangat membantu dalam mencari
                            properti yang sesuai kebutuhan. Informasi listing yang ditampilkan cukup
                            lengkap sehingga saya bisa menilai lokasi, harga, dan spesifikasi rumah
                            dengan lebih mudah."
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

@include('landing-page-component.footer')

</body>
</html>