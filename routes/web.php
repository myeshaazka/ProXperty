<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    return view('landing-page-component.index', [
        'isLogin' => $request->session()->get('login', false)
    ]);
});

Route::get('/signin', function (Request $request) {
    if ($request->session()->get('login')) {
        return redirect('/');
    }

    return view('auth.signin');
});

Route::get('/signup', function (Request $request) {
    if ($request->session()->get('login')) {
        return redirect('/');
    }

    return view('auth.signup');
});


Route::get('/do-signup', function (Request $request) {

    $request->session()->put('name', $request->name);
    $request->session()->put('email', $request->email);
    $request->session()->put('phone', $request->phone);
    $request->session()->put('registered', true);

    return redirect('/signin');
});

Route::get('/do-signin', function (Request $request) {

    if (!$request->session()->get('registered')) {
        return redirect('/signup');
    }

    $request->session()->put('login', true);

    return redirect('/');
});

Route::get('/rent', function (Request $request) {
    if (!$request->session()->get('login')) {
        return redirect('/signin');
    }

    return 'Halaman sewa properti';
});

Route::get('/logout', function (Request $request) {
    $request->session()->forget('login');

    return redirect('/');
});


Route::get('/dijual', function (Request $request) {
    return view('landing-page-component.dijual', [
        'isLogin' => $request->session()->get('login', false)
    ]);
});

Route::get('/pesan', function (Request $request) {
    if (!$request->session()->get('login')) {
        return redirect('/signin');
    }

    return view('landing-page-component.pesan');
});

Route::get('/disewa', function (Request $request) {
    return view('landing-page-component.disewa', [
        'isLogin' => $request->session()->get('login', false)
    ]);
});

Route::get('/about', function (Request $request) {
    return view('landing-page-component.about', [
        'isLogin' => $request->session()->get('login', false)
    ]);
});

Route::get('/profile', function (Request $request) {
    if (!$request->session()->get('login')) {
        return redirect('/signin');
    }

    return view('landing-page-component.profile');
});

Route::post('/update-profile', function (Request $request) {
    $request->session()->put('name', $request->name);
    $request->session()->put('email', $request->email);
    $request->session()->put('phone', $request->phone);

    return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
});