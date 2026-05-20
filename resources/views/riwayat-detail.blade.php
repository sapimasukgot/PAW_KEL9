@extends('layout-penjual')

@section('content')
<div class="max-w-4xl mx-auto flex flex-col h-[calc(100vh-180px)]">

    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide">
        {{ $detail->nama_pembeli ?? ($detail->user->name ?? 'Pelanggan') }}
    </h2>

    <div class="flex-grow overflow-y-auto pr-2 custom-scrollbar pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">

            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-6" data-translate="title_menu_detail">Detail Menu</h3>
                <div class="space-y-4">
                    @if($detail->details && $detail->details->count() > 0)
                        @foreach($detail->details as $item)
                            <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                                <span class="text-gray-600 font-medium">{{ $item->menu->nama_menu ?? 'Menu' }}</span>
                                <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl font-bold text-sm">
                                    {{ $item->jumlah ?? 1 }}x
                                </span>
                            </div>
                        @endforeach
                    @else
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Kuantitas Pesanan:</span>
                            <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl font-bold">1 Porsi</span>
                        </div>
                    @endif

                    <div class="pt-2">
                        <span class="text-xs font-bold text-gray-400 block mb-1">Catatan Pembeli:</span>
                        <p class="text-xs text-gray-600 italic bg-gray-50 p-3 rounded-xl">
                            " {{ $detail->keterangan ?? '-' }} "
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50 flex flex-col justify-between">
                <div>
                    <h3 class="font-bold text-lg mb-6" data-translate="title_order_detail">Detail Pesanan</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-sm" data-translate="label_name">Nama:</span>
                            <span class="bg-gray-100 px-4 py-1 rounded-xl font-semibold text-sm">
                                {{ $detail->nama_pembeli ?? ($detail->user->name ?? '-') }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-sm">No. Meja:</span>
                            <span class="bg-gray-100 px-4 py-1 rounded-xl font-semibold text-sm">
                                {{ $detail->no_meja ?? '-' }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-sm" data-translate="label_price">Harga Total:</span>
                            <span class="font-bold text-gray-800">
                                Rp {{ number_format($detail->total_harga, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <span class="text-xs font-bold text-gray-400 block mb-2">Rating & Ulasan Pembeli:</span>
                    @if($detail->rating)
                        <div class="flex items-center gap-1 text-orange-400 mb-1 text-base">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $detail->rating->nilai)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @else
                                    <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @endif
                            @endfor
                            <span class="text-xs font-bold text-gray-700 ml-2">({{ $detail->rating->nilai }}/5)</span>
                        </div>
                        <p class="text-xs text-gray-600 italic mt-1 bg-orange-50/50 p-2 rounded-lg">
                            " {{ $detail->rating->ulasan ?? 'Tidak ada ulasan tertulis.' }} "
                        </p>
                    @else
                        <p class="text-xs text-gray-400 italic">Belum ada ulasan atau rating untuk pesanan ini.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="py-6 flex-none">
        <a href="{{ route('riwayat-penjual') }}" 
           class="bg-[#CBD5E1] px-12 py-2.5 rounded-xl font-bold text-sm shadow-sm hover:bg-gray-300 transition text-black inline-block"
           data-translate="btn_back">
            Kembali
        </a>
    </div>
</div>
@endsection