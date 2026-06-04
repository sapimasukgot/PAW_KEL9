<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// Get first menu and user
$menu = Menu::first();
$user = User::first();

if (!$menu || !$user) {
    echo "Error: Menu atau User tidak ditemukan\n";
    exit(1);
}

echo "Menu: {$menu->nama_menu}\n";
echo "Harga: {$menu->harga}\n";
echo "Tambahan Jumbo: {$menu->tambahan_jumbo}\n";
echo "Topping: {$menu->topping}\n\n";

// Parse topping
$hargaTopping = 0;
if ($menu->topping) {
    $toppingList = array_map('trim', explode(',', $menu->topping));
    if (count($toppingList) > 0) {
        $parts = explode(':', $toppingList[0]);
        $namaTopping = trim($parts[0]);
        $hargaTopping = isset($parts[1]) ? (int)trim($parts[1]) : 0;
        echo "Test Topping: $namaTopping = $hargaTopping\n";
    }
}

// Create order
$pesanan = Pesanan::create([
    'user_id' => $user->id,
    'toko_id' => $menu->toko_id,
    'nama_pembeli' => 'TEST JUMBO TOPPING',
    'no_meja' => 99,
    'total_harga' => 1000000,
    'status' => 'Pending',
    'keterangan' => 'Test order - check jumbo and topping',
    'tanggal_order' => now(),
]);

// Create detail - REGULER
$detail1 = DetailPesanan::create([
    'order_id' => $pesanan->pesanan_id,
    'menu_id' => $menu->menu_id,
    'jumlah' => 2,
    'harga_satuan' => $menu->harga + $hargaTopping,
    'topping' => $hargaTopping > 0 ? trim(explode(':', trim(explode(',', $menu->topping)[0]))[0]) : '-',
    'level_pedas' => 'Lvl 1',
    'subtotal' => 2 * ($menu->harga + $hargaTopping),
    'is_jumbo' => false,
]);

// Create detail - JUMBO
$detail2 = DetailPesanan::create([
    'order_id' => $pesanan->pesanan_id,
    'menu_id' => $menu->menu_id,
    'jumlah' => 3,
    'harga_satuan' => $menu->harga + $menu->tambahan_jumbo + $hargaTopping,
    'topping' => $hargaTopping > 0 ? trim(explode(':', trim(explode(',', $menu->topping)[0]))[0]) : '-',
    'level_pedas' => 'Lvl 1',
    'subtotal' => 3 * ($menu->harga + $menu->tambahan_jumbo + $hargaTopping),
    'is_jumbo' => true,
]);

echo "\n✅ Test order created!\n";
echo "Order ID: {$pesanan->pesanan_id}\n";
echo "Detail 1 (Reguler): ID {$detail1->detail_id} | Qty: {$detail1->jumlah} | Harga: {$detail1->harga_satuan} | is_jumbo: {$detail1->is_jumbo}\n";
echo "Detail 2 (Jumbo): ID {$detail2->detail_id} | Qty: {$detail2->jumlah} | Harga: {$detail2->harga_satuan} | is_jumbo: {$detail2->is_jumbo}\n";

echo "\nNow check the order detail view to see if jumbo and topping price display correctly!\n";
?>
