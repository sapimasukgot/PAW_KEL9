@extends('layout-penjual')

@section('content')
<div class="max-w-4xl mx-auto flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide">Justin Laksana</h2>

    <div class="flex-grow overflow-y-auto pr-2 custom-scrollbar pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-6" data-translate="title_menu_detail">Detail Menu</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600" data-translate="label_reguler">Reguler:</span>
                        <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl font-bold">1</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600" data-translate="label_jumbo">Jumbo:</span>
                        <span class="bg-[#E2E8F0] px-5 py-1 rounded-xl font-bold">1</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-6" data-translate="title_order_detail">Detail Pesanan</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm" data-translate="label_name">Nama:</span>
                        <span class="bg-gray-100 px-4 py-1 rounded-xl font-semibold">Justin</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 text-sm" data-translate="label_price">Harga:</span>
                        <span class="font-bold">Rp 32.000</span>
                    </div>
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