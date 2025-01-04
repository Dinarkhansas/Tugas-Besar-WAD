<?php

use App\Models\Pemesanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyediaLayananController;
use App\Http\Controllers\PemesananController;

Route::get('/', function(){
    return redirect(route('home'));
});

Route::get('/home', function() {
    return view('home');
})->name('home');
    

Route::get('/penyediaLayanan', [PenyediaLayananController::class, 'index'])->name('penyediaLayanan.index');

Route::get('/penyediaLayanan/create',
[PenyediaLayananController::class, 'create'])->name('penyediaLayanan.create');

Route::post('/penyediaLayanan',
[PenyediaLayananController::class, 'store'])->name('penyediaLayanan.store');

Route::get('/penyediaLayanan/{id}', [PenyediaLayananController::class, 'show'])->name('penyediaLayanan.show');

Route::get('/penyediaLayanan/{id}/edit', [PenyediaLayananController::class, 'edit'])->name('penyediaLayanan.edit');

Route::put('/penyediaLayanan/{penyediaLayanan}',
[PenyediaLayananController::class, 'update'])->name('penyediaLayanans.update');

Route::delete('/penyediaLayanan/{pennyediaLayanan}',
[PenyediaLayananController::class, 'destroy'])->name('penyediaLayanans.destroy');



Route::get('/pemesanans', [PemesananController::class, 'index'])->name('pemesanan.index');

Route::get('/pemesanans/create',
[PemesananController::class, 'create'])->name('pemesanans.create');

Route::post('/pemesanans',
[PemesananController::class, 'store'])->name('pemesanans.store');

Route::get('/pemesanans/{id}', [PemesananController::class, 'show'])->name('pemesanans.show');

Route::get('/pemesanans/{id}/edit', [PemesananController::class, 'edit'])->name('pemesanans.edit');

Route::put('/pemesanans/{pemesanans}', [PemesananController::class, 'update'])->name('pemesanans.update');


Route::delete('/mahasiswa/{pemesanans}',
[PemesananController::class, 'destroy'])->name('pemesanans.destroy');
