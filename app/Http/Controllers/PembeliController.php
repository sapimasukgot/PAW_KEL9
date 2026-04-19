<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembeliController extends Controller
{
    // Fungsi untuk menampilkan halaman utama (Beranda)
    public function index()
    {
        $menus = [
            ['id' => 1, 'nama' => 'Mie Pangsit', 'harga' => 'Rp10.000', 'foto' => 'https://via.placeholder.com/150'],
            ['id' => 2, 'nama' => 'Nasi Ayam Katsu', 'harga' => 'Rp15.000', 'foto' => 'https://via.placeholder.com/150'],
            ['id' => 3, 'nama' => 'Mie Ayam', 'harga' => 'Rp12.000', 'foto' => 'https://via.placeholder.com/150'],
        ];

        return view('pembeli.beranda', compact('menus'));
    }

    public function show($id) {
        $menus = [
            1 => ['id' => 1, 'nama' => 'Mie Pangsit', 'harga' => '15.000'],
            2 => ['id' => 2, 'nama' => 'Nasi Ayam Katsu', 'harga' => '20.000'],
            3 => ['id' => 3, 'nama' => 'Mie Ayam', 'harga' => '12.000'],
        ];
        $menu = $menus[$id];

        return view('pembeli.detail', compact('menu'));
    }

    public function checkout($id) {
        $menu = ['id' => $id, 'nama' => 'Mie Pangsit', 'image' => 'https://via.placeholder.com/300'];
        return view('pembeli.checkout', compact('menu'));
    }

    public function payment() {
        return view('pembeli.payment_instruction');
    }

    public function ongoing() {
        $menus = [ /* data menu rekomendasi */ ];
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

    public function history()
    {
        $histories = [
            ['id' => 101, 'nama' => 'Mie Pangsit', 'tanggal' => '27 Mar 2026', 'harga' => '32.000', 'status' => 'Selesai'],
            ['id' => 102, 'nama' => 'Nasi Ayam Katsu', 'tanggal' => '20 Mar 2026', 'harga' => '15.000', 'status' => 'Selesai'],
        ];
        return view('pembeli.history', compact('histories'));
    }

    public function historyDetail($id)
    {
        $all_histories = [
            101 => [
                'id' => 101, 
                'nama' => 'Mie Pangsit', 
                'tanggal' => '27 Mar 2026', 
                'harga' => '32.000', 
                'metode' => 'OVO / Dana'
            ],
            102 => [
                'id' => 102, 
                'nama' => 'Nasi Ayam Katsu', 
                'tanggal' => '20 Mar 2026', 
                'harga' => '15.000', 
                'metode' => 'Tunai'
            ],
        ];

        $detail = $all_histories[$id] ?? null;

        if (!$detail) {
            return redirect()->route('pembeli-riwayat');
        }

        return view('pembeli.history_detail', compact('detail'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed', 
        ], [
            'password_baru.confirmed' => 'Konfirmasi password baru tidak cocok!',
            'password_baru.min' => 'Password minimal 8 karakter.',
        ]);

        $passwordSekarang = "password123"; 

        if ($request->password_lama !== $passwordSekarang) {
            return back()->withErrors(['password_lama' => 'Password lama salah!']);
        }

        return redirect()->route('login')->with('success', 'Password berhasil diganti. Silakan login kembali.');
    }

    public function profile() {
        return view('pembeli.profile');
    }

public function editProfile() {
    // Simulasi data user untuk dikirim ke view
    $user = [
        'nama' => 'Joshua',
        'email' => session('user.email') ?? 'joshua@example.com',
        'nohp' => '081234567890'
    ];
    
    // Pastikan memanggil view yang benar
    return view('pembeli.edit-profil', compact('user'));
}

    public function bahasa() {
        return view('pembeli.language');
    }

    public function pengaturan() {
        return view('pembeli.settings');
    }
}