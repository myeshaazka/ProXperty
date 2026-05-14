<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan - ProXperty</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="page-white">

@include('landing-page-component.navbar')

<section class="pesan-page">
    <div class="container">

        <div class="pesan-heading">
            <h5 class="popular-label">KIRIM PESAN</h5>
            <h2>Konfirmasi Unit & Spesifikasi</h2>
        </div>

        <div class="row align-items-center pesan-detail">
            <div class="col-lg-6">
                <img src="{{ asset('storage/images/properti '.request('img', 1).'.png') }}" class="pesan-img">
            </div>

            <div class="col-lg-6 pesan-info">
                <h1>{{ ucfirst(request('tipe', 'Rumah')) }}</h1>

                <h5>
                    <i class="bi bi-geo-alt-fill"></i>
                    {{ ucfirst(request('lokasi', 'Semarang')) }}
                </h5>

                <div class="pesan-spec">
                    <span><i class="ri-hotel-bed-line"></i> 4 Bed</span>
                    <span><i class="ri-bar-chart-box-line"></i> 10×10 m</span>
                    <span><i class="ri-line-chart-line"></i> 1600 m</span>
                </div>

                <h2 class="pesan-price">
                    Rp {{ number_format(request('harga', 150000000), 0, ',', '.') }}
                </h2>
            </div>
        </div>

        <div class="pesan-form">
            @if(request('status') == 'sewa')
                <h2>Tulis Pesan ke Penyewa</h2>
            @else
                <h2>Tulis Pesan ke Penjual</h2>
            @endif

            <textarea 
                id="messageBox"
                placeholder='Halo, saya tertarik dengan "{{ ucfirst(request('tipe', 'Rumah')) }}" di {{ ucfirst(request('lokasi', 'Semarang')) }} dengan harga Rp {{ number_format(request('harga', 150000000), 0, ',', '.') }}. Unit ini masih tersedia?'></textarea>

            <button class="btn-send" type="button" onclick="submitOrder()">
                KIRIM SEKARANG
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>

    </div>
</section>

@include('landing-page-component.footer')

<script>
    function submitOrder() {
        const params = new URLSearchParams(window.location.search);

        const source = params.get('source') || 'jual';
        const tipe = params.get('tipe') || 'Properti';
        const lokasi = params.get('lokasi') || 'Semarang';
        const harga = params.get('harga') || 0;
        const img = params.get('img') || 1;

        const messageBox = document.getElementById('messageBox');
        const message = messageBox.value.trim() || `Halo, saya tertarik dengan ${tipe} di ${lokasi}.`;

        const image = `/storage/images/properti ${img}.png`;

        const orders = JSON.parse(localStorage.getItem('profileOrders')) || [];

        orders.unshift({
            id: Date.now(),
            source: source,
            title: tipe,
            location: lokasi,
            price: harga,
            image: image,
            status: source === 'sewa' ? 'SEWA' : 'BELI',
            duration: source === 'sewa' ? '12 Bulan' : 'Permanen',
            time: source === 'sewa' ? '365 hari' : 'Permanen'
        });

        localStorage.setItem('profileOrders', JSON.stringify(orders));

        const chats = JSON.parse(localStorage.getItem('proxpertyChats')) || [];

        chats.unshift({
            id: 'sent-' + Date.now(),
            type: 'saya',
            name: source === 'sewa' ? `Pemilik ${tipe}` : `Penjual ${tipe}`,
            role: source === 'sewa'
                ? 'Saya sebagai penyewa'
                : 'Saya sebagai pembeli',
            image: image,
            unread: false,
            messages: [
                {
                    from: 'me',
                    text: message
                }
            ]
        });

        localStorage.setItem('proxpertyChats', JSON.stringify(chats));

        localStorage.setItem('activeTab', 'orders');
        window.location.href = '/profile';
    }
</script>

</body>
</html>