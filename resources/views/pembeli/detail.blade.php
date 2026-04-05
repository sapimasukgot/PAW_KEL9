@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen">
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">{{ $menu['nama'] }}</h1>

        <div class="bg-white p-4 rounded-3xl shadow-lg flex flex-col md:flex-row gap-6 mb-6">
            <div class="w-full md:w-1/2 h-48 bg-gray-200 rounded-2xl flex items-center justify-center border-2 border-dashed border-gray-300">
                <span class="text-gray-500 font-bold uppercase tracking-widest text-center px-4">
                    Foto {{ $menu['nama'] }}
                </span>
            </div>

            <div class="flex-1">
                <h4 class="font-bold text-lg">Deskripsi</h4>
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $menu['nama'] }} adalah salah satu menu yang cukup digemari pelanggan, terlebih karena rasanya yang gurih dan aromanya yang menggugah selera.
                </p>
            </div>
        </div>

        <div class="border-2 border-dashed border-blue-400 rounded-2xl p-4 bg-white/50 mb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-[#d9d9d9] p-3 rounded-xl text-center">
                    <h5 class="font-bold mb-2">Detail Harga</h5>
                    <p class="text-xs">Jumbo: Rp14.000</p>
                    <p class="text-xs">Reguler: Rp10.000</p>
                </div>
                <div class="bg-[#d9d9d9] p-3 rounded-xl text-center">
                    <h5 class="font-bold mb-2">Topping</h5>
                    <p class="text-xs">Katsu - Rp 4.000</p>
                    <p class="text-xs">Kulit - Rp 3.000</p>
                    <p class="text-xs">Telur - Rp 4.000</p>
                </div>
                <div class="bg-[#d9d9d9] p-3 rounded-xl text-center">
                    <h5 class="font-bold mb-2 text-sm">Level Pedas</h5>
                    <p class="text-xs">Level 0 - 2</p>
                </div>
            </div>

            <div class="space-y-3">
                <h5 class="font-bold italic">Review</h5>
                <div class="text-xs space-y-2">
                    <p><strong>User1:</strong> porsinya banyak, tapi nunggunya lama</p>
                    <p><strong>User2:</strong> rasanya kurang nonjok, porsinya juga cuma dikit</p>
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center px-4">
            <a href="{{ route('pembeli-beranda') }}" class="bg-[#d1d1d1] px-8 py-2 rounded-lg font-bold transition hover:bg-gray-400">Kembali</a>
            <a href="{{ route('pembeli-checkout', $menu['id']) }}" class="bg-[#d1d1d1] px-10 py-2 rounded-lg font-bold transition hover:bg-gray-400">Pesan</a>
        </div>
    </div>
</body>
</html>