@extends('layout-penjual')

@section('content')
<div class="max-w-4xl mx-auto flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide">Justin Laksana</h2>

    <div class="flex-grow overflow-y-auto pr-2 custom-scrollbar pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-6">Detail Menu</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600 font-medium">Reguler:</span>
                        <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl w-14 text-center">1</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600 font-medium">Jumbo:</span>
                        <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl w-14 text-center">1</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600 font-medium">Topping:</span>
                        <span class="bg-[#E2E8F0] px-6 py-1 rounded-xl">Telur</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600 font-medium">Level Pedas:</span>
                        <span class="bg-[#E2E8F0] px-6 py-1 rounded-xl">Lvl 0</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-6">Detail Pesanan</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">Nama:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl text-sm font-semibold">Aan</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">No. Meja:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl text-sm font-semibold">1</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">Harga:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl text-sm font-semibold">Rp 32.000</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm">Keterangan:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl text-sm italic text-green-600 font-medium">Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-50 mb-8">
            <h3 class="font-bold text-lg mb-3">Ulasan Pelanggan</h3>
            <div class="flex text-yellow-400 mb-3 text-lg">★★★★★</div>
            <p class="text-gray-700 italic leading-relaxed bg-gray-50 p-4 rounded-2xl border-l-4 border-[#CBD5E1]">
                "Mantap Gacor the best lah, kapan kapan mau balik lagi. Porsinya banyak dan rasanya pas di lidah!"
            </p>
        </div>
    </div>

    <div class="py-6 flex-none">
        <a href="{{ route('ulasan-penjual') }}" class="bg-[#CBD5E1] px-12 py-2.5 rounded-xl font-bold text-sm shadow-sm hover:bg-gray-300 transition-all inline-block">
            Kembali
        </a>
    </div>
</div>
@endsection