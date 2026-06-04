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
                    @php
                        $firstItem = $details->first();
                        $namaMenu = $firstItem->menu->nama_menu ?? 'Menu Pilihan';
                        $hargaRegulerAsli = $firstItem->menu->harga ?? 0;
                        $tambahanJumbo = $firstItem->menu->tambahan_jumbo ?? 0;

                        // Gunakan kolom is_jumbo untuk membedakan
                        $dataReguler = null;
                        $dataJumbo = null;

                        foreach($details as $item) {
                            if ($item->is_jumbo) {
                                $dataJumbo = $item;
                            } else {
                                $dataReguler = $item;
                            }
                        }

                        $qtyReguler = $dataReguler ? ($dataReguler->jumlah ?? 0) : 0;
                        $qtyJumbo = $dataJumbo ? ($dataJumbo->jumlah ?? 0) : 0;

                        $subtotalReguler = $dataReguler ? $dataReguler->subtotal : 0;
                        $subtotalJumbo = $dataJumbo ? $dataJumbo->subtotal : 0;

                        // Pilih item yang akan ditampilkan detailnya (prioritas: jumbo, lalu reguler)
                        $itemAcuan = $dataJumbo ?? $dataReguler;
                        
                        // Parse harga topping dari field topping (format: "nama:harga")
                        $hargaToppingSatuan = 0;
                        if ($itemAcuan && $itemAcuan->topping && $itemAcuan->topping !== '-') {
                            $toppingList = array_map('trim', explode(',', $firstItem->menu->topping ?? ''));
                            foreach ($toppingList as $top) {
                                $parts = explode(':', $top);
                                $namaTop = trim($parts[0]);
                                if ($namaTop === $itemAcuan->topping) {
                                    $hargaToppingSatuan = isset($parts[1]) ? (int)trim($parts[1]) : 0;
                                    break;
                                }
                            }
                        }
                    @endphp
                    
                    <div class="mt-2 space-y-2 text-xs text-gray-600">
                        <p class="font-bold text-xs text-gray-900 mb-1">📋 {{ $namaMenu }}</p>

                        @if($qtyReguler > 0)
                        <div class="flex justify-between items-center bg-gray-50 p-1.5 rounded-lg">
                            <p><span class="font-semibold text-gray-800">Porsi Reguler:</span> {{ $qtyReguler }}x <span class="text-gray-400">@Rp {{ number_format($hargaRegulerAsli, 0, ',', '.') }}</span></p>
                            <span class="text-[10px] text-gray-400">Subtotal: Rp {{ number_format($subtotalReguler, 0, ',', '.') }}</span>
                        </div>
                        @endif

                        @if($qtyJumbo > 0)
                        <div class="flex justify-between items-center bg-gray-50 p-1.5 rounded-lg">
                            <p><span class="font-semibold text-gray-800">Porsi Jumbo:</span> <span class="text-orange-500 font-bold">{{ $qtyJumbo }}x</span> <span class="text-gray-400">@Rp {{ number_format($hargaRegulerAsli + $tambahanJumbo, 0, ',', '.') }}</span></p>
                            <span class="text-[10px] text-gray-400">Subtotal: Rp {{ number_format($subtotalJumbo, 0, ',', '.') }}</span>
                        </div>
                        @endif

                        @if($qtyReguler == 0 && $qtyJumbo == 0)
                        <div class="flex justify-between items-center bg-gray-50 p-1.5 rounded-lg">
                            <p><span class="font-semibold text-gray-800">Jumlah:</span> {{ $dataReguler ? $dataReguler->jumlah : ($dataJumbo ? $dataJumbo->jumlah : 0) }}x</p>
                            <span class="text-[10px] text-gray-400">Subtotal: Rp {{ number_format($dataReguler ? $dataReguler->subtotal : ($dataJumbo ? $dataJumbo->subtotal : 0), 0, ',', '.') }}</span>
                        </div>
                        @endif

                        <div class="pt-1 border-t border-dashed border-gray-200 space-y-0.5">
                            <div class="flex justify-between items-center">
                                <p><span class="font-semibold text-gray-800">Topping:</span> {{ $itemAcuan->topping ?? '-' }}</p>
                                @if(!empty($itemAcuan->topping) && $itemAcuan->topping != '-')
                                    <span class="text-[10px] text-orange-600 font-bold">Harga Topping: Rp {{ number_format($hargaToppingSatuan, 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <p><span class="font-semibold text-gray-800">Pedas:</span> {{ $itemAcuan->level_pedas ?? '-' }}</p>
                        </div>
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