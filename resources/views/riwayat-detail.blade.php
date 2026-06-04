@extends('layout-penjual')

@section('content')
<div class="max-w-3xl mx-auto p-4">

    <h1 class="text-2xl font-bold text-center my-6 text-gray-900">Detail Riwayat Pesanan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="w-full h-44 bg-orange-50 rounded-xl overflow-hidden shadow-inner flex items-center justify-center border border-orange-100">
            @php
                $details = $detail->detail_pesanan ?? $detail->detailPesanan ?? $detail->details ?? null;
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
            <h4 class="font-bold text-sm text-gray-800 mb-2">Rating & Ulasan Pembeli</h4>
            <div class="h-full flex flex-col justify-center items-center text-center p-2">

                <div class="flex items-center gap-1 text-orange-400 mb-2">
                    @if($detail->rating)
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $detail->rating->nilai)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            @else
                                <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            @endif
                        @endfor
                    @else
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        @endfor
                    @endif
                </div>

                <p class="text-xs text-gray-500 italic mt-1">
                    @if($detail->rating)
                        " {{ $detail->rating->ulasan ?? 'Tidak ada komentar tertulis.' }} "
                    @else
                        (Belum memberikan ulasan untuk pesanan ini)
                    @endif
                </p>
            </div>
        </div>
    </div>

    <div class="space-y-4">
        <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
            <h4 class="font-bold text-sm text-gray-800 mb-2">Rincian Menu yang Harus Dimasak</h4>
            
            @if(isset($details) && $details->count() > 0)
                <div class="space-y-3">
                    @foreach($details as $item)
                        <div class="flex justify-between items-start border-b border-gray-100 pb-3 last:border-none last:pb-0">
                            <div class="space-y-0.5">
                                <p class="font-bold text-xs text-orange-600">
                                    📋 {{ $item->menu->nama_menu ?? 'Menu Pilihan' }}
                                </p>
                                <div class="text-[11px] text-gray-500 space-y-0.5 pl-1">
                                    @if($item->harga_satuan == ($item->menu->harga ?? 0))
                                        <p><span class="font-medium text-gray-700">Porsi:</span> Reguler ({{ $item->jumlah ?? 0 }}x)</p>
                                    @else
                                        <p><span class="font-medium text-gray-700">Porsi:</span> Jumbo ({{ $item->jumlah ?? 0 }}x)</p>
                                    @endif
                                    <p><span class="font-medium text-gray-700">Topping:</span> {{ $item->topping ?? '-' }}</p>
                                    <p><span class="font-medium text-gray-700">Pedas:</span> {{ $item->level_pedas ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-bold text-gray-900 block">
                                    Rp {{ number_format($item->subtotal ?? ($item->harga_satuan * $item->jumlah), 0, ',', '.') }}
                                </span>
                                <span class="text-[10px] text-gray-400 block">
                                    @Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
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
                <input type="text" readonly value="{{ $detail->nama_pembeli ?? ($detail->user->name ?? '-') }}"
                    class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
            </div>

            <div class="flex items-center gap-4">
                <span class="w-24 text-xs font-bold text-gray-700">No. Meja:</span>
                <input type="text" readonly value="{{ $detail->no_meja ?? '-' }}"
                    class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
            </div>

            <div class="flex items-center gap-4">
                <span class="w-24 text-xs font-bold text-gray-700">Harga Total:</span>
                <input type="text" readonly value="Rp {{ number_format($detail->harga_total ?? $detail->total_harga ?? 0, 0, ',', '.') }}"
                    class="bg-gray-100 px-4 py-1.5 rounded-full text-xs font-bold text-orange-600 min-w-[150px] text-center focus:outline-none border-none select-none">
            </div>

            <div class="flex items-center gap-4">
                <span class="w-24 text-xs font-bold text-gray-700">Keterangan:</span>
                <input type="text" readonly value="{{ $detail->keterangan ?? '-' }}"
                    class="bg-gray-100 px-4 py-1.5 rounded-full text-xs w-full max-w-sm text-left focus:outline-none border-none italic text-gray-500 select-none">
            </div>
        </div>

        <div class="w-full flex justify-between items-center pt-2">
            <a href="{{ route('riwayat-penjual') }}"
                class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                Kembali
            </a>
            
            <div id="status-indicator" class="bg-green-100 text-green-700 px-10 py-1.5 rounded-lg font-bold text-xs shadow-sm border border-green-200 select-none">
                Status: {{ $detail->status ?? 'Selesai' }}
            </div>
        </div>
    </div>

</div>
@endsection