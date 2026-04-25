<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Detail Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;">
    @include('pembeli.nav')

    <div class="w-full p-6 flex flex-col items-start min-h-screen">
        
        <h1 class="text-2xl font-bold text-gray-900 mb-8 self-center">Terima Kasih Sudah Memesan! Selamat Menikmati!</h1>

        <div class="w-full flex flex-row gap-6 mb-6">
            <div class="w-1/2 h-72 bg-gray-300 rounded-3xl overflow-hidden shadow-md">
                <img src="https://via.placeholder.com/600x400" alt="Mie Pangsit" class="w-full h-full object-cover">
            </div>

            <div class="w-1/2 bg-white rounded-3xl p-6 shadow-sm border border-orange-100 flex flex-col justify-center">
                <h2 class="font-bold text-gray-900 mb-4">Detail Menu:</h2>
                <div class="space-y-3">
                    <div class="flex items-center gap-4">
                        <span class="w-28 text-sm font-bold">Reguler:</span>
                        <span class="bg-gray-200 px-8 py-1 rounded-lg text-sm font-bold">1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-28 text-sm font-bold">Jumbo:</span>
                        <span class="bg-gray-200 px-8 py-1 rounded-lg text-sm font-bold">1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-28 text-sm font-bold">Topping:</span>
                        <span class="bg-gray-200 px-8 py-1 rounded-lg text-sm font-bold">Telur</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-28 text-sm font-bold">Level Pedas:</span>
                        <span class="bg-gray-200 px-8 py-1 rounded-lg text-sm font-bold">Lvl 0</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full bg-white rounded-3xl p-8 shadow-sm border border-orange-100 mb-12">
            <h2 class="font-bold text-lg text-gray-900 mb-6">Detail Pesanan</h2>
            <div class="space-y-4">
                <div class="flex items-center gap-10">
                    <span class="w-32 text-sm font-bold">Nama:</span>
                    <span class="bg-gray-100 px-12 py-2 rounded-2xl text-sm min-w-[200px] inline-block text-center">Aan</span>
                </div>
                <div class="flex items-center gap-10">
                    <span class="w-32 text-sm font-bold">No. Meja:</span>
                    <span class="bg-gray-100 px-12 py-2 rounded-2xl text-sm min-w-[200px] inline-block text-center">1</span>
                </div>
                <div class="flex items-center gap-10">
                    <span class="w-32 text-sm font-bold">Harga:</span>
                    <span class="bg-gray-100 px-12 py-2 rounded-2xl text-sm font-bold min-w-[200px] inline-block text-center">Rp 32.000</span>
                </div>
                <div class="flex items-center gap-10">
                    <span class="w-32 text-sm font-bold">Keterangan:</span>
                    <span class="bg-gray-100 px-12 py-2 rounded-2xl text-sm font-bold text-gray-600 italic min-w-[200px] inline-block text-center">Selesai</span>
                </div>
            </div>
        </div>

        <div class="w-full flex justify-between items-center mb-10">
            <a href="{{ route('pembeli-beranda') }}" class="bg-[#D9D9D9] text-gray-900 px-16 py-2 rounded-md font-bold hover:bg-gray-400 transition-all">
                Kembali
            </a>

            <a href="{{ route('pembeli-rating', ['id' => 1]) }}" class="bg-[#D9D9D9] text-gray-900 px-16 py-2 rounded-md font-bold hover:bg-gray-400 transition-all">
                Beri Rating
            </a>
        </div>

    </div>
</body>
</html>