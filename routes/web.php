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
    Route::get('/inventaris/{id}/label', [\App\Http\Controllers\Admin\InventarisController::class, 'printLabel'])->name('inventaris.printLabel');
    Route::resource('inventaris', \App\Http\Controllers\Admin\InventarisController::class);
    
    // Peminjaman Routes
    Route::post('/peminjaman/{id}/selesaikan', [\App\Http\Controllers\Admin\PeminjamanController::class, 'selesaikan'])->name('peminjaman.selesaikan');
    Route::resource('peminjaman', \App\Http\Controllers\Admin\PeminjamanController::class);

    // Pengguna Route
    Route::resource('pengguna', \App\Http\Controllers\Admin\PenggunaController::class);

    // Laporan Route
    Route::get('/laporan/excel', [\App\Http\Controllers\Admin\LaporanController::class, 'excel'])->name('laporan.excel');
    Route::get('/laporan', [\App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan.index');
});

Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'guru'])->name('dashboard');
    Route::get('/katalog', [\App\Http\Controllers\Guru\KatalogController::class, 'index'])->name('katalog.index');
    Route::get('/katalog/{id}', [\App\Http\Controllers\Guru\KatalogController::class, 'show'])->name('katalog.show');
    Route::get('/peminjaman', [\App\Http\Controllers\Guru\PeminjamanController::class, 'index'])->name('peminjaman.index');
});

// Profil Routes (Bisa diakses Admin & Guru)
Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [\App\Http\Controllers\ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [\App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update');
});
