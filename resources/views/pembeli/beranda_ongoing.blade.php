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

    <div class="max-w-md mx-auto p-4 space-y-8">
        
        <div class="space-y-4">
            <h2 class="text-lg font-bold text-gray-900">Pesanan Berlangsung</h2>
            
            <div class="bg-white rounded-2xl p-4 shadow-sm flex items-center justify-between border border-orange-100 relative h-28">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#D9D9D9] rounded-xl flex items-center justify-center">
                        <span class="text-[8px] text-gray-400 font-bold uppercase">Gambar</span>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <h3 class="font-bold text-sm text-gray-900 leading-tight">Mie Pangsit</h3>
                        <p class="text-[7px] text-gray-500 leading-tight break-words">Mie Pangsit sedap sekali</p>
                    </div>
                </div>

                <div class="text-right">
                    <p class="text-xs font-bold text-gray-900">Rp25.000</p>
                </div>

                <a href="{{ route('pembeli-detail-pesanan') }}" class="absolute bottom-3 right-4 text-black font-bold text-[10px] hover:underline">
                    Lihat Detail
                </a>
            </div>
        </div>

        <div class="space-y-4">
            <h2 class="text-lg font-bold text-gray-900">Rekomendasi</h2>
            
            <div class="grid grid-cols-3 gap-2">
                <div class="bg-white rounded-xl p-2 shadow-sm relative flex items-start gap-2 h-24 border border-gray-50 overflow-hidden">
                    <div class="w-10 h-10 bg-[#D9D9D9] rounded-lg flex-none flex items-center justify-center text-gray-400 text-[6px] font-bold">Gbr</div>
                    <div class="flex flex-col min-w-0">
                        <h3 class="font-bold text-[9px] text-gray-900 truncate">Mie Pangsit</h3>
                        <p class="text-[7px] text-gray-500 leading-tight break-words">Mie Pangsit sedap sekali</p>
                    </div>
                    <p class="absolute bottom-1 right-2 text-blue-600 font-extrabold text-[8px] uppercase">Pesan</p>
                </div>

                <div class="bg-white rounded-xl p-2 shadow-sm relative flex items-start gap-2 h-24 border border-gray-50 overflow-hidden">
                    <div class="w-10 h-10 bg-[#D9D9D9] rounded-lg flex-none flex items-center justify-center text-gray-400 text-[6px] font-bold">Gbr</div>
                    <div class="flex flex-col min-w-0">
                        <h3 class="font-bold text-[9px] text-gray-900 truncate">Nasi Ayam Katsu</h3>
                        <p class="text-[7px] text-gray-500 leading-tight break-words">Nasi Ayam Katsu sedap sekali</p>
                    </div>
                    <p class="absolute bottom-1 right-2 text-blue-600 font-extrabold text-[8px] uppercase">Pesan</p>
                </div>

                <div class="bg-white rounded-xl p-2 shadow-sm relative flex items-start gap-2 h-24 border border-gray-50 overflow-hidden">
                    <div class="w-10 h-10 bg-[#D9D9D9] rounded-lg flex-none flex items-center justify-center text-gray-400 text-[6px] font-bold">Gbr</div>
                    <div class="flex flex-col min-w-0">
                        <h3 class="font-bold text-[9px] text-gray-900 truncate">Mie Ayam</h3>
                        <p class="text-[7px] text-gray-500 leading-tight break-words">Mie Ayam sedap sekali</p>
                    </div>
                    <p class="absolute bottom-1 right-2 text-blue-600 font-extrabold text-[8px] uppercase">Pesan</p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>