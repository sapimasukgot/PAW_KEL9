@extends('layout-penjual')

@section('content')
<div class="flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-6 flex-none" data-translate="title_customer_reviews">Ulasan Pelanggan</h2>

    <div class="flex-grow overflow-y-auto pr-3 custom-scrollbar pb-25">
        <div class="space-y-4">
            
            @forelse($ulasan as $item)
            <div class="bg-white p-4 rounded-2xl shadow-sm flex items-start gap-4 mb-4 border border-gray-50">
                <div class="w-16 h-16 bg-orange-500 rounded-full flex-shrink-0 flex items-center justify-center text-white font-bold uppercase text-xl">
                    {{ substr($item->user->name ?? 'P', 0, 1) }}
                </div>

                <div class="flex-grow">
                    <span class="text-xs text-gray-400 block mb-1">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </span>
                    <h4 class="font-bold text-lg leading-tight">{{ $item->user->name ?? 'Pelanggan' }}</h4>
                    <p class="text-sm text-gray-500 mb-1">Nilai Skor: {{ $item->nilai }} / 5</p>
                    
                    <p class="text-sm italic text-gray-700 bg-gray-50 p-2.5 rounded-xl mt-1">
                        <span data-translate="label_review" class="font-bold not-italic">Ulasan:</span> 
                        "{{ $item->ulasan ?? 'Tidak ada ulasan tertulis.' }}"
                    </p>
                    
                    <div class="flex text-yellow-400 mt-2 text-sm">
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= $item->nilai ? '★' : '☆' }}
                        @endfor
                    </div>
                </div>

                <div class="flex flex-col items-end justify-between self-stretch text-right">
                    <span class="font-bold text-sm text-gray-400 whitespace-nowrap">ID: #{{ $item->rating_id }}</span>
                    
                    <a href="{{ route('ulasan-detail', $item->rating_id) }}" 
                       class="bg-[#CBD5E1] text-[10px] px-4 py-2 rounded-lg font-bold shadow-sm hover:bg-gray-300 transition mt-4 inline-block"
                       data-translate="btn_view_detail">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @empty
            <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                <p class="text-gray-400 text-sm">Belum ada ulasan yang masuk untuk toko ini.</p>
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