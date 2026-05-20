<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Toko;       
use App\Models\Menu;       
use App\Models\Pesanan;    
use App\Models\Rating;

class PenjualController extends Controller
{
    private function getToko()
    {
        return Toko::where('user_id', Auth::id())->first();
    }

    public function beranda()
    {
        $toko = $this->getToko();
        $menus = $toko ? Menu::where('toko_id', $toko->toko_id)->get() : [];
        
        return view('penjual-beranda', compact('menus'));
    }

    public function createMenu()
    {
        return view('tambah_menu');
    }

    public function storeMenu(Request $request)
    {
        $toko = $this->getToko();
        if (!$toko) {
            return back()->with('error', 'Anda belum memiliki toko terdaftar.');
        }

        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga'     => 'required|numeric',
            'stok'      => 'required|numeric|min:0',
            'status'    => 'required|string',
        ]);

        $cleanStatus = strtolower($request->status);

        Menu::create([
            'toko_id'   => $toko->toko_id,
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            'status'    => $cleanStatus,
        ]);

        return redirect()->route('penjual-beranda')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function deleteMenu($id)
    {
        $toko = $this->getToko();
        $menu = Menu::where('toko_id', $toko->toko_id)->findOrFail($id);
        $menu->delete();

        return redirect()->route('penjual-beranda')->with('success', 'Menu berhasil dihapus!');
    }

    public function pesanan()
    {
        $toko = $this->getToko();
        $pesanans = $toko ? Pesanan::with('user')
            ->where('toko_id', $toko->toko_id)
            ->whereIn('status', ['Pending', 'pending', 'Dimasak', 'dimasak', 'Proses', 'proses', 'Siap', 'siap'])
            ->latest()
            ->get() : [];
            
        return view('pesanan-penjual', compact('pesanans'));
    }

    public function pesananDetail($id)
    {
        $pesanan = \App\Models\Pesanan::findOrFail($id);
        return view('pesanan-detail', compact('pesanan')); 
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = \App\Models\Pesanan::findOrFail($id);
        $pesanan->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
    public function riwayat()
    {
        $toko = $this->getToko();
        $histories = $toko ? Pesanan::with('user')
            ->where('toko_id', $toko->toko_id)
            ->whereIn('status', ['Selesai', 'selesai', 'Batal', 'batal'])
            ->latest()
            ->get() : [];
            
        return view('riwayat-penjual', compact('histories'));
    }

    public function riwayatDetail($id)
    {
        $toko = $this->getToko();
        $detail = Pesanan::with(['user', 'details.menu'])->where('toko_id', $toko->toko_id)->findOrFail($id);
        return view('riwayat-detail', compact('detail'));
    }

    public function ulasan()
    {
        $toko = $this->getToko();
        $ulasan = $toko ? Rating::with('user')->where('toko_id', $toko->toko_id)->get() : [];
        return view('ulasan-penjual', compact('ulasan'));
    }

    public function ulasanDetail($id)
    {
        $toko = $this->getToko();
    
        $ulasanDetail = Rating::with(['user', 'pesanan.details.menu'])
            ->where('toko_id', $toko->toko_id)
            ->findOrFail($id);

        return view('ulasan-detail', compact('ulasanDetail'));
    }
    
    public function profil()
    {
        $user = Auth::user();
        return view('profil-penjual', compact('user'));
    }

    public function editProfil()
    {
        $user = Auth::user();
        return view('ubah-profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user->name  = $request->name;
        
        $user->email = $request->email;
        $user->save();

        Auth::setUser($user->fresh());

        return redirect()->route('profil-penjual')->with('success', 'Profil berhasil diperbarui!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}