<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PembeliController;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login-submit', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();
        return ($user->role) ? redirect()->route($user->role . '-beranda') : redirect()->route('role.pilih');
    }

    return back()->with('error', 'Email atau password salah.')->withInput();
})->name('login.submit');


Route::post('/register-submit', function (Request $request) {
    try{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'pembeli',
    ]);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('role.pilih');}
    catch (\Illuminate\Validation\ValidationException $e) {
        return back()->withErrors($e->validator)->withInput();
    }
})->name('register.submit');

Route::post('/updateRole', function (Request $request) {
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $selectedRole = $request->role;
    $user = Auth::user();
    $user->role = $selectedRole;
    $user->save(); 

    return redirect()->route($selectedRole . '-beranda')->with('success', 'Role berhasil dipilih!');
})->name('updateRole');

Route::get('/pilih-role', function () {
    return view('dashboard'); 
})->name('role.pilih');


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

Route::get('/pembeli/profil/edit', [PembeliController::class, 'editProfile'])->name('pembeli-edit-profil');
Route::get('ubah-sandi', function(){
    return view('ubah-sandi');
})->name('ubah-sandi');

Route::get('/pembeli', [PembeliController::class, 'index'])->name('pembeli-beranda');

Route::get('/pembeli/detail/{id}', [PembeliController::class, 'show'])->name('pembeli-detail');

Route::get('/pembeli/checkout/{id}', [PembeliController::class, 'checkout'])->name('pembeli-checkout');

Route::get('/pembeli/pembayaran', [PembeliController::class, 'payment'])->name('pembeli-pembayaran');

Route::get('/pembeli/ongoing', [PembeliController::class, 'ongoing'])->name('pembeli-ongoing');

Route::get('/pembeli/summary', [PembeliController::class, 'summary'])->name('pembeli-summary');

Route::get('/pembeli/rating/{id}', [PembeliController::class, 'rating'])->name('pembeli-rating');
Route::post('/pembeli/rating/kirim', [PembeliController::class, 'storeRating'])->name('pembeli-rating-simpan');
Route::get('/pembeli/terima-kasih', [PembeliController::class, 'thanks'])->name('pembeli-thanks');
Route::get('/pembeli/riwayat', [PembeliController::class, 'history'])->name('pembeli-riwayat');
Route::get('/pembeli/riwayat/detail/{id}', [PembeliController::class, 'historyDetail'])->name('pembeli-riwayat-detail');

Route::get('/pembeli/profil', [PembeliController::class, 'profile'])->name('pembeli-profil');
Route::get('/pembeli/profil/edit', [PembeliController::class, 'editProfile'])->name('pembeli-edit-profil');

Route::get('/pembeli/bahasa', [PembeliController::class, 'language'])->name('pembeli-bahasa');
Route::get('/pembeli/pengaturan', [PembeliController::class, 'settings'])->name('pembeli-pengaturan');
Route::get('/pembeli/ubah-sandi', [PembeliController::class, 'changePassword'])->name('pembeli-ubah-sandi');

Route::post('/logout', [PembeliController::class, 'logout'])->name('logout');
Route::post('/hapus-akun', [PembeliController::class, 'deleteAccount'])->name('hapus-akun');

Route::get('/pembeli/edit-profil', [PembeliController::class, 'editProfil'])->name('pembeli-edit-profil');
Route::get('/pembeli/bahasa', [PembeliController::class, 'bahasa'])->name('pembeli-bahasa');
Route::get('/pembeli/pengaturan', [PembeliController::class, 'pengaturan'])->name('pembeli-pengaturan');

Route::get('/pembeli/ubah-sandi', function () {
    return view('pembeli.ubah-sandi');
})->name('pembeli-ubah-sandi');

Route::post('/pembeli/update-password', [PembeliController::class, 'updatePassword'])->name('pembeli-update-password');