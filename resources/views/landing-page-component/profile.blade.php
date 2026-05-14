<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - ProXperty</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

@include('landing-page-component.navbar')

<section class="profile-page">
    <div class="container">

        <div class="profile-card">
            <div class="profile-top">
                <div class="profile-img-wrap">
                    <img src="{{ asset('storage/images/windah.png') }}" class="profile-img">
                    <button class="camera-btn">
                        <i class="bi bi-camera-fill"></i>
                    </button>
                </div>

                <h2>{{ session('name', 'Akun') }}</h2>
                <p>{{ session('email', 'user@gmail.com') }}</p>
            </div>

            <div class="profile-menu">
                <div class="profile-menu-item" id="profileBtn" onclick="showProfile()">
                    <i class="bi bi-person-fill"></i>
                    <span>Profil Saya</span>
                </div>

                <div class="profile-menu-item" id="ordersBtn" onclick="showOrders()">
                    <i class="bi bi-bag-check-fill"></i>
                    <span>Pesanan Saya</span>
                </div>

                <h6>MANAJEMEN PROPERTI</h6>

                <div class="profile-menu-item" id="listingBtn" onclick="setTab('listing')">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Listing Saya</span>
                </div>

                <div class="profile-menu-item" id="inboxBtn" onclick="setTab('inbox')">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Kotak Masuk</span>
                </div>
            </div>
        </div>

       <div class="content-wrapper">

            <!-- PROFIL SAYA -->
            <div id="profileContent" class="content-section">
                <div class="profile-detail-card">
                    <h1>Profil Saya</h1>
                    <p class="subtitle">Informasi akun Anda</p>

                    <form class="profile-form" action="/update-profile" method="POST" onsubmit="return saveProfile(event)">
                        @csrf

                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{ session('name', '') }}" required>

                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ session('email', '') }}" required>

                        <label>Nomor Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ session('phone', '') }}" required>

                        <button type="submit" class="btn-save-profile">
                            Simpan Perubahan
                        </button>
                    </form>

                </div>
            </div>

            <!-- PESANAN SAYA -->
            <div id="ordersContent" class="content-section">
                <div class="orders-card">
                    <h1>Pesanan Saya</h1>
                    <p>Klik pada pesanan untuk melihat rincian selengkapnya.</p>

                    <div id="ordersContainer"></div>
                </div>
            </div>

            <div id="orderDetailContent" class="content-section">
                <div class="order-detail-card">

                    <button class="back-btn" onclick="showOrders()">
                        <i class="bi bi-chevron-left"></i> KEMBALI
                    </button>

                    <div class="order-detail-img-box">
                        <span id="orderDetailStatus">AKTIF SEWA</span>
                        <img id="orderDetailImage" src="{{ asset('storage/images/properti 1.png') }}">
                    </div>

                    <h1 id="orderDetailTitle">Apartemen Sudirman</h1>

                    <h5>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span id="orderDetailLocation">Jakarta</span>
                    </h5>

                    <div class="order-detail-spec">
                        <span><i class="ri-hotel-bed-line"></i> 4 Bed</span>
                        <span><i class="ri-bar-chart-box-line"></i> 10×10 m</span>
                        <span><i class="ri-line-chart-line"></i> 1600 m</span>
                    </div>

                    <div class="contract-boxes">
                        <div class="contract-box light">
                            <h6>DURASI KONTRAK</h6>
                            <p><i class="bi bi-calendar-fill"></i> <span id="orderDetailDuration">12 Bulan</span></p>
                        </div>

                        <div class="contract-box dark">
                            <h6>SISA WAKTU</h6>
                            <p><i class="bi bi-clock"></i> <span id="orderDetailTime">255 Hari</span></p>
                        </div>
                    </div>

                    <div class="cost-title">
                        <i class="bi bi-credit-card-fill"></i>
                        <span>RINCIAN BIAYA</span>
                    </div>

                    <div class="cost-box">
                        <div class="cost-row">
                            <span>HARGA DASAR</span>
                            <b id="orderDetailPrice1">Rp 18.000.000 / bln</b>
                        </div>

                        <div class="cost-row">
                            <span>PAJAK & POKOK</span>
                            <b class="free">Free</b>
                        </div>

                        <hr>

                        <div class="cost-row total">
                            <span>TOTAL</span>
                            <b id="orderDetailTotal">Rp 18.000.000 / bln</b>
                        </div>
                    </div>

                    <button class="btn-contact-owner" onclick="contactOwner()">
                        HUBUNGI PEMILIK
                    </button>
                </div>
            </div>

           <div id="listingContent" class="content-section">
                <div class="listing-profile-card">
                    <div class="listing-profile-header">
                        <div>
                            <h1>Listing Saya</h1>
                            <p>Aset yang sedang Anda pasarkan saat ini.</p>
                        </div>

                        <button class="btn-add-property" type="button" onclick="openPropertyModal()">
                            <i class="bi bi-plus-lg"></i>
                            PASARKAN PROPERTI
                        </button>
                    </div>

                    <div id="listingContainer"></div>
                </div>
            </div>

            <div id="propertyModalOverlay" class="property-modal-overlay">
                <div class="property-modal">
                    <button class="property-modal-close" type="button" onclick="closePropertyModal()">
                        <i class="bi bi-x-lg"></i>
                    </button>

                    <h1>Pasarkan Properti</h1>
                    <h3 id="modalStepTitle">LANGKAH 1 DARI 3</h3>

                    <div class="modal-progress">
                        <span id="modalProgressBar"></span>
                    </div>

                    <form class="property-modal-form">

                        <!-- STEP 1 -->
                        <div class="modal-step active" id="step1">
                            <p class="modal-section-title">
                                <i class="bi bi-info-circle"></i>
                                INFORMASI DASAR
                            </p>

                            <label>Judul Listing</label>
                            <input type="text" id="listingTitle" placeholder="Contoh: Rumah Minimalis Tembalang">

                            <div class="modal-row">
                                <div>
                                    <label>Tipe Properti</label>
                                    <input type="text" id="propertyType">
                                </div>

                                <div>
                                    <label>Status</label>
                                    <input type="text" id="propertyStatus">
                                </div>
                            </div>

                            <p class="modal-section-title">
                                <i class="bi bi-arrows-angle-expand"></i>
                                SPESIFIKASI
                            </p>

                            <div class="modal-spec-row">
                                <div>
                                    <label><i class="ri-hotel-bed-line"></i> Kamar Tidur</label>
                                    <input type="number" id="bedroom" placeholder="0">
                                </div>

                                <div>
                                    <label><i class="bi bi-cup-hot-fill"></i> Kamar Mandi</label>
                                    <input type="number" id="bathroom" placeholder="0">
                                </div>

                                <div>
                                    <label><i class="bi bi-arrows-angle-expand"></i> Luas (m²)</label>
                                    <input type="number" id="area" placeholder="0">
                                </div>
                            </div>

                            <button type="button" class="btn-modal-next" onclick="goToStep(2)">
                                LANJUTKAN
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>

                        <!-- STEP 2 -->
                        <div class="modal-step" id="step2">
                            <p class="modal-section-title">
                                <i class="bi bi-geo-alt-fill"></i>
                                LOKASI PROPERTI
                            </p>

                            <label>Alamat</label>
                            <input type="text" id="propertyAddress" placeholder="Masukkan alamat">

                            <input type="text" id="propertyCity" class="city-input" placeholder="Kota">

                            <p class="modal-section-title">
                                <i class="bi bi-camera-fill"></i>
                                MEDIA & FOTO
                            </p>

                            <div class="upload-box">
                                <div class="upload-icon">
                                    <i class="bi bi-upload"></i>
                                </div>
                                <h4>Klik Foto ke Sini</h4>
                            </div>

                            <div class="modal-actions">
                                <button type="button" class="btn-modal-prev" onclick="goToStep(1)">
                                    SEBELUMNYA
                                </button>

                                <button type="button" class="btn-modal-next" onclick="goToStep(3)">
                                    LANJUTKAN
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div class="modal-step" id="step3">
                            <p class="modal-section-title">
                                <i class="bi bi-geo-alt-fill"></i>
                                HARGA & PENAWARAN
                            </p>

                            <label>Harga Jual/Sewa (RP)</label>
                            <div class="price-modal-input">
                                <span>Rp</span>
                                <input type="number" id="propertyPrice" placeholder="0">
                            </div>

                            <div class="verification-box">
                                <i class="bi bi-shield-check"></i>

                                <div>
                                    <h4>Verifikasi Listing</h4>
                                    <p>
                                        Dengan menekan tombol "Publikasi", Anda menyatakan bahwa data yang diisi adalah benar
                                        dan Anda memiliki hak hukum atas properti ini.
                                    </p>
                                </div>
                            </div>

                            <div class="modal-actions">
                                <button type="button" class="btn-modal-prev" onclick="goToStep(2)">
                                    SEBELUMNYA
                                </button>

                               <button type="button" class="btn-modal-next" onclick="publishProperty()">
                                    PUBLIKASI
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div id="inboxContent" class="content-section">
                <div class="inbox-card">
                    <div class="inbox-header">
                        <div>
                            <h1>Kotak Masuk</h1>
                            <p>Kelola semua percakapan properti Anda.</p>
                        </div>

                        <div class="inbox-tabs">
                            <button id="pesanMasukBtn" type="button" onclick="showInboxTab('masuk')">
                                PESAN MASUK
                            </button>

                            <button id="pesanSayaBtn" type="button" onclick="showInboxTab('saya')">
                                PESAN SAYA
                            </button>
                        </div>
                    </div>

                    <div id="pesanMasukContent" class="inbox-tab-content">
                        <div class="chat-list" id="inboxIncomingList"></div>
                    </div>

                    <div id="pesanSayaContent" class="inbox-tab-content">
                        <div class="chat-list" id="inboxSentList"></div>
                    </div>
                </div>
            </div>

            <div id="chatDetailContent" class="content-section">
                <div class="chat-detail-card">
                    <div class="chat-detail-header">
                        <button type="button" onclick="backToInbox()" class="chat-back-btn">
                            <i class="bi bi-chevron-left"></i>
                        </button>

                        <div>
                            <h1 id="chatName">Nama Chat</h1>
                            <p id="chatRoleLabel">Detail percakapan</p>
                        </div>
                    </div>

                    <div class="chat-body" id="chatBody"></div>

                    <div class="chat-input-box">
                        <input type="text" id="chatMessageInput" placeholder="Tulis pesan Anda">
                        <button type="button" onclick="sendChatMessage()">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@include('landing-page-component.footer')

<div id="popupOverlay" class="popup-overlay"></div>

<div id="successPopup" class="popup-success">
    Profil berhasil diperbarui!
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   
@endif

<script>
function setTab(tab) {
    const tabs = ['profile', 'orders', 'listing', 'inbox', 'orderDetail', 'chatDetail'];

    tabs.forEach(item => {
        document.getElementById(item + 'Content')?.classList.remove('active');
        document.getElementById(item + 'Btn')?.classList.remove('active');
    });

    document.getElementById(tab + 'Content')?.classList.add('active');

    if (tab === 'orderDetail') {
        document.getElementById('ordersBtn')?.classList.add('active');
        localStorage.setItem('activeTab', 'orders');
    } else {
        document.getElementById(tab + 'Btn')?.classList.add('active');
        localStorage.setItem('activeTab', tab);
    }
}

function showProfile() { setTab('profile'); }
function showOrders() { setTab('orders'); }

let currentOrder = null;

const orderData = {
    sewa: {
        title: 'Apartemen Sudirman',
        location: 'Jakarta',
        status: 'AKTIF SEWA',
        image: "{{ asset('storage/images/properti 1.png') }}",
        duration: '12 Bulan',
        time: '255 Hari',
        price: 'Rp 18.000.000 / bln',
        ownerName: 'Pemilik Apartemen Sudirman',
        message: 'Halo kak, saya ingin bertanya tentang Apartemen Sudirman yang saya sewa.'
    },
    beli: {
        title: 'Villa Greenlake',
        location: 'Bandung',
        status: 'AKTIF BELI',
        image: "{{ asset('storage/images/properti 3.png') }}",
        duration: 'Permanen',
        time: 'Permanen',
        price: 'Rp 1.200.000.000',
        ownerName: 'Pemilik Villa Greenlake',
        message: 'Halo kak, saya ingin bertanya tentang Villa Greenlake yang saya beli.'
    }
};

function showOrderDetail(type) {
    const order = orderData[type];
    currentOrder = order;

    document.getElementById('orderDetailStatus').innerText = order.status;
    document.getElementById('orderDetailImage').src = order.image;
    document.getElementById('orderDetailTitle').innerText = order.title;
    document.getElementById('orderDetailLocation').innerText = order.location;
    document.getElementById('orderDetailDuration').innerText = order.duration;
    document.getElementById('orderDetailTime').innerText = order.time;
    document.getElementById('orderDetailPrice1').innerText = order.price;
    document.getElementById('orderDetailTotal').innerText = order.price;

    setTab('orderDetail');
}

function contactOwner() {
    if (!currentOrder) return;

    const chats = getChats();

    const newChat = {
        id: 'sent-' + Date.now(),
        type: 'saya', 
        name: currentOrder.ownerName,
        role: 'Saya sebagai pembeli/penyewa',
        image: currentOrder.image,
        unread: false,
        messages: [
            {
                from: 'me',
                text: currentOrder.message
            }
        ]
    };

    chats.unshift(newChat);
    saveChats(chats);
    renderChatLists();

    activeChatId = newChat.id;
    activeInboxType = 'saya';

    document.getElementById('chatName').innerText = newChat.name;
    document.getElementById('chatRoleLabel').innerText = newChat.role;

    renderChatMessages(newChat);

    setTab('chatDetail');
    showInboxTab('saya');

        setTimeout(() => {
        chat.messages.push({
            from: 'other',
            text: 'Baik kak, saya cek dulu ya 😊'
        });

        saveChats(chats);
        renderChatMessages(chat);
        renderChatLists();
    }, 1000);
}


function openPropertyModal() {
    document.getElementById('propertyModalOverlay')?.classList.add('show');
    goToStep(localStorage.getItem('propertyModalStep') || 1);
}

function closePropertyModal() {
    document.getElementById('propertyModalOverlay')?.classList.remove('show');
    localStorage.removeItem('propertyModalStep');
    localStorage.removeItem('editIndex');
    document.querySelector('.property-modal-form')?.reset();
}

function goToStep(step) {
    document.querySelectorAll('.modal-step').forEach(item => item.classList.remove('active'));
    document.getElementById('step' + step)?.classList.add('active');

    document.getElementById('modalStepTitle').innerText = 'LANGKAH ' + step + ' DARI 3';
    document.getElementById('modalProgressBar').style.width = step == 1 ? '35%' : step == 2 ? '70%' : '100%';

    localStorage.setItem('propertyModalStep', step);
}

function getListings() {
    return JSON.parse(localStorage.getItem('listings')) || [];
}

function saveListings(listings) {
    localStorage.setItem('listings', JSON.stringify(listings));
}

function renderListings() {
    const container = document.getElementById('listingContainer');
    const listings = getListings();

    if (!container) return;

    if (listings.length === 0) {
        container.innerHTML = "<p style='font-weight:700;color:#777;'>Belum ada listing</p>";
        return;
    }

    container.innerHTML = listings.map((item, index) => `
        <div class="listing-item">
            <div class="listing-img-box">
                <span>AKTIF</span>
                <img src="${item.image}">
            </div>

            <div class="listing-info">
                <h3>${item.title}</h3>
                <h5><i class="bi bi-geo-alt-fill"></i> ${item.city}</h5>

                <div class="listing-spec">
                    <span>${item.bedroom} Bed</span>
                    <span>${item.bathroom} Bath</span>
                    <span>${item.area} m²</span>
                </div>

                <h4>Rp ${Number(item.price).toLocaleString('id-ID')}</h4>
            </div>

            <div class="listing-actions">
                <button type="button" class="edit-btn" onclick="editListing(${index})">
                    <i class="bi bi-pencil-fill"></i>
                </button>

                <button type="button" class="delete-btn" onclick="deleteListing(${index})">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `).join('');
}

function publishProperty() {
    const title = document.getElementById('listingTitle').value.trim();
    const city = document.getElementById('propertyCity').value.trim();
    const bedroom = document.getElementById('bedroom').value || 0;
    const bathroom = document.getElementById('bathroom').value || 0;
    const area = document.getElementById('area').value || 0;
    const price = document.getElementById('propertyPrice').value || 0;

    if (!title || !city || price <= 0) {
        alert('Isi judul, kota, dan harga dulu ya!');
        return;
    }

    const listings = getListings();
    const editIndex = localStorage.getItem('editIndex');

    const newData = {
        title,
        city,
        bedroom,
        bathroom,
        area,
        price,
        image: "{{ asset('storage/images/properti 3.png') }}"
    };

    if (editIndex !== null) {
        listings[editIndex] = newData;
        localStorage.removeItem('editIndex');
    } else {
        listings.unshift(newData);
    }

    saveListings(listings);
    renderListings();

    document.querySelector('.property-modal-form')?.reset();
    closePropertyModal();
    setTab('listing');
}

function deleteListing(index) {
    if (!confirm('Yakin mau hapus listing ini?')) return;

    const listings = getListings();
    listings.splice(index, 1);
    saveListings(listings);
    renderListings();
}

function editListing(index) {
    const listings = getListings();
    const item = listings[index];

    document.getElementById('listingTitle').value = item.title;
    document.getElementById('propertyCity').value = item.city;
    document.getElementById('bedroom').value = item.bedroom;
    document.getElementById('bathroom').value = item.bathroom;
    document.getElementById('area').value = item.area;
    document.getElementById('propertyPrice').value = item.price;

    localStorage.setItem('editIndex', index);

    openPropertyModal();
    goToStep(1);

}

function showInboxTab(tab) {
    document.getElementById('pesanMasukBtn')?.classList.remove('active');
    document.getElementById('pesanSayaBtn')?.classList.remove('active');
    document.getElementById('pesanMasukContent')?.classList.remove('active');
    document.getElementById('pesanSayaContent')?.classList.remove('active');

    if (tab === 'masuk') {
        document.getElementById('pesanMasukBtn')?.classList.add('active');
        document.getElementById('pesanMasukContent')?.classList.add('active');
    } else {
        document.getElementById('pesanSayaBtn')?.classList.add('active');
        document.getElementById('pesanSayaContent')?.classList.add('active');
    }

    localStorage.setItem('activeInboxTab', tab);
}

document.addEventListener('DOMContentLoaded', function () {
    let savedTab = localStorage.getItem('activeTab');
    const validTabs = ['profile', 'orders', 'listing', 'inbox'];

    if (!validTabs.includes(savedTab)) savedTab = 'profile';

    setTab(savedTab);
    showInboxTab(localStorage.getItem('activeInboxTab') || 'masuk');
    renderListings();

    document.body.classList.add('tab-ready');

    document.getElementById('propertyModalOverlay')?.addEventListener('click', function(e) {
        if (e.target === this) closePropertyModal();
    });
});

let activeChatId = null;
let activeInboxType = 'masuk';

function getChats() {
    const saved = JSON.parse(localStorage.getItem('proxpertyChats'));

    if (saved) return saved;

    const defaultChats = [
        {
            id: 'incoming-1',
            type: 'masuk',
            name: 'Nadia Putri',
            role: 'Pembeli tertarik pada Rumah Cluster',
            image: "{{ asset('storage/images/properti 3.png') }}",
            unread: true,
            messages: [
                { from: 'other', text: 'Halo kak, apakah Rumah Cluster ini masih tersedia?' },
                { from: 'other', text: 'Saya mau tanya, apakah harga masih bisa nego?' }
            ]
        },
        {
            id: 'incoming-2',
            type: 'masuk',
            name: 'Raka Pratama',
            role: 'Penyewa tertarik pada Apartemen Sudirman',
            image: "{{ asset('storage/images/properti 1.png') }}",
            unread: true,
            messages: [
                { from: 'other', text: 'Halo, apartemennya bisa disewa untuk 12 bulan?' }
            ]
        },
        {
            id: 'sent-1',
            type: 'saya',
            name: 'Pemilik Villa Greenlake',
            role: 'Saya sebagai pembeli/penyewa',
            image: "{{ asset('storage/images/properti 3.png') }}",
            unread: false,
            messages: [
                { from: 'me', text: 'Halo kak, Villa Greenlake masih tersedia?' },
                { from: 'other', text: 'Masih tersedia kak, mau jadwal survei kapan?' }
            ]
        }
    ];

    localStorage.setItem('proxpertyChats', JSON.stringify(defaultChats));
    return defaultChats;
}

function saveChats(chats) {
    localStorage.setItem('proxpertyChats', JSON.stringify(chats));
}

function renderChatLists() {
    const chats = getChats();
    const incoming = document.getElementById('inboxIncomingList');
    const sent = document.getElementById('inboxSentList');

    if (!incoming || !sent) return;

    incoming.innerHTML = chats
        .filter(chat => chat.type === 'masuk')
        .map(chat => chatListItem(chat))
        .join('');

    sent.innerHTML = chats
        .filter(chat => chat.type === 'saya')
        .map(chat => chatListItem(chat))
        .join('');
}

function getProfileOrders() {
    return JSON.parse(localStorage.getItem('profileOrders')) || [];
}

function renderProfileOrders() {
    const container = document.getElementById('ordersContainer');
    if (!container) return;

    const orders = getProfileOrders();

    if (orders.length === 0) {
        container.innerHTML = "<p style='font-weight:700;color:#777;'>Belum ada pesanan.</p>";
        return;
    }

    container.innerHTML = orders.map((order, index) => `
        <div class="order-item" onclick="showDynamicOrderDetail(${index})">
            <div class="order-img-box">
                <span>${order.status}</span>
                <img src="${order.image}">
            </div>

            <div class="order-info">
                <h3>${order.title}</h3>

                <div class="order-time">
                    <i class="bi bi-clock"></i>
                    <span>${order.time}</span>
                </div>

                <h4>
                    Rp ${Number(order.price).toLocaleString('id-ID')}
                    ${order.source === 'sewa' ? '/ bln' : ''}
                </h4>
            </div>
        </div>
    `).join('');
}

function showDynamicOrderDetail(index) {
    const orders = getProfileOrders();
    const order = orders[index];

    currentOrder = {
        title: order.title,
        location: order.location,
        status: order.source === 'sewa' ? 'AKTIF SEWA' : 'AKTIF BELI',
        image: order.image,
        duration: order.duration,
        time: order.time,
        price: `Rp ${Number(order.price).toLocaleString('id-ID')}${order.source === 'sewa' ? ' / bln' : ''}`,
        ownerName: order.source === 'sewa' ? `Pemilik ${order.title}` : `Penjual ${order.title}`,
        message: `Halo kak, saya ingin bertanya tentang ${order.title}.`
    };

    document.getElementById('orderDetailStatus').innerText = currentOrder.status;
    document.getElementById('orderDetailImage').src = currentOrder.image;
    document.getElementById('orderDetailTitle').innerText = currentOrder.title;
    document.getElementById('orderDetailLocation').innerText = currentOrder.location;
    document.getElementById('orderDetailDuration').innerText = currentOrder.duration;
    document.getElementById('orderDetailTime').innerText = currentOrder.time;
    document.getElementById('orderDetailPrice1').innerText = currentOrder.price;
    document.getElementById('orderDetailTotal').innerText = currentOrder.price;

    setTab('orderDetail');
}

function chatListItem(chat) {
    const lastMessage = chat.messages[chat.messages.length - 1]?.text || '';

    return `
        <div class="chat-item ${chat.unread ? 'unread' : ''}">
            <img src="${chat.image}">

            <div onclick="openChatDetail('${chat.id}')" style="flex:1;">
                <h3>${chat.name}</h3>
                <p>${lastMessage}</p>
                <small>${chat.role}</small>
            </div>

            <button class="delete-chat-btn" onclick="deleteChat('${chat.id}')">
                <i class="bi bi-trash"></i>
            </button>
        </div>
    `;
}

function openChatDetail(chatId) {
    const chats = getChats();
    const chat = chats.find(item => item.id === chatId);

    if (!chat) return;

    activeChatId = chatId;
    activeInboxType = chat.type;

    chat.unread = false;
    saveChats(chats);
    renderChatLists();

    document.getElementById('chatName').innerText = chat.name;
    document.getElementById('chatRoleLabel').innerText = chat.role;

    renderChatMessages(chat);

    setTab('chatDetail');
}

function renderChatMessages(chat) {
    const body = document.getElementById('chatBody');

    body.innerHTML = chat.messages.map(message => `
        <div class="bubble ${message.from === 'me' ? 'sent' : 'received'}">
            ${message.text}
        </div>
    `).join('');

    body.scrollTop = body.scrollHeight;
}

function sendChatMessage() {
    const input = document.getElementById('chatMessageInput');
    const text = input.value.trim();

    if (!text || !activeChatId) return;

    const chats = getChats();
    const chat = chats.find(item => item.id === activeChatId);

    chat.messages.push({
        from: 'me',
        text: text
    });

    saveChats(chats);
    input.value = '';

    renderChatMessages(chat);
    renderChatLists();
}

function deleteChat(chatId) {
    if (!confirm('Hapus percakapan ini?')) return;

    let chats = getChats();

    chats = chats.filter(chat => chat.id !== chatId);

    saveChats(chats);
    renderChatLists();

    // kalau lagi buka chat itu → balik ke inbox
    if (activeChatId === chatId) {
        backToInbox();
    }
}

function backToInbox() {
    setTab('inbox');
    showInboxTab(activeInboxType || 'masuk');
}

document.addEventListener('DOMContentLoaded', function () {
    let savedTab = localStorage.getItem('activeTab');
    const validTabs = ['profile', 'orders', 'listing', 'inbox'];

    if (!validTabs.includes(savedTab)) savedTab = 'profile';

    setTab(savedTab);
    showInboxTab(localStorage.getItem('activeInboxTab') || 'masuk');
    renderListings();
    renderChatLists();
    renderProfileOrders();

    document.body.classList.add('tab-ready');

    document.getElementById('propertyModalOverlay')?.addEventListener('click', function(e) {
        if (e.target === this) closePropertyModal();
    });

    if (localStorage.getItem('showProfilePopup') === 'true') {
    const popup = document.getElementById('successPopup');
    popup.classList.add('show');

    setTimeout(() => {
        popup.classList.remove('show');
    }, 2000);

    localStorage.removeItem('showProfilePopup');
}
});

function saveProfile(e) {
    e.preventDefault();

    localStorage.setItem('showProfilePopup', 'true');

    e.target.submit();
}
</script>

</body>
</html>