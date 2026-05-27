@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="title_detail">Detail Menu - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen">
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">{{ $menu->nama_menu }}</h1>

        <div class="bg-white p-5 rounded-3xl shadow-lg flex flex-col md:flex-row gap-6 mb-6">
            <div class="w-full md:w-1/2 h-48 bg-orange-50 rounded-2xl flex items-center justify-center border-2 border-dashed border-orange-200 flex-shrink-0">
                <span class="text-orange-400 font-bold uppercase tracking-widest text-center text-xs px-4">
                    📸 Foto {{ $menu->nama_menu }}
                </span>
            </div>

            <div class="flex-1 flex flex-col justify-between">
                <div>
                    <h4 class="font-bold text-lg text-gray-800 mb-1" data-translate="label_desc">Deskripsi</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        <span class="font-semibold text-orange-600">{{ $menu->nama_menu }}</span> 
                        adalah salah satu menu yang cukup digemari pelanggan, terlebih karena rasanya yang gurih dan aromanya yang menggugah selera.
                    </p>
                </div>
                
                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                    <div>
                        <span class="text-2xl font-extrabold text-orange-500 block">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                        <span class="text-[11px] text-gray-400 block font-medium">📦 Sisa Stok: {{ $menu->stok }} Porsi</span>
                    </div>
                    @if($menu->status == 'tersedia')
                        <span class="bg-green-100 text-green-700 text-[10px] px-2.5 py-1 rounded-full font-bold uppercase tracking-wider">Tersedia</span>
                    @else
                        <span class="bg-red-100 text-red-700 text-[10px] px-2.5 py-1 rounded-full font-bold uppercase tracking-wider">Habis</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="border-2 border-dashed border-orange-300 rounded-2xl p-4 bg-white/60 mb-10 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                
                <div class="bg-white/80 border border-orange-100 p-3 rounded-xl text-center shadow-inner">
                    <h5 class="font-bold mb-2 text-gray-800 text-sm" data-translate="label_price_detail">Pilihan Porsi</h5>
                    <p class="text-[11px] text-gray-600">Reguler: Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    @if(isset($menu->harga_jumbo))
                        <p class="text-[11px] text-gray-600">Jumbo: + Rp {{ number_format($menu->harga_jumbo - $menu->harga, 0, ',', '.') }}</p>
                    @else
                        <p class="text-[11px] text-gray-400 italic">Porsi jumbo tidak tersedia</p>
                    @endif
                </div>

                <div class="bg-white/80 border border-orange-100 p-3 rounded-xl text-center shadow-inner">
                    <h5 class="font-bold mb-2 text-gray-800 text-sm" data-translate="label_topping">Topping Ekstra</h5>
                    @if(!empty($menu->deskripsi))
                        <p class="text-[11px] text-gray-600 font-medium leading-relaxed">
                            {{ $menu->deskripsi }}
                        </p>
                    @else
                        <p class="text-[11px] text-gray-500 italic">Original (Tanpa Topping)</p>
                    @endif
                </div>

                <div class="bg-white/80 border border-orange-100 p-3 rounded-xl text-center shadow-inner">
                    <h5 class="font-bold mb-2 text-gray-800 text-sm" data-translate="label_spicy_level">Level Pedas</h5>
                    <p class="text-[11px] text-gray-600 font-medium text-orange-600">
                        Level 0 s/d {{ $menu->max_pedas ?? '3' }}
                    </p>
                    <p class="text-[10px] text-gray-400 mt-1">*Tulis di catatan checkout</p>
                </div>
            </div>

            <div class="space-y-3 bg-white/40 p-3 rounded-xl border border-orange-50">
                <h5 class="font-bold italic text-gray-700 text-sm" data-translate="label_review">Review Lapak</h5>
                <div class="text-xs space-y-2 text-gray-600">
                    @if(isset($menu->toko->ratings) && $menu->toko->ratings->count() > 0)
                        @foreach($menu->toko->ratings->take(3) as $rating)
                            <p class="bg-white/80 p-2 rounded-lg">
                                ⭐ {{ number_format($rating->nilai, 1) }} 
                                <strong>{{ $rating->user->nama ?? 'Pelanggan' }}:</strong> 
                                {{ $rating->ulasan ?? 'Tidak ada komentar.' }}
                            </p>
                        @endforeach
                    @else
                        <p class="bg-white/80 p-2 rounded-lg italic text-gray-400 text-center">Belum ada ulasan untuk lapak ini.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center px-2 mb-6">
            <a href="{{ route('pembeli-beranda') }}" class="bg-white border text-gray-700 px-8 py-2 rounded-xl font-bold transition hover:bg-gray-100 shadow-sm text-sm" data-translate="btn_back">
                Kembali
            </a>
            <a href="{{ route('pembeli-checkout', $menu->menu_id) }}" class="bg-orange-500 text-white px-10 py-2 rounded-xl font-bold transition hover:bg-orange-600 shadow-md text-sm" data-translate="btn_order">
                Pesan
            </a>
        </div>
    </div>
</body>
</html>