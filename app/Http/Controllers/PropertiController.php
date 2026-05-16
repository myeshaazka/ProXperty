<?php

namespace App\Http\Controllers;

use App\Models\Properti;
use App\Support\AuthSession;
use App\Support\PropertiPresenter;
use Illuminate\Http\Request;

class PropertiController extends Controller
{
    public function index()
    {
        if (! AuthSession::isPemilik()) {
            return response()->json(['data' => []]);
        }

        $listings = Properti::query()
            ->where('pemilik_properti_id', AuthSession::userId())
            ->latest('id')
            ->get()
            ->map(fn (Properti $p) => $this->formatListing($p));

        return response()->json(['data' => $listings]);
    }

    public function store(Request $request)
    {
        if (! AuthSession::isPemilik()) {
            return response()->json(['message' => 'Hanya pemilik properti yang dapat menambah listing.'], 403);
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'city' => ['required', 'string', 'max:100'],
            'address' => ['nullable', 'string'],
            'type' => ['required', 'string'],
            'bedroom' => ['nullable', 'integer', 'min:0'],
            'bathroom' => ['nullable', 'integer', 'min:0'],
            'area' => ['nullable', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:1'],
        ]);

        $properti = Properti::create([
            'pemilik_properti_id' => AuthSession::userId(),
            'nama_properti' => $validated['title'],
            'tipe_properti' => PropertiPresenter::normalizeTipe($validated['type']),
            'alamat_properti' => $validated['address'] ?? $validated['city'],
            'kota' => $validated['city'],
            'provinsi' => 'Jawa Tengah',
            'harga_properti' => $validated['price'],
            'luas_bangunan' => $validated['area'] ?? null,
            'jumlah_kamar' => $validated['bedroom'] ?? null,
            'deskripsi' => null,
            'fasilitas' => [],
            'status' => 'menunggu_verifikasi',
        ]);

        return response()->json([
            'success' => true,
            'listing' => $this->formatListing($properti),
        ]);
    }

    public function update(Request $request, int $id)
    {
        if (! AuthSession::isPemilik()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $properti = Properti::where('pemilik_properti_id', AuthSession::userId())->findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'city' => ['required', 'string', 'max:100'],
            'address' => ['nullable', 'string'],
            'type' => ['required', 'string'],
            'bedroom' => ['nullable', 'integer', 'min:0'],
            'bathroom' => ['nullable', 'integer', 'min:0'],
            'area' => ['nullable', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:1'],
        ]);

        $properti->update([
            'nama_properti' => $validated['title'],
            'tipe_properti' => PropertiPresenter::normalizeTipe($validated['type']),
            'alamat_properti' => $validated['address'] ?? $validated['city'],
            'kota' => $validated['city'],
            'harga_properti' => $validated['price'],
            'luas_bangunan' => $validated['area'] ?? null,
            'jumlah_kamar' => $validated['bedroom'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'listing' => $this->formatListing($properti->fresh()),
        ]);
    }

    public function destroy(int $id)
    {
        if (! AuthSession::isPemilik()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $properti = Properti::where('pemilik_properti_id', AuthSession::userId())->findOrFail($id);
        $properti->delete();

        return response()->json(['success' => true]);
    }

    private function formatListing(Properti $properti): array
    {
        return [
            'id' => $properti->id,
            'title' => $properti->nama_properti,
            'city' => $properti->kota,
            'type' => $properti->tipe_properti,
            'bedroom' => $properti->jumlah_kamar ?? 0,
            'bathroom' => 0,
            'area' => $properti->luas_bangunan ?? 0,
            'price' => (float) $properti->harga_properti,
            'image' => PropertiPresenter::imageUrl($properti),
            'status' => $properti->status,
        ];
    }
}
