<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Riwayat - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#fcebda] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm bg-white rounded-[2.5rem] shadow-2xl p-8 flex flex-col items-center">
        
        <h1 class="text-2xl font-black text-black tracking-tighter mb-1">RIWAYAT PESANAN</h1>
        <div class="w-12 h-1 bg-[#e07b11] rounded-full mb-10"></div>

        <div class="w-full space-y-5 text-sm mb-8">
            <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                <span class="text-gray-400 font-semibold uppercase text-[10px] tracking-wider">ID Pesanan</span>
                <span class="font-bold text-black">#{{ $detail['id'] }}</span>
            </div>

            <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                <span class="text-gray-400 font-semibold uppercase text-[10px] tracking-wider">Menu</span>
                <span class="font-bold text-black">{{ $detail['nama'] }}</span>
            </div>

            <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                <span class="text-gray-400 font-semibold uppercase text-[10px] tracking-wider">Tanggal</span>
                <span class="font-bold text-black">{{ $detail['tanggal'] }}</span>
            </div>

            <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                <span class="text-gray-400 font-semibold uppercase text-[10px] tracking-wider">Metode Pembayaran</span>
                <span class="font-bold text-black">{{ $detail['metode'] ?? 'Transfer Bank' }}</span>
            </div>

            <div class="flex justify-between items-center pt-2">
                <span class="text-gray-400 font-semibold uppercase text-[10px] tracking-wider">Total Harga</span>
                <span class="text-xl font-black text-[#e07b11]">Rp {{ $detail['harga'] }}</span>
            </div>
        </div>

        <div class="w-full bg-green-50 border border-green-100 rounded-2xl py-3 flex items-center justify-center gap-2 mb-10">
            <div class="bg-green-500 text-white rounded-full p-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </div>
            <span class="text-green-700 font-bold text-[10px] uppercase tracking-widest">Pesanan Telah Selesai</span>
        </div>

        <div class="w-full space-y-3">
            <a href="{{ route('pembeli-beranda') }}" 
               class="block w-full bg-[#e07b11] text-white font-bold py-4 rounded-2xl shadow-lg shadow-orange-100 text-center uppercase text-xs tracking-[0.2em] transition-transform active:scale-95">
                Pesan Lagi
            </a>
            
            <a href="{{ route('pembeli-riwayat') }}" 
               class="block w-full bg-gray-100 text-gray-500 font-bold py-4 rounded-2xl text-center uppercase text-xs tracking-[0.2em] transition-transform active:scale-95">
                Kembali
            </a>
        </div>
    </div>

</body>
</html>