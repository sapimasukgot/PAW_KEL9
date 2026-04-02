@extends('layout-penjual')

@section('content')
<div class="flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-8 flex-none tracking-wide">Pesanan Pelanggan</h2>

    <div class="flex-grow overflow-y-auto pr-3 custom-scrollbar pb-25">
        <div class="space-y-6">
            
            <div class="bg-white p-5 rounded-3xl shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-5">
                    <div class="w-20 h-20 bg-gray-200 rounded-full overflow-hidden flex-shrink-0">
                        <img src="https://ui-avatars.com/api/?name=Justin+Laksana" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="flex justify-between items-start w-full">
                            <span class="text-xs text-gray-400 font-semibold uppercase">27 Mar 2026</span>
                        </div>
                        <h4 class="font-bold text-xl text-gray-900">Justin Laksana</h4>
                        <p class="text-sm text-gray-500">1 Mie Pangsit Jumbo, 1 Mie Pangsit ...</p>
                    </div>
                </div>

                <div class="flex flex-col items-end gap-3">
                    <span class="font-bold text-lg text-gray-800 leading-none">Rp 32.000</span>
                    <a href="{{ route('pesanan-detail') }}" class="bg-[#CBD5E1] text-xs px-5 py-2 rounded-xl font-bold shadow-sm">
                        Lihat Detail
                    </a>
                    <span class="bg-[#00FF85] text-black text-[10px] px-4 py-1.5 rounded-xl font-bold shadow-sm">
                        Pesanan Selesai
                    </span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-3xl shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-5">
                    <div class="w-20 h-20 bg-gray-200 rounded-full overflow-hidden flex-shrink-0">
                        <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 font-semibold uppercase">27 Mar 2026</span>
                        <h4 class="font-bold text-xl text-gray-900">John Doe</h4>
                        <p class="text-sm text-gray-500">1 Mie Pangsit Jumbo</p>
                    </div>
                </div>

                <div class="flex flex-col items-end gap-3">
                    <span class="font-bold text-lg text-gray-800 leading-none">Rp 14.000</span>
                    <button class="bg-[#CBD5E1] text-xs px-5 py-2 rounded-xl font-bold shadow-sm">Lihat Detail</button>
                    <span class="bg-[#00FF85] text-black text-[10px] px-4 py-1.5 rounded-xl font-bold shadow-sm">
                        Pesanan Selesai
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection