<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berlangsung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    @include('pembeli.nav')

    <div class="max-w-md mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Pesanan Anda</h2>
        
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center text-2xl">🍜</div>
                <div>
                    <h3 class="font-bold text-lg text-gray-800">{{ $ongoing['nama'] ?? 'Mie Pangsit' }}</h3>
                    <p class="text-orange-500 font-medium text-sm">{{ $ongoing['status'] ?? 'Menunggu Pembayaran' }}</p>
                </div>
            </div>
            
            <div class="pt-4 border-t border-gray-50">
                <a href="{{ route('pembeli-pembayaran') }}" class="block w-full bg-orange-500 text-white text-center py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                    Lihat Instruksi Pembayaran
                </a>
            </div>
        </div>
    </div>
</body>
</html>