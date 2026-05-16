<?php

namespace App\Http\Controllers;

use App\Models\Properti;
use App\Support\AuthSession;
use Illuminate\Http\Request;

class PropertyPageController extends Controller
{
    public function home()
    {
        $properties = Properti::query()
            ->where('status', 'aktif')
            ->latest('id')
            ->limit(3)
            ->get();

        return view('landing-page-component.index', [
            'isLogin' => AuthSession::check(),
            'properties' => $properties,
        ]);
    }

    public function disewa()
    {
        $properties = Properti::query()
            ->where('status', 'aktif')
            ->orderBy('kota')
            ->orderBy('id')
            ->get();

        return view('landing-page-component.disewa', [
            'isLogin' => AuthSession::check(),
            'properties' => $properties,
            'pesanSource' => 'sewa',
        ]);
    }

    public function dijual()
    {
        $properties = Properti::query()
            ->where('status', 'aktif')
            ->orderBy('kota')
            ->orderBy('id')
            ->get();

        return view('landing-page-component.dijual', [
            'isLogin' => AuthSession::check(),
            'properties' => $properties,
            'pesanSource' => 'jual',
        ]);
    }

    public function about(Request $request)
    {
        return view('landing-page-component.about', [
            'isLogin' => AuthSession::check(),
        ]);
    }

    public function pesan(Request $request)
    {
        if (! AuthSession::check()) {
            return redirect('/signin');
        }

        $properti = null;

        if ($request->filled('properti_id')) {
            $properti = Properti::find($request->properti_id);
        }

        return view('landing-page-component.pesan', [
            'properti' => $properti,
        ]);
    }
}
