<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Toko;

class TokoApiController extends Controller
{
    public function index()
    {
        $tokos = Toko::with('user')->get()->map(fn($toko) => $this->formatToko($toko));

        return response()->json([
            'success' => true,
            'data'    => $tokos,
        ]);
    }

    public function show($id)
    {
        $toko = Toko::with(['user', 'menus' => function ($q) {
            $q->where('status', 'tersedia');
        }])->find($id);

        if (!$toko) {
            return response()->json([
                'success' => false,
                'message' => 'Toko tidak ditemukan.',
            ], 404);
        }

        $data = $this->formatToko($toko);
        $data['menu'] = $toko->menus->map(fn($m) => [
            'menu_id'   => $m->menu_id,
            'nama_menu' => $m->nama_menu,
            'deskripsi' => $m->deskripsi,
            'harga'     => $m->harga,
            'stok'      => $m->stok,
        ])->values();

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }

    private function formatToko($toko): array
    {
        return [
            'toko_id'   => $toko->toko_id,
            'nama_toko' => $toko->nama_toko,
            'deskripsi' => $toko->deskripsi,
            'lokasi'    => $toko->lokasi,
            'jam_buka'  => $toko->jam_buka,
            'jam_tutup' => $toko->jam_tutup,
            'pemilik'   => $toko->user ? $toko->user->name : null,
        ];
    }
}