<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Berikan Rating</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .star-rating label:hover,
        .star-rating label:hover ~ label { color: #FBBF24; }
        .star-rating input:checked ~ label { color: #FBBF24; }
    </style>
</head>
<body style="background-color: #FFEDD9;">
    @include('pembeli.nav')

    <div class="w-full p-6 flex flex-col min-h-screen">
        
        <h1 class="text-2xl font-bold text-gray-900 mb-8">Rangkuman Pesanan</h1>

        <div class="flex flex-row gap-6 mb-10 w-full">
            <div class="w-1/2 bg-white rounded-3xl p-6 shadow-sm border border-orange-100">
                <h2 class="font-bold text-gray-900 mb-4">Detail Menu</h2>
                <div class="space-y-3">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold">Reguler:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold">1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold">Jumbo:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold">1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold">Topping:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold">Telur</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold">Level Pedas:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold">Lvl 0</span>
                    </div>
                </div>
            </div>

            <div class="w-1/2 bg-white rounded-3xl p-6 shadow-sm border border-orange-100">
                <div class="space-y-3 mt-8">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold">Nama:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm">Aan</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold">No. Meja:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm">1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold">Harga:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold">Rp32.000</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold">Keterangan:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold text-gray-600 italic">Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col items-center space-y-4 mb-10">
            <h2 class="text-xl font-bold text-gray-900">Berikan Rating Pesanan</h2>
            
            <div class="flex flex-row-reverse justify-center gap-2 star-rating">
                <input type="radio" id="star5" name="rating" value="5" class="hidden" />
                <label for="star5" class="cursor-pointer text-4xl text-gray-300">★</label>
                <input type="radio" id="star4" name="rating" value="4" class="hidden" />
                <label for="star4" class="cursor-pointer text-4xl text-gray-300">★</label>
                <input type="radio" id="star3" name="rating" value="3" class="hidden" />
                <label for="star3" class="cursor-pointer text-4xl text-gray-300">★</label>
                <input type="radio" id="star2" name="rating" value="2" class="hidden" />
                <label for="star2" class="cursor-pointer text-4xl text-gray-300">★</label>
                <input type="radio" id="star1" name="rating" value="1" class="hidden" />
                <label for="star1" class="cursor-pointer text-4xl text-gray-300">★</label>
            </div>

            <div class="w-full mt-6">
                <label class="block text-lg font-bold text-gray-900 mb-2">Ulasan</label>
                <textarea 
                    class="w-full h-32 p-4 rounded-2xl border border-orange-100 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-300"
                    placeholder="Masukkan ulasan Anda di sini..."
                ></textarea>
            </div>
        </div>

        <div class="w-full flex justify-between items-center mb-10">
            <a href="{{ route('pembeli-beranda') }}" class="bg-[#D9D9D9] text-gray-900 px-16 py-2 rounded-md font-bold hover:bg-gray-400 transition-all">
                Kembali
            </a>
            <a href="{{ route('pembeli-thanks') }}" class="bg-[#D9D9D9] text-gray-900 px-16 py-2 rounded-md font-bold hover:bg-gray-400 transition-all">
                Kirim
            </a>
        </div>
    </div>
</body>
</html>