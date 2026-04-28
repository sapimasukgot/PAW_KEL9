<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PembeliController extends Controller
{

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
        
        $menu = $menus[$id] ?? abort(404);

        return view('pembeli.detail', compact('menu'));
    }

    public function checkout($id) {
        // Simulasi data menu untuk checkout
        $menu = ['id' => $id, 'nama' => 'Mie Pangsit', 'image' => 'https://via.placeholder.com/300'];
        return view('pembeli.checkout', compact('menu'));
    }

    public function history() {
        $histories = [
            ['id' => 101, 'nama' => 'Mie Pangsit', 'tanggal' => '27 Mar 2026', 'harga' => '32.000', 'status' => 'Selesai'],
        ];
        return view('pembeli.history', compact('histories'));
    }

    public function payment() {
        return view('pembeli.payment_instruction');
    }

    public function ongoing() {
        $menus = []; 
        $ongoing = ['nama' => 'Mie Pangsit', 'status' => 'Menunggu Pembayaran'];
        return view('pembeli.beranda_ongoing', compact('menus', 'ongoing'));
    }
    
    public function profile() {
        return view('pembeli.profile');
    }

    public function editProfile() {
        $user = Auth::user(); 
        return view('pembeli.edit-profil', compact('user'));
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->save();

        return redirect()->route('pembeli-profil')->with('success', 'Profil berhasil diperbarui!');
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

    public function detailpesanan() {
        return view('pembeli.detail-pesanan');
    }

    public function changePassword() {
        return view('pembeli.ubah-sandi');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors(['password_lama' => 'Password lama salah!']);
        }

        $user->password = Hash::make($request->password_baru);
        $user->save();

        return redirect()->route('pembeli-pengaturan')->with('success', 'Password berhasil diganti.');
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

    public function deleteAccount(Request $request) {
        $user = Auth::user();
        if ($user) {
            $user->delete();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('success', 'Akun berhasil dihapus.');
        }
        return back()->with('error', 'Gagal menghapus akun.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    
    public function bahasa() { return view('pembeli.language'); }
    public function pengaturan() { return view('pembeli.settings'); }
}