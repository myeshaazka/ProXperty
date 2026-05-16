@php
    use App\Support\PropertiPresenter;
    $imgIndex = PropertiPresenter::imageIndex($properti);
    $tipeLabel = PropertiPresenter::tipeLabel($properti->tipe_properti);
    $pesanSource = $pesanSource ?? 'sewa';
@endphp

<div class="col-lg-4 col-md-6 col-12">
    <div class="card-property listing-card property-card"
        data-lokasi="{{ strtolower($properti->kota) }}"
        data-tipe="{{ strtolower($properti->tipe_properti) }}"
        data-harga="{{ (int) $properti->harga_properti }}">

        <div class="card-img">
            <img src="{{ PropertiPresenter::imageUrl($properti) }}" alt="{{ $properti->nama_properti }}">
        </div>

        <div class="card-content">
            <h5 class="lokasi">
                <i class="bi bi-geo-alt-fill"></i>
                {{ $properti->kota }}{{ $properti->provinsi ? ', '.$properti->provinsi : '' }}
            </h5>

            <p class="tipe-text">{{ $tipeLabel }}</p>
            <h6 class="mb-2">{{ $properti->nama_properti }}</h6>

            <div class="info">
                @if($properti->jumlah_kamar)
                    <span><i class="ri-hotel-bed-line"></i> {{ $properti->jumlah_kamar }} Bed</span>
                @endif
                @if($properti->luas_bangunan)
                    <span><i class="ri-bar-chart-box-line"></i> {{ $properti->luas_bangunan }} m²</span>
                @endif
                @if($properti->luas_tanah)
                    <span><i class="ri-line-chart-line"></i> {{ $properti->luas_tanah }} m²</span>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ url('/pesan') }}?source={{ $pesanSource }}&properti_id={{ $properti->id }}&tipe={{ urlencode($properti->nama_properti) }}&lokasi={{ urlencode($properti->kota) }}&harga={{ (int) $properti->harga_properti }}&img={{ $imgIndex }}" class="btn">
                    Pesan
                </a>
                <b class="price">
                    Rp {{ number_format($properti->harga_properti, 0, ',', '.') }}{{ $pesanSource === 'sewa' ? ' / bln' : '' }}
                </b>
            </div>
        </div>
    </div>
</div>
