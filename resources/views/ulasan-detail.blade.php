@extends('layout-penjual')

@section('content')
<div class="max-w-3xl mx-auto p-4">

    <h1 class="text-2xl font-bold text-center my-6 text-gray-900">Detail Ulasan Pelanggan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="w-full h-44 bg-orange-50 rounded-xl overflow-hidden shadow-inner flex items-center justify-center border border-orange-100">
            @php
                $details = $ulasanDetail->pesanan->detail_pesanan ?? $ulasanDetail->pesanan->detailPesanan ?? $ulasanDetail->pesanan->details ?? null;
                $firstDetail = isset($details) && $details->count() > 0 ? $details->first() : null;
                $gambarMenu = ($firstDetail && $firstDetail->menu) ? $firstDetail->menu->gambar_menu : null;
            @endphp
            
            @if($gambarMenu)
                <img src="{{ asset('images/menu/' . $gambarMenu) }}" alt="Detail Menu Ulasan" class="w-full h-full object-cover">
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
            <h4 class="font-bold text-sm text-gray-800 mb-2" data-translate="title_customer_review">Ulasan Pelanggan</h4>
            <div class="h-full flex flex-col justify-center items-center text-center p-2">

                <div class="flex items-center gap-1 text-orange-400 mb-2">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $ulasanDetail->nilai)
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        @else
                            <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        @endif
                    @endfor
                </div>

                <p class="text-xs text-gray-500 italic mt-1">
                    " {{ $ulasanDetail->ulasan ?? 'Tidak ada komentar tertulis.' }} "
                </p>
                <span class="text-[9px] text-gray-400 block mt-2">
                    Dibuat pada: {{ $ulasanDetail->tanggal ?? ($ulasanDetail->created_at ? $ulasanDetail->created_at->format('d M Y H:i') : '-') }}
                </span>
            </div>
        </div>
    </div>

    <div class="space-y-4">
        <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
            <h4 class="font-bold text-sm text-gray-800 mb-2" data-translate="title_menu_detail">Detail Menu</h4>
            
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
                    
                    // Hitung harga topping (harga satuan dikurangi harga dasar + tambahan jumbo)
                    $hargaToppingSatuan = 0;
                    if ($itemAcuan) {
                        if ($itemAcuan->is_jumbo) {
                            $hargaToppingSatuan = $itemAcuan->harga_satuan - ($hargaRegulerAsli + $tambahanJumbo);
                        } else {
                            $hargaToppingSatuan = $itemAcuan->harga_satuan - $hargaRegulerAsli;
                        }
                        
                        if ($hargaToppingSatuan < 0) {
                            $hargaToppingSatuan = 0;
                        }
                    }
                @endphp

                <div class="border-b border-orange-50 pb-2 mb-2 last:border-none last:pb-0">
                    <p class="font-bold text-xs text-orange-600">📋 {{ $namaMenu }}</p>
                    
                    <div class="mt-2 space-y-2 pl-2 text-xs text-gray-600">
                        @if($qtyReguler > 0)
                        <div class="flex justify-between items-center bg-gray-50 p-1.5 rounded-lg">
                            <p><span class="font-semibold text-gray-800">Porsi Reguler:</span> {{ $qtyReguler }}x</p>
                            <span class="text-[10px] text-gray-400">Subtotal: Rp {{ number_format($subtotalReguler, 0, ',', '.') }}</span>
                        </div>
                        @endif

                        @if($qtyJumbo > 0)
                        <div class="flex justify-between items-center bg-gray-50 p-1.5 rounded-lg">
                            <p><span class="font-semibold text-gray-800">Porsi Jumbo:</span> <span class="text-orange-500 font-bold">{{ $qtyJumbo }}x</span></p>
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
                </div>
            @else
                <p class="text-xs text-gray-400 italic">Rincian menu tidak ditemukan.</p>
            @endif

            <div class="pt-2 border-t border-gray-50">
                <span class="text-[11px] font-bold text-gray-400 block mb-1">Catatan Pembeli:</span>
                <p class="text-xs text-gray-600 italic bg-gray-50 p-3 rounded-xl">
                    " {{ $ulasanDetail->pesanan->keterangan ?? '-' }} "
                </p>
            </div>
        </div>

        <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
            <h4 class="font-bold text-sm text-gray-800 mb-2" data-translate="title_order_detail">Detail Pesanan</h4>

            <div class="flex items-center gap-4">
                <span class="w-24 text-xs font-bold text-gray-700" data-translate="label_name">Nama:</span>
                <input type="text" readonly value="{{ $ulasanDetail->pesanan->nama_pembeli ?? ($ulasanDetail->user->name ?? '-') }}"
                    class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
            </div>

            <div class="flex items-center gap-4">
                <span class="w-24 text-xs font-bold text-gray-700" data-translate="label_table_no">No. Meja:</span>
                <input type="text" readonly value="{{ $ulasanDetail->pesanan->no_meja ?? '-' }}"
                    class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
            </div>

            <div class="flex items-center gap-4">
                <span class="w-24 text-xs font-bold text-gray-700" data-translate="label_price">Harga Total:</span>
                <input type="text" readonly value="Rp {{ number_format($ulasanDetail->pesanan->harga_total ?? ($ulasanDetail->pesanan->total_harga ?? 0), 0, ',', '.') }}"
                    class="bg-gray-100 px-4 py-1.5 rounded-full text-xs font-bold text-orange-600 min-w-[150px] text-center focus:outline-none border-none select-none">
            </div>

            <div class="flex items-center gap-4">
                <span class="w-24 text-xs font-bold text-gray-700">Status:</span>
                <span class="bg-green-100 px-4 py-1 rounded-full text-xs italic text-green-600 font-medium capitalize select-none">
                    {{ $ulasanDetail->pesanan->status ?? 'Selesai' }}
                </span>
            </div>
        </div>

        <div class="w-full flex justify-between items-center pt-2">
            <a href="{{ route('ulasan-penjual') }}"
                class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm"
                data-translate="btn_back">
                Kembali
            </a>
        </div>
    </div>

</div>
@endsection