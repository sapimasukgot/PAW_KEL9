<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Models\Menu;

class PesananApiController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with(['toko', 'details.menu', 'rating'])
            ->where('user_id', Auth::id())
            ->whereIn('status', ['Siap', 'Selesai', 'Batal'])
            ->latest()
            ->get()
            ->map(fn($p) => $this->formatPesanan($p));

        return response()->json([
            'success' => true,
            'data'    => $pesanans,
        ]);
    }

    public function ongoing()
    {
        $pesanans = Pesanan::with(['toko', 'details.menu'])
            ->where('user_id', Auth::id())
            ->whereIn('status', ['Pending', 'Dimasak', 'Proses'])
            ->latest()
            ->get()
            ->map(fn($p) => $this->formatPesanan($p));

        return response()->json([
            'success' => true,
            'data'    => $pesanans,
        ]);
    }

    public function show($id)
    {
        $pesanan = Pesanan::with(['toko', 'details.menu', 'pembayaran', 'rating'])
            ->where('user_id', Auth::id())
            ->find($id);

        if (!$pesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $this->formatPesanan($pesanan, true),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id'      => 'required|exists:menu,menu_id',
            'nama_pembeli' => 'required|string|max:255',
            'no_meja'      => 'required|integer|min:1',
            'total_harga'  => 'required|integer|min:0',
            'keterangan'   => 'nullable|string|max:500',
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        $pesanan = Pesanan::create([
            'user_id'       => Auth::id(),
            'toko_id'       => $menu->toko_id,
            'nama_pembeli'  => $request->nama_pembeli,
            'no_meja'       => $request->no_meja,
            'total_harga'   => $request->total_harga,
            'status'        => 'Pending',
            'keterangan'    => $request->keterangan,
            'tanggal_order' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat.',
            'data'    => $this->formatPesanan($pesanan),
        ], 201);
    }

    private function formatPesanan(Pesanan $pesanan, bool $detail = false): array
    {
        $data = [
            'pesanan_id'    => $pesanan->pesanan_id,
            'nama_pembeli'  => $pesanan->nama_pembeli,
            'no_meja'       => $pesanan->no_meja,
            'total_harga'   => $pesanan->total_harga,
            'status'        => $pesanan->status,
            'keterangan'    => $pesanan->keterangan,
            'tanggal_order' => $pesanan->tanggal_order,
            'toko'          => $pesanan->toko ? [
                'toko_id'   => $pesanan->toko->toko_id,
                'nama_toko' => $pesanan->toko->nama_toko,
            ] : null,
        ];

        if ($detail) {
            $data['detail_items'] = $pesanan->details->map(fn($d) => [
                'menu_id'      => $d->menu_id,
                'nama_menu'    => $d->menu?->nama_menu,
                'jumlah'       => $d->jumlah,
                'harga_satuan' => $d->harga_satuan,
                'subtotal'     => $d->subtotal,
            ])->values();

            $data['pembayaran'] = $pesanan->pembayaran ? [
                'metode'       => $pesanan->pembayaran->metode_pembayaran,
                'status_bayar' => $pesanan->pembayaran->status_bayar,
                'tanggal_bayar'=> $pesanan->pembayaran->tanggal_bayar,
            ] : null;

            $data['rating'] = $pesanan->rating ? [
                'nilai'  => $pesanan->rating->nilai,
                'ulasan' => $pesanan->rating->ulasan,
            ] : null;
        }

        return $data;
    }
}