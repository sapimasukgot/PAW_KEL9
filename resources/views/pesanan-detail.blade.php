@extends('layout-penjual')

@section('content')
<div class="flex flex-col h-[calc(100vh-180px)]">
    
    <h2 class="text-2xl font-bold text-center mb-6 flex-none">Justin Laksana</h2>

    <div class="flex-1 overflow-y-auto pr-2 custom-scrollbar pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-4" data-translate="title_menu_detail">Detail Menu</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600" data-translate="label_reguler">Reguler:</span>
                        <span class="bg-gray-200 px-4 py-1 rounded-lg w-12 text-center">1</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600" data-translate="label_jumbo">Jumbo:</span>
                        <span class="bg-gray-200 px-4 py-1 rounded-lg w-12 text-center">1</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600" data-translate="label_topping">Topping:</span>
                        <span class="bg-gray-200 px-5 py-1 rounded-lg">Telur</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600" data-translate="label_spicy_lvl">Level Pedas:</span>
                        <span class="bg-gray-200 px-5 py-1 rounded-lg">Lvl 0</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-50">
                <h3 class="font-bold text-lg mb-4" data-translate="title_order_detail">Detail Pesanan</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                        <span class="text-gray-400" data-translate="label_name">Nama:</span>
                        <span class="bg-gray-50 px-3 py-1 rounded-md">Justin</span>
                    </div>
                    <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                        <span class="text-gray-400" data-translate="label_table_no">No. Meja:</span>
                        <span class="bg-gray-50 px-3 py-1 rounded-md">1</span>
                    </div>
                    <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                        <span class="text-gray-400" data-translate="label_price">Harga:</span>
                        <span class="bg-gray-50 px-3 py-1 rounded-md font-bold">Rp 32.000</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400" data-translate="label_status">Keterangan:</span>
                        <span class="bg-gray-50 px-3 py-1 rounded-md italic text-green-600" data-translate="status_completed">Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4 border border-gray-50">
            <span class="font-bold text-gray-700" data-translate="label_order_status">Status Pesanan:</span>
            <select id="status-select" class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1 outline-none">
                <option data-translate="opt_select">Pilih</option>
                <option data-translate="status_processing">Diproses</option>
                <option data-translate="status_completed">Selesai</option>
            </select>
        </div>
    </div>

    <div class="py-4 flex-none">
        <a href="{{ route('pesanan-penjual') }}" 
           class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm shadow-sm inline-block transition-transform active:scale-95"
           data-translate="btn_back">
            Kembali
        </a>
    </div>

</div>
@endsection