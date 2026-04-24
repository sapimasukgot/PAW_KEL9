<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Detail Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;">
    <div class="max-w-md mx-auto min-h-screen flex flex-col p-6">
        
        <div class="mb-6">
            <a href="{{ route('pembeli-detail-pesanan') }}" class="inline-flex items-center justify-center w-10 h-10 bg-white rounded-full shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        </div>

        <h1 class="text-2xl font-bold text-gray-900 mb-8">Detail Pesanan</h1>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-orange-100 flex-grow mb-8">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Detail Pesanan</h2>
            
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-[#D9D9D9] rounded-xl flex items-center justify-center">
                            <span class="text-[8px] text-gray-400 font-bold uppercase">Gambar</span>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-gray-900">Mie Pangsit</p>
                            <p class="text-[10px] text-gray-500">1x</p>
                        </div>
                    </div>
                    <p class="text-sm font-bold text-gray-900">Rp25.000</p>
                </div>

                <hr class="border-gray-100">

                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-bold text-gray-900">Rp25.000</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Biaya Layanan</span>
                        <span class="font-bold text-gray-900">Rp2.000</span>
                    </div>
                </div>

                <hr class="border-gray-100">

                <div class="flex justify-between items-center pt-2">
                    <span class="text-base font-bold text-gray-900">Total</span>
                    <span class="text-lg font-extrabold text-gray-900">Rp27.000</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>