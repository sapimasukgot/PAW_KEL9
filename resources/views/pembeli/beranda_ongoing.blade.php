<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Pesanan Berlangsung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;">
    @include('pembeli.nav')

    <div class="p-6 flex flex-col items-start space-y-8 w-full">
        
        <div class="w-full"> 
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" 
                       placeholder="Cari Makanan dan Minuman/Nama Toko" 
                       class="w-full bg-white border-none rounded-full py-3.5 pl-12 pr-4 shadow-sm focus:outline-none text-sm">
            </div>
        </div>

        <div class="w-full space-y-4">
            <h2 class="text-xl font-bold text-gray-900">Pesanan Berlangsung</h2>
            
            <div class="bg-white rounded-3xl p-5 shadow-sm flex items-center border border-orange-100 relative w-full max-w-3xl h-32">
                <div class="flex items-center gap-5">
                    <div class="w-20 h-20 bg-[#D9D9D9] rounded-2xl flex-none flex items-center justify-center">
                        <span class="text-[10px] text-gray-400 font-bold uppercase">Gambar</span>
                    </div>
                    <div class="flex flex-col items-start">
                        <h3 class="font-bold text-lg text-gray-900 leading-tight">Mie Pangsit</h3>
                        <p class="text-sm text-gray-500">Mie Pangsit sedap sekali</p>
                    </div>
                </div>

                <p class="absolute top-5 right-6 font-bold text-lg text-gray-900">Rp25.000</p>

                <a href="{{ route('pembeli-detail-pesanan') }}" class="absolute bottom-5 right-6 text-black font-extrabold text-xs hover:underline">
                    Lihat Detail
                </a>
            </div>
        </div>

        <div class="w-full space-y-4">
            <h2 class="text-xl font-bold text-gray-900">Rekomendasi</h2>
            
            <div class="grid grid-cols-3 gap-3 w-full">
                
                <div class="bg-white rounded-2xl p-4 shadow-sm flex items-center border border-gray-50 relative h-28 w-full overflow-hidden">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-14 h-14 bg-[#D9D9D9] rounded-xl flex-none flex items-center justify-center">
                            <span class="text-[8px] text-gray-400 font-bold uppercase">Gbr</span>
                        </div>
                        <div class="flex flex-col items-start min-w-0">
                            <h3 class="font-bold text-xs text-gray-900 truncate w-full">Mie Pangsit</h3>
                            <p class="text-[10px] text-gray-500 leading-tight truncate w-full mt-0.5">Mie Pangsit Sedap sekali</p>
                        </div>
                    </div>
                    <p class="absolute bottom-3 right-4 text-blue-600 font-black text-[10px] uppercase cursor-pointer italic">PESAN</p>
                </div>

                <div class="bg-white rounded-2xl p-4 shadow-sm flex items-center border border-gray-50 relative h-28 w-full overflow-hidden">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-14 h-14 bg-[#D9D9D9] rounded-xl flex-none flex items-center justify-center">
                            <span class="text-[8px] text-gray-400 font-bold uppercase">Gbr</span>
                        </div>
                        <div class="flex flex-col items-start min-w-0">
                            <h3 class="font-bold text-xs text-gray-900 truncate w-full">Ayam Katsu</h3>
                            <p class="text-[10px] text-gray-500 leading-tight truncate w-full mt-0.5">Ayam Katsu sedap sekali</p>
                        </div>
                    </div>
                    <p class="absolute bottom-3 right-4 text-blue-600 font-black text-[10px] uppercase cursor-pointer italic">PESAN</p>
                </div>

                <div class="bg-white rounded-2xl p-4 shadow-sm flex items-center border border-gray-50 relative h-28 w-full overflow-hidden">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-14 h-14 bg-[#D9D9D9] rounded-xl flex-none flex items-center justify-center">
                            <span class="text-[8px] text-gray-400 font-bold uppercase">Gbr</span>
                        </div>
                        <div class="flex flex-col items-start min-w-0">
                            <h3 class="font-bold text-xs text-gray-900 truncate w-full">Mie Ayam</h3>
                            <p class="text-[10px] text-gray-500 leading-tight truncate w-full mt-0.5">Mie Ayam sedap sekali</p>
                        </div>
                    </div>
                    <p class="absolute bottom-3 right-4 text-blue-600 font-black text-[10px] uppercase cursor-pointer italic">PESAN</p>
                </div>

            </div>
        </div>

    </div>
</body>
</html>