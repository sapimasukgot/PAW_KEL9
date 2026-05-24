<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckRole;

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

Route::middleware(['auth', 'role:pembeli,user'])->prefix('pembeli')->group(function () {
    Route::get('/', [PembeliController::class, 'index'])->name('pembeli-beranda');
    Route::get('/detail/{id}', [PembeliController::class, 'show'])->name('pembeli-detail');
    Route::get('/checkout/{id}', [PembeliController::class, 'checkout'])->name('pembeli-checkout');
    Route::post('/checkout/{id}/store', [PembeliController::class, 'storePesanan'])->name('pembeli-checkout.store');
    Route::get('/pembayaran', [PembeliController::class, 'payment'])->name('pembeli-pembayaran');
    Route::get('/ongoing', [PembeliController::class, 'ongoing'])->name('pembeli-ongoing');
    Route::get('/detail-pesanan/{id}', [PembeliController::class, 'detailpesanan'])->name('pembeli-detail-pesanan');
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
    Route::get('/thanks', [PembeliController::class, 'thanks'])->name('pembeli-thanks');
    Route::post('/rating/store/{id}', [PembeliController::class, 'storeRating'])->name('pembeli-rating-store');
    Route::get('/pembeli/rating/{id}', [PembeliController::class, 'ratingForm'])
    ->name('pembeli-rating');
});

Route::middleware(['auth', 'role:penjual'])->prefix('penjual')->group(function () {
    Route::get('/beranda', [PenjualController::class, 'beranda'])->name('penjual-beranda');
    Route::get('/profil', [PenjualController::class, 'profil'])->name('profil-penjual');
    Route::get('/ubah-profil', [PenjualController::class, 'editProfil'])->name('ubah-profil');
    Route::post('/update-profil', [PenjualController::class, 'updateProfil'])->name('penjual-update-profil');
    
    Route::get('/pesanan', [PenjualController::class, 'pesanan'])->name('pesanan-penjual');
    Route::get('/pesanan-detail/{id}', [PenjualController::class, 'pesananDetail'])->name('pesanan-detail');
    Route::get('/tambah-menu', [PenjualController::class, 'createMenu'])->name('tambah_menu');
    Route::post('/store-menu', [PenjualController::class, 'storeMenu'])->name('store_menu');
    Route::post('/hapus-menu/{id}', [PenjualController::class, 'deleteMenu'])->name('delete_menu');

    Route::get('/riwayat', [PenjualController::class, 'riwayat'])->name('riwayat-penjual');
    Route::get('/riwayat-detail/{id}', [PenjualController::class, 'riwayatDetail'])->name('riwayat-penjual-detail');
    Route::post('/pesanan-detail/{id}/update-status', [PenjualController::class, 'updateStatus'])->name('penjual.update-status');

    Route::get('/ulasan', [PenjualController::class, 'ulasan'])->name('ulasan-penjual');
    Route::get('/ulasan-detail/{id}', [PenjualController::class, 'ulasanDetail'])->name('ulasan-detail');
    
    Route::get('/ubah-sandi', function () { return view('ubah-sandi'); })->name('ubah-sandi-penjual');
    Route::get('/ubah-bahasa', function () { return view('ubah-bahasa'); })->name('ubah-bahasa-penjual');
    Route::get('/pengaturan-akun', function () { return view('pengaturan-akun'); })->name('pengaturan-akun-penjual');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () { 
        $tokos = \App\Models\Toko::with('user')->get();
        return view('admin-beranda', compact('tokos')); 
    })->name('admin-beranda');
    
    Route::get('/profile', [AdminController::class, 'profil'])->name('profile');
    Route::get('/ubah-profil', [AdminController::class, 'editProfil'])->name('ubah-profil-admin');
    Route::post('/update-profil', [AdminController::class, 'updateProfil'])->name('admin-update-profil');
    Route::get('/pengaturan', function () { return view('pengaturan-akun-admin'); })->name('pengaturan-akun-admin');
    Route::get('/ubah-sandi', function () { return view('ubah-sandi-admin'); })->name('ubah-sandi-admin');
    Route::get('/ubah-bahasa', function () { return view('ubah-bahasa-admin'); })->name('ubah-bahasa-admin');
    Route::get('/tambah-toko', [AdminController::class, 'createToko'])->name('admin.tambah_toko');
    Route::post('/store-toko', [AdminController::class, 'storeToko'])->name('admin.store_toko'); 
    Route::post('/delete-toko/{id}', [AdminController::class, 'deleteToko'])->name('admin.delete_toko');
});