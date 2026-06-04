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
            <div class="w-full h-44 bg-orange-50 rounded-xl overflow-hidden shadow-inner flex items-center justify-center border border-orange-100">
                @php
                    $details = $pesanan->detail_pesanan ?? $pesanan->detailPesanan ?? $pesanan->details ?? null;
                    $firstDetail = isset($details) && $details->count() > 0 ? $details->first() : null;
                    $gambarMenu = ($firstDetail && $firstDetail->menu) ? $firstDetail->menu->gambar_menu : null;
                @endphp
                
                @if($gambarMenu)
                    <img src="{{ asset('images/menu/' . $gambarMenu) }}" alt="Detail Pesanan" class="w-full h-full object-cover">
                @else
                    <div class="text-center">
                        <span class="text-3xl block mb-1">🛍️</span>
                        <div class="text-orange-400 font-bold text-[10px] uppercase tracking-widest px-4">
                            📸 Foto Menu Belum Tersedia
                        </div>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm flex flex-col justify-start">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Rating & Ulasan Anda</h4>
                <div class="h-full flex flex-col justify-center items-center text-center p-2">

                    <div class="flex items-center gap-1 text-2xl text-orange-400 mb-2">
                        @if($pesanan->rating)
                            @for($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $pesanan->rating->nilai ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        @else
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
                <h4 class="font-bold text-sm text-gray-800 mb-2">Rincian Menu yang Dibeli</h4>
                
                @if(isset($details) && $details->count() > 0)
                    <div class="space-y-3">
                        @foreach($details as $detailItem)
                            @php
                                $hargaRegulerAsli = $detailItem->menu->harga ?? 0;
                                $tambahanJumbo = $detailItem->menu->tambahan_jumbo ?? 0;
                                $isJumbo = $detailItem->harga_satuan > $hargaRegulerAsli;

                                // Logika pemisahan harga topping mandiri dari basis harga_satuan transaksi
                                $hargaToppingSatuan = $detailItem->harga_satuan - ($isJumbo ? ($hargaRegulerAsli + $tambahanJumbo) : $hargaRegulerAsli);
                                
                                // Jika hasil selisih kosong atau bernilai minus karena penataan awal, set standar nominal topping Rp 3.000
                                if ($hargaToppingSatuan <= 0 && !empty($detailItem->topping) && $detailItem->topping != '-') {
                                    $hargaToppingSatuan = 3000;
                                }
                            @endphp
                            
                            <div class="flex justify-between items-start border-b border-gray-100 pb-3 last:border-none last:pb-0">
                                <div class="space-y-0.5">
                                    <p class="font-bold text-xs text-gray-900">
                                        {{ $detailItem->menu->nama_menu ?? 'Menu Pilihan' }}
                                    </p>
                                    <div class="text-[11px] text-gray-500 space-y-1 pl-1 mt-1">
                                        @if($detailItem->harga_satuan == $hargaRegulerAsli)
                                            <p><span class="font-medium text-gray-700">Porsi:</span> Reguler ({{ $detailItem->jumlah ?? 0 }}x) <span class="text-gray-400">@Rp {{ number_format($hargaRegulerAsli, 0, ',', '.') }}</span></p>
                                        @else
                                            <p><span class="font-medium text-gray-700">Porsi:</span> <span class="text-orange-500 font-semibold">Jumbo</span> ({{ $detailItem->jumlah ?? 0 }}x) <span class="text-gray-400">@Rp {{ number_format($hargaRegulerAsli + $tambahanJumbo, 0, ',', '.') }}</span></p>
                                            <span class="text-[10px] text-orange-400 block -mt-0.5">(Tambahan Jumbo: +Rp {{ number_format($tambahanJumbo, 0, ',', '.') }})</span>
                                        @endif

                                        <div class="flex items-center gap-2 pt-0.5">
                                            <p><span class="font-medium text-gray-700">Topping:</span> {{ $detailItem->topping ?? '-' }}</p>
                                            @if(!empty($detailItem->topping) && $detailItem->topping != '-')
                                                <span class="text-[10px] bg-amber-50 text-amber-600 px-1.5 py-0.5 rounded border border-amber-200 font-bold">Harga Topping: Rp {{ number_format($hargaToppingSatuan, 0, ',', '.') }}</span>
                                            @endif
                                        </div>
                                        
                                        <p><span class="font-medium text-gray-700">Pedas:</span> {{ $detailItem->level_pedas ?? '-' }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs font-bold text-orange-500 block">
                                        Rp {{ number_format($detailItem->subtotal ?? ($detailItem->harga_satuan * $detailItem->jumlah), 0, ',', '.') }}
                                    </span>
                                    <span class="text-[10px] text-gray-400 block">
                                        {{ $detailItem->jumlah ?? 1 }}x Pesanan
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-gray-400 italic">Rincian menu belanjaan tidak ditemukan.</p>
                @endif
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Identitas Pelanggan</h4>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Nama:</span>
                    <input type="text" readonly value="{{ $pesanan->nama_pembeli ?? Auth::user()->name }}"
                        class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">No. Meja:</span>
                    <input type="text" readonly value="{{ $pesanan->no_meja }}"
                        class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Harga Total:</span>
                    <input type="text" readonly value="Rp {{ number_format($pesanan->harga_total ?? $pesanan->total_harga ?? 0, 0, ',', '.') }}"
                        class="bg-gray-100 px-4 py-1.5 rounded-full text-xs font-bold text-orange-600 min-w-[150px] text-center focus:outline-none border-none select-none">
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Keterangan:</span>
                    <input type="text" readonly value="{{ $pesanan->keterangan ?? '-' }}"
                        class="bg-gray-100 px-4 py-1.5 rounded-full text-xs w-full max-w-sm text-left focus:outline-none border-none italic text-gray-500 select-none">
                </div>
            </div>

            <div class="w-full flex justify-between items-center pt-2">
                <a href="{{ route('pembeli-riwayat') }}"
                    class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                    Kembali
                </a>

                @if(!$pesanan->rating)
                    <a href="{{ route('pembeli-rating', $pesanan->pesanan_id ?? $pesanan->id) }}"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-16 py-1.5 rounded-lg font-semibold text-xs shadow-sm text-center transition-all">
                        Beri Rating
                    </a>
                @else
                    <div
                        class="bg-green-100 text-green-700 px-12 py-1.5 rounded-lg font-bold text-xs shadow-sm border border-green-200 select-none">
                        Terima Kasih Atas Ulasannya!
                    </div>
                @endif
            </div>
        </div>

    </div>

</body>

</html>