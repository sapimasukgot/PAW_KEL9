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
            <div class="w-full h-44 bg-gray-300 rounded-xl overflow-hidden shadow-sm flex items-center justify-center">
                <span class="text-gray-400 text-xs font-bold uppercase tracking-widest">📸 Foto
                    {{ $menu->nama_menu }}</span>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm flex flex-col justify-start">
                <h4 class="font-bold text-sm text-gray-800 mb-1">Deskripsi</h4>
                <p class="text-xs text-gray-600 leading-relaxed">
                    @if($menu->deskripsi)
                        {{ $menu->deskripsi }}
                    @else
                        <span class="italic text-gray-400">Tidak ada deskripsi untuk menu ini.</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="bg-white rounded-xl p-4 shadow-sm">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Harga</h4>
                <div class="text-xs text-gray-600 space-y-1">
                    <p>Reguler: Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    @if($menu->tambahan_jumbo && $menu->tambahan_jumbo > 0)
                        <p>Jumbo: Rp {{ number_format($menu->harga + $menu->tambahan_jumbo, 0, ',', '.') }}
                            <span class="text-gray-400 text-[10px]">(+Rp
                                {{ number_format($menu->tambahan_jumbo, 0, ',', '.') }})</span>
                        </p>
                    @else
                        <p class="text-gray-400 italic">Tidak ada pilihan jumbo</p>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Topping</h4>
                <div class="text-xs text-gray-600 space-y-1">
                    @if($menu->topping)
                        @foreach(array_map('trim', explode(',', $menu->topping)) as $top)
                            @php
                                $parts = explode(':', $top);
                                $namaTop = trim($parts[0]);
                                $hargaTop = isset($parts[1]) ? (int) trim($parts[1]) : 0;
                            @endphp
                            <p>{{ $namaTop }} @if($hargaTop > 0)<span class="text-orange-500 font-bold">+Rp
                            {{ number_format($hargaTop, 0, ',', '.') }}</span>@endif</p>
                        @endforeach
                    @else
                        <p class="text-gray-400 italic">Tidak ada topping untuk menu ini</p>
                    @endif
                </div>
            </div>
        </div>

        <form action="{{ route('pembeli-checkout.store', $menu->menu_id) }}" method="POST" class="space-y-4">
            @csrf

            @if($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded-xl text-xs">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Menu</h4>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Reguler:</span>
                    <input type="number" id="qty_reguler" name="qty_reguler" value="0" min="0" max="{{ $menu->stok }}"
                        class="bg-gray-200 px-3 py-1 rounded-lg text-xs font-bold w-20 text-center focus:outline-none shadow-sm">
                </div>

                @if($menu->tambahan_jumbo && $menu->tambahan_jumbo > 0)
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-xs font-bold text-gray-700">Jumbo:</span>
                        <input type="number" id="qty_jumbo" name="qty_jumbo" value="0" min="0" max="{{ $menu->stok }}"
                            class="bg-gray-200 px-3 py-1 rounded-lg text-xs font-bold w-20 text-center focus:outline-none shadow-sm">
                    </div>
                @else
                    <input type="hidden" id="qty_jumbo" name="qty_jumbo" value="0">
                @endif

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Topping:</span>
                    @if($menu->topping)
                        @php
                            $toppingList = array_map('trim', explode(',', $menu->topping));
                            $toppingData = [];
                            foreach ($toppingList as $top) {
                                $parts = explode(':', $top);
                                $toppingData[] = [
                                    'nama' => trim($parts[0]),
                                    'harga' => isset($parts[1]) ? (int) trim($parts[1]) : 0,
                                ];
                            }
                        @endphp
                        <select id="topping_select" name="topping"
                            class="bg-gray-200 px-3 py-1 rounded-lg text-xs font-bold w-48 text-center focus:outline-none shadow-sm cursor-pointer">
                            <option value="-" data-harga="0">Tanpa Topping</option>
                            @foreach($toppingData as $top)
                                <option value="{{ $top['nama'] }}" data-harga="{{ $top['harga'] }}">
                                    {{ $top['nama'] }} @if($top['harga'] > 0)(+Rp
                                    {{ number_format($top['harga'], 0, ',', '.') }})@endif
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="hidden" name="topping" value="-">
                        <span class="text-xs text-gray-400 italic">Tidak bisa menambah topping untuk menu ini</span>
                    @endif
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Level Pedas:</span>
                    <select name="level_pedas"
                        class="bg-gray-200 px-3 py-1 rounded-lg text-xs font-bold w-24 text-center focus:outline-none shadow-sm cursor-pointer">
                        <option value="Lvl 0">Lvl 0</option>
                        <option value="Lvl 1">Lvl 1</option>
                        <option value="Lvl 2">Lvl 2</option>
                    </select>
                </div>

                <p class="text-xs text-gray-400">Stok tersisa: <span class="font-bold text-gray-600">{{ $menu->stok }}
                        porsi</span></p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Pesanan</h4>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Nama:</span>
                    <input type="text" name="nama_pembeli" value="{{ Auth::user()->name }}" required
                        class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none focus:ring-1 ring-orange-300">
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">No. Meja:</span>
                    <input type="number" name="no_meja" value="1" required
                        class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none focus:ring-1 ring-orange-300">
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Harga:</span>
                    <input type="text" id="total_harga" readonly
                        class="bg-gray-100 px-4 py-1.5 rounded-full text-xs font-bold text-orange-600 min-w-[150px] text-center focus:outline-none border-none">
                    <input type="hidden" id="total_harga_raw" name="harga_total">
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Keterangan:</span>
                    <input type="text" name="keterangan" placeholder="Contoh: Sendok plastik dipisah..."
                        class="bg-gray-100 px-4 py-1.5 rounded-full text-xs w-full max-w-sm text-left focus:outline-none focus:ring-1 ring-orange-300">
                </div>
            </div>

            <div class="w-full flex justify-between items-center pt-2">
                <a href="{{ route('pembeli-beranda') }}"
                    class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                    Kembali
                </a>
                <button type="submit"
                    class="bg-orange-500 text-white px-16 py-1.5 rounded-lg font-semibold hover:bg-orange-600 transition-all text-xs shadow-sm">
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
            const TAMBAHAN_JUMBO = {{ $menu->tambahan_jumbo ?? 0 }};

            function hitungTotal() {
                const qtyReguler = parseInt(qtyRegulerInput.value) || 0;
                const qtyJumbo = qtyJumboInput ? (parseInt(qtyJumboInput.value) || 0) : 0;
                const totalPorsi = qtyReguler + qtyJumbo;

                let total = (qtyReguler * HARGA_REGULER) + (qtyJumbo * (HARGA_REGULER + TAMBAHAN_JUMBO));

                if (toppingSelect && totalPorsi > 0) {
                    const hargaTopping = parseInt(toppingSelect.selectedOptions[0].dataset.harga) || 0;
                    total += hargaTopping * totalPorsi;
                }

                const formatted = new Intl.NumberFormat('id-ID', {
                    style: 'currency', currency: 'IDR', minimumFractionDigits: 0
                }).format(total);

                totalHargaDisplay.value = formatted.replace('Rp', 'Rp ');
                totalHargaRaw.value = total;
            }

            qtyRegulerInput.addEventListener('input', hitungTotal);
            if (qtyJumboInput) qtyJumboInput.addEventListener('input', hitungTotal);
            if (toppingSelect) toppingSelect.addEventListener('change', hitungTotal);

            hitungTotal();
        });
    </script>
</body>

</html>