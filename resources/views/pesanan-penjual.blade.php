@extends('layout-penjual')

@section('content')
<div class="flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-8 flex-none tracking-wide" data-translate="title_customer_orders">
        Pesanan Pelanggan
    </h2>

    <div class="flex-grow overflow-y-auto pr-3 custom-scrollbar pb-25">
        <div class="space-y-6">
            
            @forelse($pesanans as $pesanan)
                <div class="bg-white p-5 rounded-3xl shadow-sm flex items-center justify-between border border-orange-50">
                    <div class="flex items-center gap-5">
                        <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center shadow-inner flex-shrink-0">
                            <span class="text-white font-bold text-2xl uppercase">
                                {{ substr($pesanan->user->name ?? 'P', 0, 1) }}
                            </span>
                        </div>
                        <div>
                            <div class="flex justify-between items-start w-full">
                                <span class="text-xs text-gray-400 font-semibold uppercase">
                                    {{ \Carbon\Carbon::parse($pesanan->tanggal_order)->format('d M Y') }}
                                </span>
                            </div>
                            <h4 class="font-bold text-xl text-gray-900">{{ $pesanan->user->name ?? 'Pelanggan' }}</h4>
                            <p class="text-sm text-gray-500">ID Pesanan: #{{ $pesanan->order_id }}</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-end gap-3">
                        <span class="font-bold text-lg text-gray-800 leading-none">
                            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                        </span>
                        
                        <a href="{{ route('pesanan-detail', $pesanan->pesanan_id ?? $pesanan->id) }}" 
                            class="bg-[#CBD5E1] text-xs px-5 py-2 rounded-xl font-bold shadow-sm hover:bg-gray-400 transition-all inline-block"
                            data-translate="btn_view_detail">
                            Lihat Detail
                        </a>
                        
                        <span class="bg-orange-100 text-orange-700 text-[10px] px-4 py-1.5 rounded-xl font-bold shadow-sm">
                            {{ $pesanan->status }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-white rounded-3xl shadow-sm border border-orange-50">
                    <p class="text-gray-500 font-medium" data-translate="no_active_orders">Belum ada pesanan aktif saat ini.</p>
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection