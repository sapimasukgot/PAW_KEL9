@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Detail Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;" class="min-h-screen pb-10">

    <div class="max-w-3xl mx-auto p-4">

        <h1 class="text-2xl font-bold text-center my-6 text-gray-900">Detail Pesanan Anda</h1>

        {{-- Grid Atas: Gambar dan Deskripsi Status --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="w-full h-44 bg-gray-300 rounded-xl overflow-hidden shadow-sm">
                <img src="https://via.placeholder.com/400x300" alt="Detail Pesanan" class="w-full h-full object-cover">
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm flex flex-col justify-start">
                <h4 class="font-bold text-sm text-gray-800 mb-1">Status Pantauan Dapur</h4>
                <div class="h-full flex flex-col justify-center items-center text-center p-2">
                    @if($pesanan->status == 'Pending')
                        <span class="text-xl font-black text-amber-600 uppercase tracking-wider animate-pulse">⏳ MENUNGGU ANTRIAN</span>
                        <p class="text-[11px] text-gray-400 mt-1">Pesanan masuk sistem, menunggu konfirmasi lapak.</p>
                    @elseif($pesanan->status == 'Dimasak' || $pesanan->status == 'Proses')
                        <span class="text-xl font-black text-orange-600 uppercase tracking-wider">🍳 SEDANG DIMASAK</span>
                        <p class="text-[11px] text-gray-400 mt-1">Koki sedang meracik hidangan sedap pesananmu.</p>
                    @elseif($pesanan->status == 'Siap' || $pesanan->status == 'Selesai')
                        <span class="text-xl font-black text-green-600 uppercase tracking-wider">✅ SIAP DISAJIKAN</span>
                        <p class="text-[11px] text-gray-400 mt-1">Pesanan selesai! Silakan ambil makanan Anda di loket lapak.</p>
                    @else
                        <span class="text-xl font-black text-gray-600 uppercase tracking-wider">ℹ️ {{ strtoupper($pesanan->status) }}</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Form Rincian Data Pesanan (Read-Only) --}}
        <div class="space-y-4">
            
            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Identitas Pelanggan</h4>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Nama:</span>
                    <input type="text" readonly value="{{ $pesanan->nama_pembeli ?? Auth::user()->name }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">No. Meja:</span>
                    <input type="text" readonly value="{{ $pesanan->no_meja }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Harga Total:</span>
                    <input type="text" readonly value="Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs font-bold text-orange-600 min-w-[150px] text-center focus:outline-none border-none select-none">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Keterangan:</span>
                    <input type="text" readonly value="{{ $pesanan->keterangan ?? '-' }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs w-full max-w-sm text-left focus:outline-none border-none italic text-gray-500 select-none">
                </div>
            </div>

            {{-- Tombol Navigasi Bawah Dinamis --}}
            <div class="w-full flex justify-between items-center pt-2">
                
                {{-- LOGIKA TOMBOL KEMBALI --}}
                @if($pesanan->status == 'Siap' || $pesanan->status == 'Selesai')
                    {{-- Jika makanan sudah siap, kembali ke beranda utama pembeli --}}
                    <a href="{{ route('pembeli-beranda') }}" class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                        Kembali ke Beranda
                    </a>
                @else
                    {{-- Jika makanan belum siap, kembali ke antrean ongoing --}}
                    <a href="{{ route('pembeli-ongoing') }}" class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                        Kembali ke Antrean
                    </a>
                @endif

                {{-- LOGIKA TOMBOL BERI RATING --}}
                @if($pesanan->status == 'Siap' || $pesanan->status == 'Selesai')
                    {{-- Tombol Aktif jika status makanan sudah siap --}}
                    <a href="{{ route('pembeli-rating', $pesanan->pesanan_id ?? $pesanan->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-16 py-1.5 rounded-lg font-semibold text-xs shadow-sm text-center transition-all">
                        Beri Rating
                    </a>
                @else
                    {{-- Tombol Terkunci (Disabled) jika status makanan belum siap --}}
                    <div class="bg-gray-300 text-gray-500 px-16 py-1.5 rounded-lg font-semibold text-xs shadow-sm select-none cursor-not-allowed border border-gray-400/20 text-center" title="Rating dapat diberikan setelah makanan siap">
                        Beri Rating
                    </div>
                @endif

            </div>
        </div>

    </div>

</body>
</html>