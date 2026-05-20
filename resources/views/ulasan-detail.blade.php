@extends('layout-penjual')

@section('content')
<div class="max-w-4xl mx-auto flex flex-col h-[calc(100vh-180px)]">
    {{-- Menampilkan nama pengulas secara dinamis --}}
    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide">
        {{ $ulasanDetail->user->name ?? 'Pelanggan MakanMart' }}
    </h2>

    <div class="flex-grow overflow-y-auto pr-2 custom-scrollbar pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            
            {{-- Detail Menu --}}
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-6" data-translate="title_menu_detail">Detail Menu</h3>
                <div class="space-y-4">
                    @if(isset($ulasanDetail->pesanan) && $ulasanDetail->pesanan->details && $ulasanDetail->pesanan->details->count() > 0)
                        @foreach($ulasanDetail->pesanan->details as $item)
                            <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-600 font-medium">{{ $item->menu->nama_menu ?? 'Menu' }}</span>
                                <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl w-14 text-center font-bold text-sm">
                                    {{ $item->jumlah ?? 1 }}x
                                </span>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 font-medium" data-translate="label_reguler">Reguler:</span>
                            <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl w-14 text-center">1</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 font-medium" data-translate="label_jumbo">Jumbo:</span>
                            <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl w-14 text-center">1</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 font-medium" data-translate="label_topping">Topping:</span>
                            <span class="bg-[#E2E8F0] px-6 py-1 rounded-xl">Telur</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 font-medium" data-translate="label_spicy_lvl">Level Pedas:</span>
                            <span class="bg-[#E2E8F0] px-6 py-1 rounded-xl">Lvl 0</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Detail Informasi Transaksi --}}
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-6" data-translate="title_order_detail">Detail Pesanan</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm" data-translate="label_name">Nama:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl text-sm font-semibold">
                            {{ $ulasanDetail->pesanan->nama_pembeli ?? ($ulasanDetail->user->name ?? '-') }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm" data-translate="label_table_no">No. Meja:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl text-sm font-semibold">
                            {{ $ulasanDetail->pesanan->no_meja ?? '-' }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm" data-translate="label_price">Harga:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl text-sm font-semibold">
                            Rp {{ number_format($ulasanDetail->pesanan->total_harga ?? 0, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm" data-translate="label_status">Keterangan:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl text-sm italic text-green-600 font-medium capitalize" data-translate="status_completed">
                            {{ $ulasanDetail->pesanan->status ?? 'Selesai' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Konten Komentar Ulasan & Bintang Dinamis --}}
        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-50 mb-8">
            <h3 class="font-bold text-lg mb-3" data-translate="title_customer_review">Ulasan Pelanggan</h3>
            
            {{-- PERBAIKAN UTAMA: Menggunakan karakter ★ teks dinamis dengan warna kelas Tailwind --}}
            <div class="flex mb-3 text-2xl gap-0.5 select-none">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $ulasanDetail->nilai)
                        {{-- Bintang Aktif Diisi Warna Kuning Emas --}}
                        <span class="text-yellow-400">★</span>
                    @else
                        {{-- Bintang Kosong Diisi Warna Abu-abu --}}
                        <span class="text-gray-200">★</span>
                    @endif
                @endfor
                <span class="text-xs font-bold text-gray-500 self-center ml-2">({{ $ulasanDetail->nilai }}/5)</span>
            </div>

            {{-- Teks Ulasan Pelanggan --}}
            <p class="text-gray-700 italic leading-relaxed bg-gray-50 p-4 rounded-2xl border-l-4 border-orange-300 shadow-inner">
                " {{ $ulasanDetail->ulasan ?? 'Tidak ada komentar tertulis.' }} "
            </p>
            
            <span class="text-[10px] text-gray-400 block mt-3 text-right">
                Dibuat pada: {{ $ulasanDetail->tanggal ?? $ulasanDetail->created_at }}
            </span>
        </div>
    </div>

    <div class="py-6 flex-none">
        <a href="{{ route('ulasan-penjual') }}" 
           class="bg-[#CBD5E1] px-12 py-2.5 rounded-xl font-bold text-sm shadow-sm hover:bg-gray-300 transition-all inline-block"
           data-translate="btn_back">
            Kembali
        </a>
    </div>
</div>
@endsection