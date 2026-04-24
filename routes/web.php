<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login-submit', function (Request $request) {
    $email = $request->email;
    $password = $request->password;

    if(Storage::disk('local')->exists('user.json')) {
        $users = json_decode(Storage::disk('local')->get('user.json'), true);
        foreach($users as $user) {
            if($user['email'] === $email && password_verify($password, $user['password'])) {
                session(['user' => $user]);
                return redirect()->route('role.pilih')->with('success', 'Login berhasil!');
            }
        }
    }
    return redirect()->back()->with('error', 'Email atau password salah');
})->name('login.submit');

Route::post('/register-submit', function (Request $request) {
    // Validasi input
    $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8|confirmed',
    ], [
        'password.min' => 'Password harus memiliki minimal 8 karakter!',
        'password.confirmed' => 'Konfirmasi password tidak cocok!'
    ]);

    $path = 'user.json'; 
    $users = [];
    
    if (Storage::disk('local')->exists($path)) {
        $users = json_decode(Storage::disk('local')->get($path), true) ?? [];
    }

    // Cek email ganda
    foreach($users as $user) {
        if($user['email'] === $request->email) {
            return redirect()->back()->withErrors(['email' => 'Email sudah terdaftar!'])->withInput();
        }
    }

    // Simpan data
    $users[] = [
        'id' => time(),
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'pembeli',
    ];

    Storage::disk('local')->put($path, json_encode($users, JSON_PRETTY_PRINT));
    
    session(['emailMasuk' => $request->email]);
    return redirect()->route('role.pilih')->with('success', 'Akun berhasil dibuat!');
})->name('register.submit');

Route::post('/updateRole', function (Request $request) {
    $email = session('emailMasuk') ?? session('user.email');
    $selectedRole = $request->role; 
    $path = 'user.json';

    if (!$email) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    if (Storage::disk('local')->exists($path)) {
        $users = json_decode(Storage::disk('local')->get($path), true);
        $userFound = false;

        foreach ($users as &$user) {
            if ($user['email'] === $email) {
                $user['role'] = $selectedRole;
                $userFound = true;

                session(['user' => $user]);
                break;
            }
        }
        
        if ($userFound) {
            Storage::disk('local')->put($path, json_encode($users, JSON_PRETTY_PRINT));
            
            return redirect()->route($selectedRole . '-beranda');
        }
    }
    
    return redirect()->route('login')->with('error', 'Data pengguna tidak ditemukan.');
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

Route::get('ubah-profil', function(){
    return view('ubah-profil');
})->name('ubah-profil');

Route::get('ubah-profil-admin', function(){
    return view('ubah-profil-admin');
})->name('ubah-profil-admin');

Route::get('ubah-bahasa-admin', function(){
    return view('ubah-bahasa-admin');
})->name('ubah-bahasa-admin');

// Halaman utama pembeli
Route::get('/pembeli', [PembeliController::class, 'index'])->name('pembeli-beranda');

// Halaman detail pembeli (ada {id} supaya tahu menu mana yang diklik)
Route::get('/pembeli/detail/{id}', [PembeliController::class, 'show'])->name('pembeli-detail');

// Halaman Form Pemesanan (Wireframe 5)
Route::get('/pembeli/checkout/{id}', [PembeliController::class, 'checkout'])->name('pembeli-checkout');

// Halaman Instruksi Pembayaran (Wireframe 58)
Route::get('/pembeli/pembayaran', [PembeliController::class, 'payment'])->name('pembeli-pembayaran');

// Halaman Beranda dengan Pesanan Berlangsung (Wireframe 57)
Route::get('/pembeli/ongoing', [PembeliController::class, 'ongoing'])->name('pembeli-ongoing');

// Halaman Detail Akhir/Rating (Wireframe 15)
Route::get('/pembeli/summary', [PembeliController::class, 'summary'])->name('pembeli-summary');

// Proses Rating (Wireframe 19 & 20)
Route::get('/pembeli/rating/{id}', [PembeliController::class, 'rating'])->name('pembeli-rating');
Route::post('/pembeli/rating/kirim', [PembeliController::class, 'storeRating'])->name('pembeli-rating-simpan');
Route::get('/pembeli/terima-kasih', [PembeliController::class, 'thanks'])->name('pembeli-thanks');

// Proses Riwayat (Wireframe 18)
Route::get('/pembeli/riwayat', [PembeliController::class, 'history'])->name('pembeli-riwayat');
Route::get('/pembeli/riwayat/detail/{id}', [PembeliController::class, 'historyDetail'])->name('pembeli-riwayat-detail');

Route::get('/pembeli/profil', [PembeliController::class, 'profile'])->name('pembeli-profil');
Route::get('/pembeli/profil/edit', [PembeliController::class, 'editProfile'])->name('pembeli-edit-profil');

Route::get('/pembeli/bahasa', [PembeliController::class, 'language'])->name('pembeli-bahasa');
Route::get('/pembeli/pengaturan', [PembeliController::class, 'settings'])->name('pembeli-pengaturan');
Route::get('/pembeli/ubah-sandi', [PembeliController::class, 'changePassword'])->name('pembeli-ubah-sandi');
Route::get('/pembeli/detail-pesanan', function () {
    return view('pembeli.detail-pesanan'); 
})->name('pembeli-detail-pesanan');

Route::post('/logout', [PembeliController::class, 'logout'])->name('logout');
Route::post('/hapus-akun', [PembeliController::class, 'deleteAccount'])->name('hapus-akun');

Route::get('/pembeli/edit-profil', [PembeliController::class, 'editProfil'])->name('pembeli-edit-profil');
Route::get('/pembeli/bahasa', [PembeliController::class, 'bahasa'])->name('pembeli-bahasa');
Route::get('/pembeli/pengaturan', [PembeliController::class, 'pengaturan'])->name('pembeli-pengaturan');

Route::get('/pembeli/ubah-sandi', function () {
    return view('pembeli.ubah-sandi');
})->name('pembeli-ubah-sandi');

Route::post('/pembeli/update-password', [PembeliController::class, 'updatePassword'])->name('pembeli-update-password');