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
        <div id="target-container-menu" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputCari = document.getElementById('search-menu');
            const menuGrid = document.getElementById('target-container-menu');
            
            inputCari.value = localStorage.getItem('last_keyword') || '';

            const eksekusiAjaxFetchSearch = () => {
                const keywordValue = inputCari.value;
                localStorage.setItem('last_keyword', keywordValue);

                const urlSearch = `{{ route('api.pembeli.search-menu') }}?keyword=${encodeURIComponent(keywordValue)}`;

                fetch(urlSearch)
                .then(response => response.json())
                .then(menus => {
                    menuGrid.innerHTML = ''; 

                    if(menus.length === 0) {
                        menuGrid.innerHTML = `<p class="col-span-3 text-center text-xs text-gray-400 py-12">Makanan tidak ditemukan...</p>`;
                        return;
                    }

                    menus.forEach(menu => {
                        const formatRupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(menu.harga);
                        const detailUrl = `{{ url('/pembeli/detail') }}/${menu.menu_id}`;
                        const deskripsiMenu = menu.deskripsi ? menu.deskripsi : 'Menu sedap sekali';

                        const componentHTML = `
                            <div class="card-item bg-white p-3 rounded-2xl shadow-md flex gap-3 relative transition-all duration-300">
                                <div class="w-24 h-24 bg-gray-200 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase">Foto</span>
                                </div>
                                <div class="flex flex-col justify-between flex-1">
                                    <div>
                                        <h3 class="card-title font-bold text-lg leading-tight text-gray-900">${menu.nama_menu}</h3>
                                        <span class="text-xs font-bold text-orange-500 block mt-0.5">${formatRupiah}</span>
                                        <p class="text-[11px] text-gray-500 mt-1 line-clamp-2">
                                            ${deskripsiMenu}
                                        </p>
                                    </div>
                                    <a href="${detailUrl}" class="text-right text-sm font-semibold text-blue-600 hover:text-blue-800 transition-all">Pesan</a>
                                </div>
                            </div>
                        `;
                        menuGrid.insertAdjacentHTML('beforeend', componentHTML);
                    });
                })
                .catch(err => console.error("Gagal menarik data pencarian AJAX:", err));
            };

            inputCari.addEventListener('input', eksekusiAjaxFetchSearch);
            eksekusiAjaxFetchSearch();
        });
    </script>
</body>
</html>
