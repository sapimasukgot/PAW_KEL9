<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembeliController extends Controller
{
    // Fungsi untuk menampilkan halaman utama (Beranda)
    public function index()
    {
        // Nanti kalau sudah pakai Database, bagian ini tinggal diganti 
        // dengan perintah ambil data dari DB.
        $menus = [
            ['id' => 1, 'nama' => 'Mie Pangsit', 'harga' => 'Rp10.000', 'foto' => 'https://via.placeholder.com/150'],
            ['id' => 2, 'nama' => 'Nasi Ayam Katsu', 'harga' => 'Rp15.000', 'foto' => 'https://via.placeholder.com/150'],
            ['id' => 3, 'nama' => 'Mie Ayam', 'harga' => 'Rp12.000', 'foto' => 'https://via.placeholder.com/150'],
            // Tambahkan menu lainnya di sini...
        ];

        return view('pembeli.beranda', compact('menus'));
    }

    // Pastikan namanya 'show' sesuai yang dipanggil di Route
    public function show($id) {
        // Logika mengambil data menu berdasarkan ID
        // Untuk sementara kita pakai data dummy dulu agar tidak error
        $menus = [
            1 => ['id' => 1, 'nama' => 'Mie Pangsit', 'harga' => '15.000'],
            2 => ['id' => 2, 'nama' => 'Nasi Ayam Katsu', 'harga' => '20.000'],
            3 => ['id' => 3, 'nama' => 'Mie Ayam', 'harga' => '12.000'],
            ];
        $menu = $menus[$id];

        return view('pembeli.detail', compact('menu'));
}

    // Fungsi untuk menampilkan halaman detail berdasarkan ID
    public function checkout($id) {
        $menu = ['id' => $id, 'nama' => 'Mie Pangsit', 'image' => 'https://via.placeholder.com/300'];
        return view('pembeli.checkout', compact('menu'));
    }

    public function payment() {
        return view('pembeli.payment_instruction');
    }

    public function ongoing() {
        $menus = [ /* data menu rekomendasi seperti biasa */ ];
        $ongoing = ['nama' => 'Mie Pangsit', 'status' => 'Menunggu Pembayaran'];
        return view('pembeli.beranda_ongoing', compact('menus', 'ongoing'));
    }

    public function summary() {
        return view('pembeli.summary');
    }

    public function rating($id) {
    return view('pembeli.rating', ['id' => $id]);
    }
    
    public function storeRating(Request $request) {
        return redirect()->route('pembeli-thanks');
    }

    public function thanks() {
        return view('pembeli.thanks');
    }

    public function history() {
        $histories = [
            ['id' => 101, 'nama' => 'Mie Pangsit', 'tanggal' => '27 Mar 2026', 'harga' => '32.000', 'status' => 'Selesai'],
            ['id' => 102, 'nama' => 'Nasi Ayam Katsu', 'tanggal' => '20 Mar 2026', 'harga' => '15.000', 'status' => 'Selesai'],
        ];
        return view('pembeli.history', compact('histories'));
    }

    public function historyDetail($id) {
        // Simulasi data detail yang sudah permanen (Read-only)
        return view('pembeli.history_detail', ['id' => $id]);
    }

    public function updatePassword(Request $request)
{
    //Validasi input
    $request->validate([
        'password_lama' => 'required',
        'password_baru' => 'required|min:8|confirmed', // 'confirmed' otomatis mencari input bernama password_baru_confirmation
    ], [
        'password_baru.confirmed' => 'Konfirmasi password baru tidak cocok!',
        'password_baru.min' => 'Password minimal 8 karakter.',
    ]);

    // 2. Logika Pengecekan (Simulasi)
    $passwordSekarang = "password123"; // Nanti ini diambil dari Database

    if ($request->password_lama !== $passwordSekarang) {
        return back()->withErrors(['password_lama' => 'Password lama salah!']);
    }

    // 3. Jika berhasil, lempar ke halaman login untuk login ulang
    return redirect()->route('login')->with('success', 'Password berhasil diganti. Silakan login kembali.');
    }

    public function profile() {
        return view('pembeli.profile');
    }

    public function editProfil() {
        return view('pembeli.edit-profil');
    }

    public function bahasa() {
        return view('pembeli.language');
    }

    public function pengaturan() {
        return view('pembeli.settings');
    }
}