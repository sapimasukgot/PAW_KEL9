<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen pb-10">
    @include('pembeli.nav')

    <div class="p-4">
        <h1 class="text-2xl font-bold text-center mb-6">Riwayat Pemesanan</h1>
        <div class="space-y-4">
            @foreach($histories as $h)
            <div class="bg-white p-4 rounded-2xl shadow-md flex justify-between items-center">
                <div class="flex gap-4">
                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center text-center p-1 shadow-inner">
                        <span class="text-[8px] font-bold text-gray-400 uppercase italic">{{ $h['nama'] }}</span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">{{ $h['tanggal'] }}</p>
                        <p class="font-bold">{{ $h['nama'] }}</p>
                        <p class="text-sm font-bold text-gray-600">Rp {{ $h['harga'] }}</p>
                    </div>
                </div>
                <a href="{{ route('pembeli-riwayat-detail', $h['id']) }}" class="bg-gray-300 px-4 py-1 rounded-lg text-xs font-bold transition hover:bg-gray-400">Lihat Detail</a>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>