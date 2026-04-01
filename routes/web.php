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