<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyPageController;
use App\Http\Controllers\PropertiController;
use App\Http\Middleware\EnsureAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', [PropertyPageController::class, 'home']);
Route::get('/disewa', [PropertyPageController::class, 'disewa']);
Route::get('/dijual', [PropertyPageController::class, 'dijual']);
Route::get('/about', [PropertyPageController::class, 'about']);

Route::get('/signin', [AuthController::class, 'showSignIn']);
Route::post('/signin', [AuthController::class, 'signIn']);
Route::get('/signup', [AuthController::class, 'showSignUp']);
Route::post('/signup', [AuthController::class, 'signUp']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(EnsureAuthenticated::class)->group(function () {
    Route::get('/pesan', [PropertyPageController::class, 'pesan']);
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::post('/update-profile', [ProfileController::class, 'update']);

    Route::post('/pesanan', [PesananController::class, 'store']);
    Route::get('/api/pesanan', [PesananController::class, 'index']);

    Route::get('/api/properti', [PropertiController::class, 'index']);
    Route::post('/api/properti', [PropertiController::class, 'store']);
    Route::put('/api/properti/{id}', [PropertiController::class, 'update']);
    Route::delete('/api/properti/{id}', [PropertiController::class, 'destroy']);
});
