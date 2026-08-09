<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::resource('inventaris', \App\Http\Controllers\Admin\InventarisController::class);
    
    // Peminjaman Routes
    Route::post('/peminjaman/{id}/selesaikan', [\App\Http\Controllers\Admin\PeminjamanController::class, 'selesaikan'])->name('peminjaman.selesaikan');
    Route::resource('peminjaman', \App\Http\Controllers\Admin\PeminjamanController::class);

    // Laporan Route
    Route::get('/laporan/excel', [\App\Http\Controllers\Admin\LaporanController::class, 'excel'])->name('laporan.excel');
    Route::get('/laporan', [\App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan.index');
});

Route::prefix('guest')->name('guest.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'guest'])->name('dashboard');
    Route::get('/katalog', [\App\Http\Controllers\Guest\KatalogController::class, 'index'])->name('katalog.index');
    Route::get('/katalog/{id}', [\App\Http\Controllers\Guest\KatalogController::class, 'show'])->name('katalog.show');
    Route::get('/peminjaman', [\App\Http\Controllers\Guest\PeminjamanController::class, 'index'])->name('peminjaman.index');
});

// Profil Routes (Bisa diakses Admin & Guru)
Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [\App\Http\Controllers\ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [\App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update');
});
