@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] pb-10">
    <div class="px-4 mb-6 mt-4">
        <input type="text" placeholder="Cari Makanan dan Minuman/Nama Toko" 
               class="w-full p-3 rounded-lg shadow-inner focus:outline-none border-none">
    </div>

    <main class="px-4">
        <h2 class="text-2xl font-bold mb-4">Rekomendasi</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($menus as $menu)
            <div class="bg-white p-3 rounded-2xl shadow-md flex gap-3 relative">
                <div class="w-24 h-24 bg-gray-200 rounded-xl flex items-center justify-center text-center p-2 shadow-inner">
                    <span class="text-[10px] font-bold text-gray-500 uppercase leading-tight">
                        Foto {{ $menu['nama'] }}
                    </span>
                </div>

                <div class="flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="font-bold text-lg leading-tight">{{ $menu['nama'] }}</h3>
                        <p class="text-xs text-gray-500">{{ $menu['nama'] }} sedap sekali</p>
                    </div>
                    <a href="{{ route('pembeli-detail', $menu['id']) }}" 
                       class="text-right text-sm font-semibold text-blue-600 self-end mt-2">Pesan</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>