@extends('layout-penjual')

@section('content')
<div class="flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-6 flex-none" data-translate="title_customer_history">Riwayat Pesanan Pelanggan</h2>

    <div class="flex-grow overflow-y-auto pr-3 custom-scrollbar pb-25">
        <div class="space-y-4">
            
            @forelse($histories as $data)
            <div class="bg-white p-4 rounded-2xl shadow-sm flex items-start gap-4 mb-4 border border-gray-50">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex-shrink-0 flex items-center justify-center font-bold text-gray-600 uppercase text-xl">
                    {{ substr($data->user->name ?? 'U', 0, 1) }}
                </div>

                <div class="flex-grow">
                    <span class="text-xs text-gray-400 block mb-1">
                        {{ \Carbon\Carbon::parse($data->tanggal_order)->format('d M Y') }}
                    </span>
                    <h4 class="font-bold text-lg leading-tight">{{ $data->user->name ?? 'Pelanggan' }}</h4>
                    <p class="text-xs text-gray-400 mt-1">Status transaksi: <span class="text-emerald-500 font-bold">{{ $data->status }}</span></p>
                </div>

                <div class="flex flex-col items-end gap-3 self-stretch justify-between">
                    <span class="font-bold text-sm text-gray-800">Rp {{ number_format($data->total_harga, 0, ',', '.') }}</span>
                    
                    <a href="{{ route('riwayat-penjual-detail', $data->pesanan_id) }}" 
                        class="bg-[#CBD5E1] text-[10px] px-4 py-2 rounded-lg font-bold shadow-sm hover:bg-gray-300 transition mt-auto inline-block"
                        data-translate="btn_view_detail">
                            Lihat Detail
                    </a>
                </div>
            </div>
            @empty
            <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                <p class="text-gray-400 text-sm">Belum ada riwayat pesanan yang selesai atau dibatalkan.</p>
            </div>
            @endforelse

        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 10px; }
</style>
@endsection