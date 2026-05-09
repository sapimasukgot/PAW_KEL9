<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembeliController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login-submit', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register-submit', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/pilih-role', function () {
        return view('dashboard');
    })->name('role.pilih');

    Route::post('/update-role', [AuthController::class, 'updateRole'])->name('updateRole');
});

Route::middleware(['auth'])->prefix('pembeli')->group(function () {
    Route::get('/', [PembeliController::class, 'index'])->name('pembeli-beranda');
    Route::get('/detail/{id}', [PembeliController::class, 'show'])->name('pembeli-detail');
    Route::get('/checkout/{id}', [PembeliController::class, 'checkout'])->name('pembeli-checkout');
    Route::get('/pembayaran', [PembeliController::class, 'payment'])->name('pembeli-pembayaran');
    Route::get('/ongoing', [PembeliController::class, 'ongoing'])->name('pembeli-ongoing');
    Route::get('/riwayat', [PembeliController::class, 'history'])->name('pembeli-riwayat');
    Route::get('/riwayat/detail/{id}', [PembeliController::class, 'historyDetail'])->name('pembeli-riwayat-detail');
    Route::get('/profil', [PembeliController::class, 'profile'])->name('pembeli-profil');
    Route::get('/edit-profil', [PembeliController::class, 'editProfile'])->name('pembeli-edit-profil');
    Route::post('/update-profil', [PembeliController::class, 'updateProfile'])->name('pembeli-update-profil');
    Route::get('/bahasa', [PembeliController::class, 'bahasa'])->name('pembeli-bahasa');
    Route::get('/pengaturan', [PembeliController::class, 'pengaturan'])->name('pembeli-pengaturan');
    Route::get('/ubah-sandi', [PembeliController::class, 'changePassword'])->name('pembeli-ubah-sandi');
    Route::post('/update-password', [PembeliController::class, 'updatePassword'])->name('pembeli-update-password');
    Route::post('/hapus-akun', [PembeliController::class, 'deleteAccount'])->name('hapus-akun');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/penjual-beranda', function () { return view('penjual-beranda'); })->name('penjual-beranda');
    Route::get('/pesanan-penjual', function(){ return view('pesanan-penjual'); })->name('pesanan-penjual');
    Route::get('/profil-penjual', function(){ return view('profil-penjual'); })->name('profil-penjual');
    Route::get('/tambah-menu', function(){ return view('tambah_menu'); })->name('tambah_menu');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', function () { return view('admin-beranda'); })->name('admin-beranda');
    Route::get('/admin/profile', function () { return view('profile'); })->name('profile');
    Route::get('/admin/pengaturan', function () { return view('pengaturan-akun-admin'); })->name('pengaturan-akun-admin');
});