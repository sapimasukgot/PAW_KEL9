@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;">

    <div class="p-6 flex flex-col items-start space-y-8 w-full">
        <div class="w-full"> 
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" 
                       id="search-all"
                       data-translate="holder_search_all"
                       placeholder="Cari Makanan dan Minuman..." 
                       class="w-full bg-white border-none rounded-full py-3.5 pl-12 pr-4 shadow-sm focus:outline-none text-sm">
            </div>
        </div>
        <div class="w-full space-y-4">
            <h2 class="text-xl font-bold text-gray-900" data-translate="title_ongoing">Pesanan Berlangsung</h2>
            
            <div class="space-y-3">
                @forelse($pesanans as $pesanan)
                <div class="bg-white rounded-3xl p-5 shadow-sm flex items-center border border-orange-100 relative w-full max-w-3xl h-32">
                    <div class="flex items-center gap-5">
                        <div class="w-20 h-20 bg-orange-100 rounded-2xl flex-none flex items-center justify-center">
                            <span class="text-2xl">🛍️</span>
                        </div>
                        <div class="flex flex-col items-start">
                            <h3 class="font-bold text-lg text-gray-900 leading-tight">
                                Pesanan An. {{ $pesanan->nama_pembeli }}
                            </h3>
                            <p class="text-xs text-gray-400 mt-1">Meja: {{ $pesanan->no_meja }} | Status: <span class="text-orange-500 font-semibold">{{ $pesanan->status }}</span></p>
                        </div>
                    </div>

                    <p class="absolute top-5 right-6 font-extrabold text-lg text-gray-900">
                        Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                    </p>
                    <a href="{{ route('pembeli-detail-pesanan', $pesanan->pesanan_id ?? $pesanan->id) }}" class="absolute bottom-5 right-6 text-black font-extrabold text-xs hover:underline">
                        <span data-translate="btn_see_detail">Lihat Detail</span>
                    </a>
                </div>
                @empty
                <div class="bg-white/50 rounded-2xl p-6 text-center border border-dashed border-gray-300 w-full max-w-3xl">
                    <p class="text-sm text-gray-500">Tidak ada transaksi atau pesanan yang sedang berlangsung.</p>
                </div>
                @endforelse
            </div>
        </div>
        <div class="w-full space-y-4">
            <h2 class="text-xl font-bold text-gray-900" data-translate="title_recommendation">Rekomendasi</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 w-full">
                @forelse($menus as $menu)
                <div class="card-item bg-white rounded-2xl p-4 shadow-sm flex items-center border border-gray-50 relative h-28 w-full overflow-hidden transition-all duration-200 hover:border-orange-200">
                    <div class="flex items-center gap-3 min-w-0 w-full pr-16">
                        <div class="w-14 h-14 bg-orange-50 rounded-xl flex-none flex items-center justify-center text-xl">
                            🍜
                        </div>
                        <div class="flex flex-col items-start min-w-0 w-full">
                            <h3 class="card-title font-bold text-sm text-gray-900 truncate w-full">{{ $menu->nama_menu }}</h3>
                            <span class="text-[11px] font-bold text-orange-500 block">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                            <p class="text-[10px] text-gray-400 leading-tight truncate w-full mt-0.5">
                                {{ $menu->deskripsi ?? 'Menu sedap dan gurih khas MakanMart' }}
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('pembeli-detail', $menu->menu_id) }}" class="absolute bottom-3 right-4 text-blue-600 font-black text-[11px] uppercase tracking-wider hover:text-blue-800 italic" data-translate="btn_order_now">
                        PESAN
                    </a>
                </div>
                @empty
                <div class="col-span-3 bg-white rounded-2xl p-8 text-center text-gray-400 text-sm shadow-sm">
                    Belum ada menu terdaftar yang tersedia saat ini.
                </div>
                @endforelse

            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search-all');
            
            const doFilter = () => {
                const query = searchInput.value.toLowerCase().trim();

                document.querySelectorAll('.card-item').forEach(card => {
                    const title = card.querySelector('.card-title').innerText.toLowerCase();
                    if (title.includes(query)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            };

            searchInput.addEventListener('input', doFilter);
        });
    </script>
</body>
</html>
