<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ambil semua detail pesanan yang belum di-set is_jumbo
        $details = DB::table('detail_pesanan')
            ->leftJoin('menu', 'detail_pesanan.menu_id', '=', 'menu.menu_id')
            ->select('detail_pesanan.*', 'menu.harga', 'menu.tambahan_jumbo', 'menu.topping')
            ->get();

        foreach ($details as $detail) {
            $hargaReguler = $detail->harga ?? 0;
            $tambahanJumbo = $detail->tambahan_jumbo ?? 0;
            $hargaSatuan = $detail->harga_satuan ?? 0;

            // Parse harga topping dari field topping jika ada
            $hargaToppingAsli = 0;
            if ($detail->topping && $detail->topping !== '-') {
                $toppingList = array_map('trim', explode(',', $detail->topping));
                foreach ($toppingList as $top) {
                    $parts = explode(':', $top);
                    // Jika topping ada tapi tanpa nama (format lama), skip
                    if (empty(trim($parts[0]))) continue;
                    $hargaToppingAsli = isset($parts[1]) ? (int)trim($parts[1]) : 0;
                    break;
                }
            }

            // Tentukan apakah ini jumbo atau reguler
            $isJumbo = false;
            if ($tambahanJumbo > 0) {
                // Jika harga satuan lebih tinggi dari regular + tambahan jumbo, maka ini jumbo
                $selisih = $hargaSatuan - $hargaReguler;
                $isJumbo = ($selisih >= $tambahanJumbo);
            }

            // PENTING: Normalize harga_satuan (remove topping, keep only base + jumbo)
            $newHargaSatuan = $hargaSatuan;
            if ($hargaToppingAsli > 0) {
                $newHargaSatuan = $hargaSatuan - $hargaToppingAsli;
            }

            DB::table('detail_pesanan')
                ->where('detail_id', $detail->detail_id)
                ->update([
                    'is_jumbo' => $isJumbo ? 1 : 0,
                    'harga_satuan' => $newHargaSatuan,
                ]);
        }
    }

    public function down(): void
    {
        // Reset semua is_jumbo ke 0
        DB::table('detail_pesanan')->update(['is_jumbo' => 0]);
    }
};
