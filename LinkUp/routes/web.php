<?php

use App\Models\Pemesanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyediaLayananController;
use App\Http\Controllers\PemesananController;

// Redirect root URL to home
Route::get('/', function () {
    return redirect(route('home'));
});

// Home route
Route::get('/home', function () {
    return view('home');
})->name('home');

// Routes for Penyedia Layanan
Route::prefix('penyediaLayanan')->name('penyediaLayanan.')->group(function () {
    Route::get('/', [PenyediaLayananController::class, 'index'])->name('index');
    Route::get('/create', [PenyediaLayananController::class, 'create'])->name('create');
    Route::post('/', [PenyediaLayananController::class, 'store'])->name('store');
    Route::get('/{id}', [PenyediaLayananController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PenyediaLayananController::class, 'edit'])->name('edit');
    Route::put('/{penyediaLayanan}', [PenyediaLayananController::class, 'update'])->name('update');
    Route::delete('/{penyediaLayanan}', [PenyediaLayananController::class, 'destroy'])->name('destroy');
});


// Routes for Pemesanan
Route::prefix('pemesanans')->name('pemesanans.')->group(function () {
    Route::get('/', [PemesananController::class, 'index'])->name('index');
    Route::get('/create', [PemesananController::class, 'create'])->name('create');
    Route::post('/', [PemesananController::class, 'store'])->name('store');
    Route::get('/{id}', [PemesananController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PemesananController::class, 'edit'])->name('edit');
    Route::put('/{pemesanan}', [PemesananController::class, 'update'])->name('update');
    Route::delete('/{pemesanan}', [PemesananController::class, 'destroy'])->name('destroy');
});
