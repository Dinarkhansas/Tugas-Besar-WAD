<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PembayaranController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('layanan/{layanan}/pesanan', [LayananController::class, 'showPesanan'])->name('layanan.pesanan');
    Route::get('/layanan/user', [LayananController::class, 'userIndex'])->name('layanan.user.index');
    Route::resource('layanan', LayananController::class);

    Route::resource('pesanan', PesananController::class);
    Route::get('/pesanan/create/{layanan_id}', [PesananController::class, 'create'])->name('pesanan.create');

    Route::resource('pembayaran', PembayaranController::class);
    Route::get('/pembayaran/create/{pesanan_id}', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::put('pembayaran/{id}/status', [PembayaranController::class, 'updateStatus'])->name('pembayaran.updateStatus');

    Route::resource('feedback', FeedbackController::class);
    Route::get('feedback/create/{pesanan_id}', [FeedbackController::class, 'create'])->name('feedback.create');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

