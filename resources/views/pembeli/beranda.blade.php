@include('pembeli.nav')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] pb-10">
    <div class="px-4 mb-6 mt-4">
        <input type="text" id="search-menu" placeholder="Cari Mie Pangsit..." 
               class="w-full p-4 rounded-xl shadow-inner border-none focus:ring-2 ring-orange-200">
    </div>

    <main class="px-4">
        <h2 class="text-2xl font-bold mb-4" data-translate="title_recommendation">Rekomendasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($menus as $menu)
            <div class="card-item bg-white p-3 rounded-2xl shadow-md flex gap-3 relative transition-all duration-300">
                <div class="w-24 h-24 bg-gray-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <span class="text-[10px] font-bold text-gray-400 uppercase">Foto</span>
                </div>
                <div class="flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="card-title font-bold text-lg leading-tight text-gray-900">{{ $menu->nama_menu }}</h3>
                        
                        <span class="text-xs font-bold text-orange-500 block mt-0.5">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                        <p class="text-[11px] text-gray-500 mt-1 line-clamp-2" data-translate="desc_menu">
                            {{ $menu->deskripsi ?? 'Menu sedap sekali' }}
                        </p>
                    </div>
                    <a href="{{ route('pembeli-detail', $menu->menu_id) }}" class="text-right text-sm font-semibold text-blue-600 hover:text-blue-800 transition-all" data-translate="btn_see_detail">Pesan</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search-menu');
            
            searchInput.value = localStorage.getItem('last_keyword') || '';

            const doFilter = () => {
                const val = searchInput.value.toLowerCase();
                localStorage.setItem('last_keyword', val);

                document.querySelectorAll('.card-item').forEach(card => {
                    const title = card.querySelector('.card-title').innerText.toLowerCase();
                    if (title.includes(val)) {
                        card.style.display = 'flex';
                        card.style.opacity = '1';
                    } else {
                        card.style.display = 'none';
                        card.style.opacity = '0';
                    }
                });
            };

            searchInput.addEventListener('input', doFilter);
            doFilter();
        });
    </script>
</body>
</html>