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
            'topping' => 'nullable|string',
            'tambahan_jumbo' => 'nullable|required|numeric|min:0',
        ]);

        $cleanStatus = strtolower($request->status);

        Menu::create([
            'toko_id'   => $toko->toko_id,
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            'tambahan_jumbo' => $request->tambahan_jumbo, 
            'topping'        => $request->topping,
            'status'    => $cleanStatus,
        ]);

        return redirect()->route('penjual-beranda')->with('success', 'Menu berhasil ditambahkan!');
    }
public function kosongkanMenu($id)
{
    $toko = $this->getToko();
    $menu = Menu::where('toko_id', $toko->toko_id)->findOrFail($id);
    $menu->stok = 0;
    $menu->status = 'habis';
    $menu->save();

    return back()->with('success', 'Menu berhasil dikosongkan.');
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
    public function storePesanan(Request $request, $id)
{
    $request->validate([
        'nama_pembeli' => 'required|string|max:255',
        'no_meja'      => 'required|integer|min:1',
        'harga_total'  => 'required|integer',
        'keterangan'   => 'nullable|string',
        'qty_reguler'  => 'required|integer|min:0',
        'qty_jumbo'    => 'required|integer|min:0',
    ]);

    $menu = Menu::findOrFail($id);

    $totalQty = $request->qty_reguler + $request->qty_jumbo;
    if ($totalQty < 1) {
        return back()->withErrors(['qty' => 'Minimal pesan 1 porsi.']);
    }

    if ($totalQty > $menu->stok) {
        return back()->withErrors(['qty' => 'Stok tidak mencukupi. Stok tersisa: ' . $menu->stok . ' porsi.']);
    }

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

    if ($request->qty_reguler > 0) {
        \App\Models\DetailPesanan::create([
            'order_id'     => $pesanan->pesanan_id,
            'menu_id'      => $menu->menu_id,
            'jumlah'       => $request->qty_reguler,
            'harga_satuan' => $menu->harga,
            'subtotal'     => $request->qty_reguler * $menu->harga,
        ]);
    }

    if ($request->qty_jumbo > 0) {
        \App\Models\DetailPesanan::create([
            'order_id'     => $pesanan->pesanan_id,
            'menu_id'      => $menu->menu_id,
            'jumlah'       => $request->qty_jumbo,
            'harga_satuan' => $menu->harga + ($menu->tambahan_jumbo ?? 0),
            'subtotal'     => $request->qty_jumbo * ($menu->harga + ($menu->tambahan_jumbo ?? 0)),
        ]);
    }

    $menu->stok -= $totalQty;
    if ($menu->stok <= 0) {
        $menu->stok = 0;
        $menu->status = 'habis';
    }
    $menu->save();

    return redirect()->route('pembeli-ongoing')->with('success', 'Pesanan berhasil dibuat, selamat menunggu!');
}
    public function pesananDetail($id)
    {
        $pesanan = \App\Models\Pesanan::with([
            'detailPesanan.menu'
        ])->findOrFail($id);

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
            ->whereIn('status', ['Pending','pending','Selesai', 'selesai', 'Batal', 'batal','Siap', 'siap diambil', 'dibatalkan'])
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

    public function updateStatusAjax(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
            ]);
            
        $pesanan = \App\Models\Pesanan::find($id);
        if ($pesanan) {
            $pesanan->status = $request->status;
            $pesanan->save();
            
            return response()->json([
            'success' => true,
            'status' => $pesanan->status,
            'message' => 'Status antrean pesanan berhasil diperbarui secara real-time!'
            ]);
            }
            
        return response()->json(['success' => false, 'message' => 'Data pesanan gagal ditemukan.'], 404);
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();
    
        if ($user) {
            $toko = \App\Models\Toko::where('user_id', $user->id)->first();

            if ($toko) {
                \App\Models\Menu::where('toko_id', $toko->toko_id)->delete();
                $toko->delete();
            }
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            \App\Models\User::find($user->id)?->delete();

            return redirect()->route('login')->with('success', 'Akun penjual beserta semua menu dagangan berhasil dihapus.');
        }
    
        return back()->with('error', 'Gagal menghapus akun.');
    }
}
