<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembeliController extends Controller
{
    /**
     * Menampilkan halaman utama (Beranda) Pembeli
     */
    public function index()
    {
        $menus = [
            ['id' => 1, 'nama' => 'Mie Pangsit', 'harga' => 'Rp10.000', 'foto' => 'https://via.placeholder.com/150'],
            ['id' => 2, 'nama' => 'Nasi Ayam Katsu', 'harga' => 'Rp15.000', 'foto' => 'https://via.placeholder.com/150'],
            ['id' => 3, 'nama' => 'Mie Ayam', 'harga' => 'Rp12.000', 'foto' => 'https://via.placeholder.com/150'],
        ];

        return view('pembeli.beranda', compact('menus'));
    }

    /**
     * Menampilkan detail menu
     */
    public function show($id) {
        $menus = [
            1 => ['id' => 1, 'nama' => 'Mie Pangsit', 'harga' => '15.000'],
            2 => ['id' => 2, 'nama' => 'Nasi Ayam Katsu', 'harga' => '20.000'],
            3 => ['id' => 3, 'nama' => 'Mie Ayam', 'harga' => '12.000'],
        ];
        
        $menu = $menus[$id] ?? abort(404);

        return view('pembeli.detail', compact('menu'));
    }

    /**
     * Proses Checkout
     */
    public function checkout($id) {
        $menu = ['id' => $id, 'nama' => 'Mie Pangsit', 'image' => 'https://via.placeholder.com/300'];
        return view('pembeli.checkout', compact('menu'));
    }

    public function payment() {
        return view('pembeli.payment_instruction');
    }

    public function ongoing() {
        $menus = []; 
        $ongoing = ['nama' => 'Mie Pangsit', 'status' => 'Menunggu Pembayaran'];
        return view('pembeli.beranda_ongoing', compact('menus', 'ongoing'));
    }

    public function summary() {
        return view('pembeli.summary');
    }

    /**
     * Fitur Rating
     */
    public function rating($id) {
        return view('pembeli.rating', ['id' => $id]);
    }
    
    public function storeRating(Request $request) {
        return redirect()->route('pembeli-thanks');
    }

    public function thanks() {
        return view('pembeli.thanks');
    }

    public function detailpesanan() {
        return view('pembeli.detail-pesanan');
    }

    /**
     * Menampilkan daftar riwayat pesanan
     */
    public function history()
    {
        $histories = [
            ['id' => 101, 'nama' => 'Mie Pangsit', 'tanggal' => '27 Mar 2026', 'harga' => '32.000', 'status' => 'Selesai'],
            ['id' => 102, 'nama' => 'Nasi Ayam Katsu', 'tanggal' => '20 Mar 2026', 'harga' => '15.000', 'status' => 'Selesai'],
        ];
        return view('pembeli.history', compact('histories'));
    }

    /**
     * Menampilkan detail riwayat (Sesuai Desain Card)
     */
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

    /**
     * Pengaturan Profil dan Akun
     */
    public function profile() {
        return view('pembeli.profile');
    }

    public function editProfile() {
        $user = [
            'nama' => 'Joshua',
            'email' => session('user.email') ?? 'joshua@example.com',
            'nohp' => '081234567890'
        ];
        return view('pembeli.edit-profil', compact('user'));
    }

    public function bahasa() {
        return view('pembeli.language');
    }

    public function pengaturan() {
        return view('pembeli.settings');
    }

    /**
     * Proses Ubah Sandi
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed', 
        ], [
            'password_baru.confirmed' => 'Konfirmasi password baru tidak cocok!',
            'password_baru.min' => 'Password minimal 8 karakter.',
        ]);

        $passwordSekarang = "password123"; // Simulasi password lama

        if ($request->password_lama !== $passwordSekarang) {
            return back()->withErrors(['password_lama' => 'Password lama salah!']);
        }

        return redirect()->route('login')->with('success', 'Password berhasil diganti.');
    }

    /**
     * Fitur Hapus Akun (Menghapus dari user.json)
     */
    public function deleteAccount(Request $request)
    {
        $userSession = session('user');
        $emailToDelete = $userSession['email'] ?? null;
        $path = 'user.json';

        if (!$emailToDelete) {
            return redirect()->route('login')->with('error', 'Sesi tidak valid.');
        }

        if (Storage::disk('local')->exists($path)) {
            $users = json_decode(Storage::disk('local')->get($path), true);
            
            // Filter user yang emailnya tidak sama dengan user saat ini
            $filteredUsers = array_filter($users, function($user) use ($emailToDelete) {
                return $user['email'] !== $emailToDelete;
            });

            // Simpan kembali data yang sudah difilter
            Storage::disk('local')->put($path, json_encode(array_values($filteredUsers), JSON_PRETTY_PRINT));
        }

        // Logout dan hapus session
        session()->flush();

        return redirect()->route('login')->with('success', 'Akun Anda telah dihapus secara permanen.');
    }

    public function logout() {
        session()->flush();
        return redirect()->route('login');
    }
}