@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Detail Riwayat Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background-color: #FFEDD9;" class="min-h-screen pb-10">

    <div class="max-w-3xl mx-auto p-4">

        <h1 class="text-2xl font-bold text-center my-6 text-gray-900">Detail Riwayat Pesanan</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="w-full h-44 bg-gray-300 rounded-xl overflow-hidden shadow-sm">
                <img src="https://via.placeholder.com/400x300" alt="Detail Pesanan" class="w-full h-full object-cover">
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm flex flex-col justify-start">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Rating & Ulasan Anda</h4>
                <div class="h-full flex flex-col justify-center items-center text-center p-2">
                    
                    <div class="flex items-center gap-1 text-2xl text-orange-400 mb-2">
                        {{-- PERBAIKAN LOGIKA: Cetak bintang secara dinamis berdasarkan nilai input database --}}
                        @if($pesanan->rating)
                            @for($i = 1; $i <= 5; $i++)
                                {{-- Jika nilai indeks kurang dari atau sama dengan nilai rating, gunakan bintang penuh (fas), jika lebih gunakan bintang kosong (far) --}}
                                <i class="{{ $i <= $pesanan->rating->nilai ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        @else
                            {{-- Jika pesanan ini benar-benar belum dirating --}}
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        @endif
                    </div>

                    <p class="text-xs text-gray-500 italic mt-1">
                        @if($pesanan->rating)
                            " {{ $pesanan->rating->ulasan ?? 'Tidak ada komentar tertulis.' }} "
                        @else
                            (Belum memberikan ulasan untuk pesanan ini)
                        @endif
                    </p>
                </div>
            </div>
        </div>

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

            <div class="w-full flex justify-between items-center pt-2">
                <a href="{{ route('pembeli-riwayat') }}" class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                    Kembali
                </a>

                @if(!$pesanan->rating)
                    <a href="{{ route('pembeli-rating', $pesanan->pesanan_id ?? $pesanan->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-16 py-1.5 rounded-lg font-semibold text-xs shadow-sm text-center transition-all">
                        Beri Rating
                    </a>
                @else
                    <div class="bg-green-100 text-green-700 px-12 py-1.5 rounded-lg font-bold text-xs shadow-sm border border-green-200 select-none">
                        Terima Kasih Atas Ulasannya!
                    </div>
                @endif
            </div>
        </div>

    </div>

</body>
</html>