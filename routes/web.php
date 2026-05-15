<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\AdminController;

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
    Route::get('/detail-pesanan', [PembeliController::class, 'detailpesanan'])->name('pembeli-detail-pesanan');
    Route::get('/rating/{id}', [PembeliController::class, 'rating'])->name('pembeli-rating');
    Route::post('/rating/store', [PembeliController::class, 'storeRating'])->name('pembeli-rating-store');
    Route::get('/thanks', [PembeliController::class, 'thanks'])->name('pembeli-thanks');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/penjual-beranda', function () { return view('penjual-beranda'); })->name('penjual-beranda');
    Route::get('/profil-penjual', [PenjualController::class, 'profil'])->name('profil-penjual');
    Route::get('/ubah-profil-penjual', [PenjualController::class, 'editProfil'])->name('ubah-profil');
    Route::post('/update-profil-penjual', [PenjualController::class, 'updateProfil'])->name('penjual-update-profil');
    Route::get('/pesanan-penjual', function () { return view('pesanan-penjual'); })->name('pesanan-penjual');
    Route::get('/tambah-menu', function () { return view('tambah_menu'); })->name('tambah_menu');
    Route::get('/pesanan-detail', function () { return view('pesanan-detail'); })->name('pesanan-detail');
    Route::get('/riwayat-penjual', function () { return view('riwayat-penjual'); })->name('riwayat-penjual');
    Route::get('/ubah-sandi-penjual', function () { return view('ubah-sandi'); })->name('ubah-sandi-penjual');
    Route::get('/ubah-bahasa-penjual', function () { return view('ubah-bahasa'); })->name('ubah-bahasa-penjual');
    Route::get('/pengaturan-akun-penjual', function () { return view('pengaturan-akun'); })->name('pengaturan-akun-penjual');
    Route::get('/riwayat-penjual-detail', function () { return view('riwayat-detail'); })->name('riwayat-penjual-detail');
    Route::get('/ulasan-penjual', function () {
        $ulasan = [
            ['id' => 1, 'nama' => 'Aan', 'harga' => '32.000', 'menu' => 'Mie Pangsit', 'komentar' => 'Rasanya mantap!'],
            ['id' => 2, 'nama' => 'Budi', 'harga' => '15.000', 'menu' => 'Nasi Goreng', 'komentar' => 'Porsinya banyak.'],
        ];
        return view('ulasan-penjual', compact('ulasan'));
    })->name('ulasan-penjual');
    Route::get('/ulasan-detail/{id}', function ($id) { return view('ulasan-detail', ['id' => $id]); })->name('ulasan-detail');
    Route::get('/ubah-sandi', function () { return view('ubah-sandi'); })->name('ubah-sandi');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', function () { return view('admin-beranda'); })->name('admin-beranda');
    Route::get('/admin/profile', [AdminController::class, 'profil'])->name('profile');
    Route::get('/admin/ubah-profil', [AdminController::class, 'editProfil'])->name('ubah-profil-admin');
    Route::post('/admin/update-profil', [AdminController::class, 'updateProfil'])->name('admin-update-profil');
    Route::get('/admin/pengaturan', function () { return view('pengaturan-akun-admin'); })->name('pengaturan-akun-admin');
    Route::get('/admin/ubah-sandi', function () { return view('ubah-sandi-admin'); })->name('ubah-sandi-admin');
    Route::get('/admin/ubah-bahasa', function () { return view('ubah-bahasa-admin'); })->name('ubah-bahasa-admin');
});