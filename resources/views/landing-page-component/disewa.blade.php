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

            <div class="row g-5" id="propertyGrid">
                @foreach ($properties as $properti)
                    @include('partials.property-card', ['properti' => $properti, 'pesanSource' => 'sewa'])
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