<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disewa - ProXperty</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="page-white">

@include('landing-page-component.navbar')

<section class="listing-page">
    <div class="container">

        <div class="search-box listing-search">
            <h6 class="mb-3 fw-bold">Search for available properties</h6>

            <div class="row g-3 align-items-center">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="location-autocomplete">
                        <div class="input-group search-input">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="locationInput" 
                                placeholder="Lokasi"
                                autocomplete="off"
                            >
                            <span class="input-group-text">
                                <i class="bi bi-geo-alt-fill"></i>
                            </span>
                        </div>

                        <div class="location-suggestions" id="locationSuggestions">
                            <div class="location-option">Jakarta</div>
                            <div class="location-option">Semarang</div>
                            <div class="location-option">Bandung</div>
                            <div class="location-option">Surabaya</div>
                            <div class="location-option">Yogyakarta</div>
                            <div class="location-option">Serang</div>
                            <div class="location-option">Malang</div>
                            <div class="location-option">Bogor</div>
                            <div class="location-option">Kediri</div>
                            <div class="location-option">Bekasi</div>
                            <div class="location-option">Magelang</div>
                            <div class="location-option">Tangerang</div>
                            <div class="location-option">Surakarta</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-12">
                    <div class="type-autocomplete">
                        <div class="input-group search-input">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="typeInput" 
                                placeholder="Pilih Tipe"
                                autocomplete="off"
                            >
                            <span class="input-group-text">
                                <i class="bi bi-house-door-fill"></i>
                            </span>
                        </div>

                        <div class="type-suggestions" id="typeSuggestions">
                            <div class="type-option">Rumah</div>
                            <div class="type-option">Apartement</div>
                            <div class="type-option">Villa</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-12">
                    <div class="price-autocomplete">
                        <div class="input-group search-input">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="priceInput" 
                                placeholder="Harga"
                                autocomplete="off"
                            >
                            <span class="input-group-text">
                                <i class="bi bi-coin"></i>
                            </span>
                        </div>

                        <div class="price-suggestions" id="priceSuggestions">
                            <div class="price-option">Rp 50.000.000 </div>
                            <div class="price-option">Rp 100.000.000 </div>
                            <div class="price-option">Rp 150.000.000 </div>
                            <div class="price-option">Rp 200.000.000 </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-12">
                    <button class="btn btn-dark w-100" id="searchBtn">Cari</button>
                </div>
            </div>
        </div>

        <div class="listing-header">
            <h5 class="popular-label">DISEWA</h5>
            <h3>Properti Disewa</h3>
        </div>

            <div class="row g-5">
         @php
        $properties = [
            // SEMARANG
            ['img'=>1,'lokasi'=>'semarang','tipe'=>'rumah','harga'=>150000000],
            ['img'=>2,'lokasi'=>'semarang','tipe'=>'apartement','harga'=>120000000],
            ['img'=>3,'lokasi'=>'semarang','tipe'=>'villa','harga'=>200000000],

            // JAKARTA
            ['img'=>1,'lokasi'=>'jakarta','tipe'=>'rumah','harga'=>180000000],
            ['img'=>2,'lokasi'=>'jakarta','tipe'=>'apartement','harga'=>100000000],
            ['img'=>3,'lokasi'=>'jakarta','tipe'=>'villa','harga'=>220000000],

            // BANDUNG
            ['img'=>1,'lokasi'=>'bandung','tipe'=>'rumah','harga'=>140000000],
            ['img'=>2,'lokasi'=>'bandung','tipe'=>'apartement','harga'=>110000000],
            ['img'=>3,'lokasi'=>'bandung','tipe'=>'villa','harga'=>190000000],

            // SURABAYA
            ['img'=>1,'lokasi'=>'surabaya','tipe'=>'rumah','harga'=>160000000],
            ['img'=>2,'lokasi'=>'surabaya','tipe'=>'apartement','harga'=>130000000],
            ['img'=>3,'lokasi'=>'surabaya','tipe'=>'villa','harga'=>210000000],

            // YOGYAKARTA
            ['img'=>1,'lokasi'=>'yogyakarta','tipe'=>'rumah','harga'=>130000000],
            ['img'=>2,'lokasi'=>'yogyakarta','tipe'=>'apartement','harga'=>90000000],
            ['img'=>3,'lokasi'=>'yogyakarta','tipe'=>'villa','harga'=>170000000],

            // BOGOR
            ['img'=>1,'lokasi'=>'bogor','tipe'=>'rumah','harga'=>125000000],
            ['img'=>2,'lokasi'=>'bogor','tipe'=>'apartement','harga'=>95000000],
            ['img'=>3,'lokasi'=>'bogor','tipe'=>'villa','harga'=>180000000],

            // BEKASI
            ['img'=>1,'lokasi'=>'bekasi','tipe'=>'rumah','harga'=>135000000],
            ['img'=>2,'lokasi'=>'bekasi','tipe'=>'apartement','harga'=>105000000],
            ['img'=>3,'lokasi'=>'bekasi','tipe'=>'villa','harga'=>175000000],

            // TANGERANG
            ['img'=>1,'lokasi'=>'tangerang','tipe'=>'rumah','harga'=>145000000],
            ['img'=>2,'lokasi'=>'tangerang','tipe'=>'apartement','harga'=>115000000],
            ['img'=>3,'lokasi'=>'tangerang','tipe'=>'villa','harga'=>185000000],

            // MALANG
            ['img'=>1,'lokasi'=>'malang','tipe'=>'rumah','harga'=>120000000],
            ['img'=>2,'lokasi'=>'malang','tipe'=>'apartement','harga'=>85000000],
            ['img'=>3,'lokasi'=>'malang','tipe'=>'villa','harga'=>165000000],
        ];
        @endphp

                <div class="row g-5">
                @foreach ($properties as $item)
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="card-property listing-card property-card"
                        data-lokasi="{{ $item['lokasi'] }}"
                        data-tipe="{{ $item['tipe'] }}"
                        data-harga="{{ $item['harga'] }}">

                        <div class="card-img">
                            <img src="{{ asset('storage/images/properti '.$item['img'].'.png') }}">
                        </div>

                        <div class="card-content">
                            <h5 class="lokasi">
                                <i class="bi bi-geo-alt-fill"></i>
                                {{ ucfirst($item['lokasi']) }}
                            </h5>

                            <p class="tipe-text">{{ ucfirst($item['tipe']) }}</p>

                            <div class="info">
                                <span><i class="ri-hotel-bed-line"></i> 4 Bed</span>
                                <span><i class="ri-bar-chart-box-line"></i> 10x10 m</span>
                                <span><i class="ri-line-chart-line"></i> 1600 m</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                               <a href="/pesan?source=sewa&tipe=Apartemen Sudirman&lokasi=Jakarta&harga=18000000&img=1" class="btn">
                                    Pesan
                                </a>
                                <b class="price">
                                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                </b>
                            </div>
                        </div>

                    </div>

                </div>
                @endforeach
                </div>           

            <p id="noResult" style="display:none; text-align:center; font-weight:700; margin-top:30px;">
                Properti tidak ditemukan.
            </p>
    </div>
</section>

@include('landing-page-component.footer')

<script>
    const locationInput = document.getElementById('locationInput');
    const locationSuggestions = document.getElementById('locationSuggestions');
    const locationOptions = document.querySelectorAll('.location-option');

    locationInput.addEventListener('input', function () {
        const value = this.value.toLowerCase().trim();

        if (value === '') {
            locationSuggestions.classList.remove('show');
            return;
        }

        let hasResult = false;

        locationOptions.forEach(option => {
            const text = option.innerText.toLowerCase();

            if (text.includes(value)) {
                option.style.display = 'block';
                hasResult = true;
            } else {
                option.style.display = 'none';
            }
        });

        locationSuggestions.classList.toggle('show', hasResult);
    });

    locationOptions.forEach(option => {
        option.addEventListener('click', function () {
            locationInput.value = this.innerText;
            locationSuggestions.classList.remove('show');
        });
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.location-autocomplete')) {
            locationSuggestions.classList.remove('show');
        }
    });
</script>

<script>
    const typeInput = document.getElementById('typeInput');
    const typeSuggestions = document.getElementById('typeSuggestions');
    const typeOptions = document.querySelectorAll('.type-option');

    typeInput.addEventListener('input', function () {
        const value = this.value.toLowerCase().trim();

        if (value === '') {
            typeSuggestions.classList.remove('show');
            return;
        }

        let hasResult = false;

        typeOptions.forEach(option => {
            const text = option.innerText.toLowerCase();

            if (text.includes(value)) {
                option.style.display = 'block';
                hasResult = true;
            } else {
                option.style.display = 'none';
            }
        });

        typeSuggestions.classList.toggle('show', hasResult);
    });

    typeOptions.forEach(option => {
        option.addEventListener('click', function () {
            typeInput.value = this.innerText;
            typeSuggestions.classList.remove('show');
        });
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.type-autocomplete')) {
            typeSuggestions.classList.remove('show');
        }
    });
</script>

<script>
    const priceInput = document.getElementById('priceInput');
    const priceSuggestions = document.getElementById('priceSuggestions');
    const priceOptions = document.querySelectorAll('.price-option');

    priceInput.addEventListener('input', function () {
        const value = this.value.toLowerCase().trim();

        if (value === '') {
            priceSuggestions.classList.remove('show');
            return;
        }

        let hasResult = false;

        priceOptions.forEach(option => {
            const text = option.innerText.toLowerCase();

            if (text.includes(value)) {
                option.style.display = 'block';
                hasResult = true;
            } else {
                option.style.display = 'none';
            }
        });

        priceSuggestions.classList.toggle('show', hasResult);
    });

    priceOptions.forEach(option => {
        option.addEventListener('click', function () {
            priceInput.value = this.innerText;
            priceSuggestions.classList.remove('show');
        });
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.price-autocomplete')) {
            priceSuggestions.classList.remove('show');
        }
    });
</script>

<script>
    function filterProperty() {
        const lokasi = document.getElementById('locationInput').value.toLowerCase().trim();
        const tipe = document.getElementById('typeInput').value.toLowerCase().trim();
        const hargaInput = document.getElementById('priceInput').value.replace(/\D/g, '') * 1000000;

        const cards = document.querySelectorAll('.property-card');
        const noResult = document.getElementById('noResult');

        let found = false;

        if (lokasi === '' || tipe === '' || hargaInput === 0) {
            alert('Isi lokasi, tipe, dan harga dulu!');
            return;
        }

        cards.forEach(card => {
            const cardLokasi = card.dataset.lokasi.toLowerCase();
            const cardTipe = card.dataset.tipe.toLowerCase();
            const cardHarga = parseInt(card.dataset.harga);

            if (
                cardLokasi.includes(lokasi) &&
                cardTipe.includes(tipe) &&
                cardHarga <= hargaInput
            ) {
                card.parentElement.style.display = 'block';
                found = true;
            } else {
                card.parentElement.style.display = 'none';
            }
        });

        noResult.style.display = found ? 'none' : 'block';
    }

    document.getElementById('searchBtn').addEventListener('click', filterProperty);
</script>

<script>
    const inputs = [
        document.getElementById('locationInput'),
        document.getElementById('typeInput'),
        document.getElementById('priceInput')
    ];

    // 👉 klik → langsung select semua
    inputs.forEach(input => {
        input.addEventListener('focus', function () {
            this.select();
        });
    });
</script>

</body>
</html>