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

        <h1 class="text-2xl font-bold text-center my-6 text-gray-900">Detail Pesanan Masuk</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="w-full h-44 bg-gray-300 rounded-xl overflow-hidden shadow-sm">
                <img src="https://via.placeholder.com/400x300" alt="Detail Pesanan" class="w-full h-full object-cover">
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm flex flex-col justify-start">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Aksi Perubahan Status</h4>

                <form action="{{ route('penjual.update-status', $pesanan->pesanan_id ?? $pesanan->id) }}" method="POST" class="h-full flex flex-col justify-between">
                    @csrf
                    <div class="space-y-2">
                        <p class="text-[11px] text-gray-400">Pilih status terbaru untuk memperbarui status antrean di halaman pembeli:</p>
                        <select name="status" class="w-full bg-gray-100 px-4 py-2 rounded-xl text-xs font-bold text-gray-700 focus:outline-none focus:ring-1 ring-orange-400">
                            <option value="Pending" {{ $pesanan->status == 'Pending' ? 'selected' : '' }}>⏳ Menunggu Antrian</option>
                            <option value="Dimasak" {{ $pesanan->status == 'Dimasak' ? 'selected' : '' }}>🍳 Sedang Dimasak</option>
                            <option value="Siap" {{ $pesanan->status == 'Siap' ? 'selected' : '' }}>✅ Siap Disajikan / Selesai</option>
                            <option value="Batal" {{ $pesanan->status == 'Batal' ? 'selected' : '' }}>❌ Batalkan Pesanan</option>
                        </select>
                    </div>

                    <button type="submit" class="mt-4 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold py-2 px-4 rounded-xl shadow-sm transition-all text-center">
                        Simpan Perubahan Status
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-4">

            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Identitas Pelanggan</h4>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Nama:</span>
                    <input type="text" readonly value="{{ $pesanan->nama_pembeli }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
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

            <div class="w-full flex justify-between items-center pt-2">
                <a href="{{ route('pesanan-penjual') }}" class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                    Kembali
                </a>
                <div class="bg-orange-100 text-orange-700 px-10 py-1.5 rounded-lg font-bold text-xs shadow-sm select-none border border-orange-200">
                    Status: {{ $pesanan->status }}
                </div>
            </div>
        </div>

    </div>

</body>
</html>