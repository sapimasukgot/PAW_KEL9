@extends('layout-penjual')

@section('content')
<div class="flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-6 flex-none">Riwayat Pesanan Pelanggan</h2>

    <div class="flex-grow overflow-y-auto pr-3 custom-scrollbar pb-25">
        <div class="space-y-4">
            
            @php
                $riwayat = [
                    ['nama' => 'Justin Laksana', 'tgl' => '27 Mar 2026', 'harga' => '32.000', 'desc' => '1 Mie Pangsit Jumbo, 1 Mie Pangsit...'],
                    ['nama' => 'John Doe', 'tgl' => '27 Mar 2026', 'harga' => '14.000', 'desc' => '1 Mie Pangsit Jumbo'],
                    ['nama' => 'John David', 'tgl' => '26 Mar 2026', 'harga' => '14.000', 'desc' => '1 Mie Pangsit Reguler, Topping Telur'],
                    ['nama' => 'Isabelle', 'tgl' => '26 Mar 2026', 'harga' => '18.000', 'desc' => '1 Mie Pangsit Jumbo, Topping Telur'],
                ];
            @endphp

@foreach($riwayat as $data)
<div class="bg-white p-4 rounded-2xl shadow-sm flex items-start gap-4 mb-4">
    <div class="w-16 h-16 bg-gray-300 rounded-full flex-shrink-0 overflow-hidden">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($data['nama']) }}" alt="avatar">
    </div>

    <div class="flex-grow">
        <span class="text-xs text-gray-400 block mb-1">{{ $data['tgl'] }}</span>
        <h4 class="font-bold text-lg leading-tight">{{ $data['nama'] }}</h4>
        <p class="text-sm text-gray-500 mt-1">{{ $data['desc'] }}</p>
    </div>

    <div class="flex flex-col items-end gap-3 self-stretch justify-between">
        <span class="font-bold text-sm ">Rp {{ $data['harga'] }}</span>
        
        <a href="{{ route('riwayat-detail') }}" 
           class="bg-[#CBD5E1] text-[10px] px-4 py-2 rounded-lg font-bold shadow-sm hover:bg-gray-300 transition mt-auto">
            Lihat Detail
        </a>
    </div>
</div>
@endforeach

        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 10px; }
</style>
@endsection