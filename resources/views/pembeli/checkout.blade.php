@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Order Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;" class="min-h-screen pb-10">

    <div class="max-w-3xl mx-auto p-4">

        <h1 class="text-2xl font-bold text-center my-6 text-gray-900">Order {{ $menu->nama_menu }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="w-full h-44 bg-gray-300 rounded-xl overflow-hidden shadow-sm">
                <img src="https://via.placeholder.com/400x300" alt="{{ $menu->nama_menu }}" class="w-full h-full object-cover">
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm flex flex-col justify-start">
                <h4 class="font-bold text-sm text-gray-800 mb-1">Deskripsi</h4>
                <p class="text-xs text-gray-600 leading-relaxed">
                    {{ $menu->nama_menu }} {{ $menu->deskripsi ?? 'adalah salah satu menu yang cukup digemari pelanggan, terlebih karena rasanya yang gurih and aromanya yang menggugah selera.' }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="bg-white rounded-xl p-4 shadow-sm">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Harga</h4>
                <div class="text-xs text-gray-600 space-y-1">
                    <p>Reguler: Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    <p>Jumbo: Rp {{ number_format($menu->harga + 4000, 0, ',', '.') }} <span class="text-gray-400 text-[10px]">(+Rp 4.000 dari reguler)</span></p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Topping</h4>
                <div class="text-xs text-gray-600 space-y-1">
                    <p>Kerupuk - Rp 4.000</p>
                    <p>Kulit - Rp 3.000</p>
                    <p>Telur - Rp 4.000</p>
                </div>
            </div>
        </div>

       <form action="{{ route('pembeli-checkout.store', $menu->menu_id) }}" method="POST" class="space-y-4">
            @csrf

            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Menu</h4>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Reguler:</span>
                    <input type="number" id="qty_reguler" name="qty_reguler" value="0" min="0" class="bg-gray-200 px-3 py-1 rounded-lg text-xs font-bold w-20 text-center focus:outline-none border-none shadow-sm">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Jumbo:</span>
                    <input type="number" id="qty_jumbo" name="qty_jumbo" value="0" min="0" class="bg-gray-200 px-3 py-1 rounded-lg text-xs font-bold w-20 text-center focus:outline-none border-none shadow-sm">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Topping:</span>
                    <select id="topping_select" name="topping" class="bg-gray-200 px-3 py-1 rounded-lg text-xs font-bold w-32 text-center focus:outline-none border-none shadow-sm cursor-pointer">
                        <option value="-">Tanpa Topping</option>
                        <option value="Telur">Telur (+4k)</option>
                        <option value="Kerupuk">Kerupuk (+4k)</option>
                        <option value="Kulit">Kulit (+3k)</option>
                    </select>
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Level Pedas:</span>
                    <select name="level_pedas" class="bg-gray-200 px-3 py-1 rounded-lg text-xs font-bold w-24 text-center focus:outline-none border-none shadow-sm appearance-none cursor-pointer">
                        <option value="Lvl 0">Lvl 0</option>
                        <option value="Lvl 1">Lvl 1</option>
                        <option value="Lvl 2">Lvl 2</option>
                    </select>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Pesanan</h4>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Nama:</span>
                    <input type="text" name="nama_pembeli" value="Aan" required class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none focus:ring-1 ring-orange-300">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">No. Meja:</span>
                    <input type="number" name="no_meja" value="1" required class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none focus:ring-1 ring-orange-300">
                </div>
                
               <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Harga:</span>
                        <input type="text" id="total_harga" readonly class="bg-gray-100 px-4 py-1.5 rounded-full text-xs font-bold text-orange-600 min-w-[150px] text-center focus:outline-none border-none">
                        <input type="hidden" id="total_harga_raw" name="harga_total">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Keterangan:</span>
                    <input type="text" name="keterangan" placeholder="Contoh: Sendok plastik dipisah..." class="bg-gray-100 px-4 py-1.5 rounded-full text-xs w-full max-w-sm text-left focus:outline-none focus:ring-1 ring-orange-300">
                </div>
            </div>

            <div class="w-full flex justify-between items-center pt-2">
                <a href="{{ route('pembeli-beranda') }}" class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                    Kembali
                </a>
                <button type="submit" class="bg-[#CBD5E1] text-gray-700 px-16 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                    Bayar
                </button>
            </div>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const qtyRegulerInput = document.getElementById('qty_reguler');
            const qtyJumboInput = document.getElementById('qty_jumbo');
            const toppingSelect = document.getElementById('topping_select');
            const totalHargaDisplay = document.getElementById('total_harga');
            const totalHargaRaw = document.getElementById('total_harga_raw');

            const HARGA_REGULER = {{ $menu->harga }}; 
            const BIAYA_TAMBAHAN_JUMBO = 4000;

            function hitungTotal() {
                const qtyReguler = parseInt(qtyRegulerInput.value) || 0;
                const qtyJumbo = parseInt(qtyJumboInput.value) || 0;
                const toppingValue = toppingSelect.value;

                const totalHargaReguler = qtyReguler * HARGA_REGULER;
                const totalHargaJumbo = qtyJumbo * (HARGA_REGULER + BIAYA_TAMBAHAN_JUMBO);

                let total = totalHargaReguler + totalHargaJumbo;

                let totalPorsi = qtyReguler + qtyJumbo;
                if (totalPorsi > 0) {
                    if (toppingValue === 'Telur' || toppingValue === 'Kerupuk') {
                        total += (4000 * totalPorsi);
                    } else if (toppingValue === 'Kulit') {
                        total += (3000 * totalPorsi);
                    }
                }

                const formatted = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(total);

                totalHargaDisplay.value = formatted.replace('Rp', 'Rp ');
                totalHargaRaw.value = total;
            }

            qtyRegulerInput.addEventListener('input', hitungTotal);
            qtyJumboInput.addEventListener('input', hitungTotal);
            toppingSelect.addEventListener('change', hitungTotal);

            hitungTotal();
        });
    </script>
</body>
</html>