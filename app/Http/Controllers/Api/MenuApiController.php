<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::with('toko')->where('status', 'tersedia');

        if ($request->has('toko_id')) {
            $query->where('toko_id', $request->toko_id);
        }

        $menus = $query->get()->map(fn($menu) => $this->formatMenu($menu));

        return response()->json([
            'success' => true,
            'data'    => $menus,
        ]);
    }

    public function show($id)
    {
        $menu = Menu::with('toko')->find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $this->formatMenu($menu),
        ]);
    }

    private function formatMenu($menu): array
    {
        return [
            'menu_id'   => $menu->menu_id,
            'nama_menu' => $menu->nama_menu,
            'deskripsi' => $menu->deskripsi,
            'harga'     => $menu->harga,
            'stok'      => $menu->stok,
            'status'    => $menu->status,
            'toko'      => $menu->toko ? [
                'toko_id'   => $menu->toko->toko_id,
                'nama_toko' => $menu->toko->nama_toko,
                'lokasi'    => $menu->toko->lokasi,
            ] : null,
        ];
    }
}