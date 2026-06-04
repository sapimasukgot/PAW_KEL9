<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== 10 Pesanan Terbaru ===\n";
$details = DB::table('detail_pesanan')
    ->orderBy('detail_id', 'desc')
    ->limit(10)
    ->get(['detail_id', 'order_id', 'jumlah', 'harga_satuan', 'topping', 'is_jumbo', 'created_at']);

foreach ($details as $d) {
    echo sprintf(
        "ID:%d | Order:%d | Qty:%d | Harga:%d | Topping:%s | Jumbo:%d | %s\n",
        $d->detail_id,
        $d->order_id,
        $d->jumlah,
        $d->harga_satuan,
        $d->topping ?? '-',
        $d->is_jumbo,
        $d->created_at
    );
}

echo "\n=== Cek Menu ===\n";
$menu = DB::table('menu')->first(['menu_id', 'nama_menu', 'harga', 'tambahan_jumbo', 'topping']);
echo sprintf(
    "Menu: %s | Harga: %d | Jumbo: %d | Topping: %s\n",
    $menu->nama_menu,
    $menu->harga,
    $menu->tambahan_jumbo,
    $menu->topping
);
?>
