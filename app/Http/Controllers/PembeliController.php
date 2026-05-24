<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\Rating;

class PembeliController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('pembeli.beranda', compact('menus'));
    }

    public function show($id) {
        $menu = Menu::findOrFail($id);

        return view('pembeli.detail', compact('menu'));
    }

    public function profile() {
        $user = Auth::user(); 
        return view('pembeli.profile', compact('user'));
    }

    public function editProfile() {
        $user = Auth::user(); 
        return view('pembeli.edit-profil', compact('user'));
    }

    public function updateProfile(Request $request) {
        
        $user = User::find(Auth::id());

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        Auth::setUser($user->fresh());

        return redirect()->route('pembeli-profil')->with('success', 'Profil berhasil diperbarui!');
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

        $userModel = User::find(Auth::id());
        $userModel->password = Hash::make($request->password_baru);
        $userModel->save();

        return redirect()->route('pembeli-pengaturan')->with('success', 'Password berhasil diganti.');
    }

    public function storePesanan(Request $request, $id)
    {
        $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'no_meja'      => 'required|integer|min:1',
            'harga_total'  => 'required|integer',
            'keterangan'   => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($id);

        $pesanan = Pesanan::create([
            'user_id'       => Auth::id(),
            'toko_id'       => $menu->toko_id,
            'nama_pembeli'  => $request->nama_pembeli,
            'no_meja'       => $request->no_meja,
            'total_harga'   => $request->harga_total,
            'status'        => 'Pending',
            'keterangan'    => $request->keterangan,
            'tanggal_order' => now(), 
        ]);

        return redirect()->route('pembeli-ongoing')->with('success', 'Pesanan berhasil dibuat, selamat menunggu!');
    }

    public function checkout($id) {
        $menu = Menu::findOrFail($id);
        return view('pembeli.checkout', compact('menu'));
    }

    public function history()
    {
        $user_id = Auth::id();
        $histories = Pesanan::where('user_id', $user_id)
                        ->whereIn('status', ['Siap', 'Selesai', 'Batal'])
                        ->latest()
                        ->get();

        return view('pembeli.history', compact('histories')); 
    }

    public function payment() { 
        return view('pembeli.payment_instruction'); 
    }

    public function ongoing()
    {
        $user_id = Auth::id();

        $pesanans = Pesanan::where('user_id', $user_id)
                        ->whereIn('status', ['Pending', 'Dimasak', 'Proses'])
                        ->latest()
                        ->get();

        $menus = Menu::all(); 

        return view('pembeli.beranda_ongoing', compact('pesanans', 'menus')); 
    }
    public function rating($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pembeli.rating', compact('pesanan'));
    }

    public function storeRating(Request $request, $id)
    {
        $request->validate([
            'toko_id' => 'required',
            'nilai'   => 'required|integer|min:1|max:5',
            'ulasan'  => 'nullable|string|max:500',
        ]);

        Rating::create([
            'pesanan_id' => $id, 
            'user_id'    => Auth::id(),
            'toko_id'    => $request->toko_id,
            'nilai'      => $request->nilai,
            'ulasan'     => $request->ulasan ?? 'Tidak ada ulasan teks.',
            'tanggal'    => now(),
        ]);

        $pesanan = Pesanan::find($id);
        if ($pesanan) {
            $pesanan->update(['status' => 'Selesai']);
        }

        return redirect()->route('pembeli-riwayat-detail', $id)->with('success', 'Rating berhasil disimpan!');
    }
    
    public function ratingForm($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        return view('pembeli.rating', compact('pesanan'));
    }

    public function thanks() { 
        return view('pembeli.thanks'); 
    }

    public function changePassword() { 
        return view('pembeli.ubah-sandi'); 
    }

    public function bahasa() { 
        return view('pembeli.language'); 
    }

    public function pengaturan() { 
        return view('pembeli.settings'); 
    }

    public function historyDetail($id)
    {
        $pesanan = Pesanan::with(['details.menu', 'rating'])->findOrFail($id);
    
        return view('pembeli.history_detail', compact('pesanan'));
    }
    public function pesanan()
    {
        $toko = $this->getToko();
        $semuaPesanan = \App\Models\Pesanan::all();
        dd([
            'ID_User_Penjual_Login' => \Illuminate\Support\Facades\Auth::id(),
            'Toko_Object_Penjual' => $toko ? $toko->toArray() : 'Tidak Punya Toko',
            'Semua_Data_Pesanan_Di_MakanMart' => $semuaPesanan->toArray()
            ]);
    }
    public function detailpesanan($id) 
    {
        $pesanan = Pesanan::findOrFail($id);
        $menu = new \stdClass();
        $menu->nama_menu = "Nota Pesanan #" . $pesanan->pesanan_id;
        $menu->deskripsi = "Pesanan Anda telah direkam di sistem MakanMart pada " . $pesanan->tanggal_order;

        return view('pembeli.detail-pesanan', compact('pesanan', 'menu'));
    }

    public function deleteAccount(Request $request) {
        $user = Auth::user();
        if ($user) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            User::find($user->id)?->delete();
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
}