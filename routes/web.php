<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login-submit', function (Request $request) {
    return redirect()->route('role.pilih')->with('success', 'Login berhasil!');
})->name('login.submit');

Route::post('/register-submit', function (Request $request) {
    return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
})->name('register.submit');

Route::get('/pilih-role', function () {
    return view('dashboard'); 
})->name('role.pilih');

// Route::get('/admin/toko/tambah', function () {
//     return view('tambah-toko'); 
// })->name('toko.form-tambah');

Route::get('/admin-dashboard', function () {
    return view('admin-beranda'); 
})->name('admin-beranda');

Route::get('/admin/profile', function () {
    return view('profile');
})->name('profile');

Route::get('penjual-beranda', function () {
    return view('penjual-beranda');
})->name('penjual-beranda');

Route::get('pesanan-detail', function(){
    return view('pesanan-detail');
})->name('pesanan-detail');

Route::get('pesanan-penjual', function(){
    return view('pesanan-penjual');
})->name('pesanan-penjual');

Route::get('profil-penjual', function(){
    return view('profil-penjual');
})->name('profil-penjual');

Route::get('tambah-menu', function(){
    return view('tambah_menu');
})->name('tambah_menu');

Route::get('ulasan-penjual', function(){
    return view('ulasan-penjual');
})->name('ulasan-penjual');

Route::get('ulasan-detail', function(){
    return view('ulasan-detail');
})->name('ulasan-detail');

Route::get('riwayat-penjual', function(){
    return view('riwayat-penjual');
})->name('riwayat-penjual');

Route::get('riwayat-detail', function(){
    return view('riwayat-detail');
})->name('riwayat-detail');

Route:: get('ubah-bahasa', function(){
    return view('ubah-bahasa');
})->name('ubah-bahasa');

Route::get('pengaturan-akun', function(){
    return view('pengaturan-akun');
})->name('pengaturan-akun');

Route::get('ubah-profil', function(){
    return view('ubah-profil');
})->name('ubah-profil');

Route::get('ubah-sandi', function(){
    return view('ubah-sandi');
})->name('ubah-sandi');