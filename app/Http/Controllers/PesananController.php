<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Properti;
use App\Support\AuthSession;
use App\Support\PropertiPresenter;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        if (! AuthSession::isPenyewa()) {
            return response()->json(['message' => 'Hanya penyewa yang dapat membuat pesanan.'], 403);
        }

        $validated = $request->validate([
            'properti_id' => ['required', 'integer', 'exists:propertis,id'],
            'message' => ['nullable', 'string'],
            'source' => ['nullable', 'string'],
        ]);

        $properti = Properti::where('status', 'aktif')->findOrFail($validated['properti_id']);

        $durasi = 6;
        $tanggalPesanan = now()->toDateString();
        $tanggalMulai = now()->addMonth()->toDateString();
        $tanggalSelesai = now()->addMonths($durasi + 1)->toDateString();
        $hargaPerBulan = $properti->harga_properti;
        $hargaTotal = $hargaPerBulan * $durasi;

        $pesanan = Pesanan::create([
            'kode_pesanan' => $this->generateKodePesanan(),
            'penyewa_id' => AuthSession::userId(),
            'properti_id' => $properti->id,
            'pemilik_properti_id' => $properti->pemilik_properti_id,
            'tanggal_pesanan' => $tanggalPesanan,
            'tanggal_mulai_sewa' => $tanggalMulai,
            'tanggal_selesai_sewa' => $tanggalSelesai,
            'durasi_bulan' => $durasi,
            'harga_per_bulan' => $hargaPerBulan,
            'harga_total' => $hargaTotal,
            'status' => 'menunggu_konfirmasi',
            'catatan_penyewa' => $validated['message'] ?? null,
        ]);

        $pesanan->load('properti');

        return response()->json([
            'success' => true,
            'order' => $this->formatOrderForFrontend($pesanan, $validated['source'] ?? 'sewa'),
        ]);
    }

    public function index()
    {
        if (! AuthSession::check()) {
            return response()->json([], 401);
        }

        $query = Pesanan::with('properti');

        if (AuthSession::isPenyewa()) {
            $query->where('penyewa_id', AuthSession::userId());
        } elseif (AuthSession::isPemilik()) {
            $query->where('pemilik_properti_id', AuthSession::userId());
        } else {
            return response()->json(['data' => []]);
        }

        $orders = $query->latest('id')->get()->map(function (Pesanan $pesanan) {
            return $this->formatOrderForFrontend($pesanan, 'sewa');
        });

        return response()->json(['data' => $orders]);
    }

    private function generateKodePesanan(): string
    {
        do {
            $kode = 'PSN-'.date('Y').str_pad((string) random_int(1, 9999), 4, '0', STR_PAD_LEFT);
        } while (Pesanan::where('kode_pesanan', $kode)->exists());

        return $kode;
    }

    private function formatOrderForFrontend(Pesanan $pesanan, string $source): array
    {
        $properti = $pesanan->properti;

        return [
            'id' => $pesanan->id,
            'source' => $source,
            'title' => $properti?->nama_properti ?? 'Properti',
            'location' => $properti?->kota ?? '-',
            'price' => (float) $pesanan->harga_per_bulan,
            'image' => $properti ? PropertiPresenter::imageUrl($properti) : \App\Support\AppAssets::property(1),
            'status' => strtoupper(str_replace('_', ' ', $pesanan->status)),
            'duration' => $pesanan->durasi_bulan.' Bulan',
            'time' => $pesanan->durasi_bulan.' bulan',
            'kode' => $pesanan->kode_pesanan,
        ];
    }
}
