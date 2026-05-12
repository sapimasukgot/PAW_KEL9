@extends('layout-penjual')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide" data-translate="title_add_menu">Tambah Menu</h2>

    <form action="{{ route('penjual-beranda') }}" method="GET" class="space-y-6">
        <input type="hidden" name="added_id" value="{{ uniqid() }}">

        <div>
            <label class="block font-bold mb-2" data-translate="label_menu_name">Nama Menu</label>
            <input type="text" name="nama" placeholder="Masukkan nama menu..." 
                   class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none border-none" required>
        </div>

        <div>
            <label class="block font-bold mb-2" data-translate="label_topping">Topping</label>
            <input type="text" placeholder="Telur, Katsu, Kerupuk" 
                   class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none border-none">
        </div>

        <div>
            <label class="block font-bold mb-2" data-translate="label_spicy_lvl">Level Pedas</label>
            <input type="text" placeholder="Lvl 0, Lvl 1, Lvl 2" 
                   class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none border-none">
        </div>

        <div class="flex justify-between items-center pt-10">
            <a href="{{ route('penjual-beranda') }}" 
               class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold shadow-sm text-sm hover:bg-gray-300 transition"
               data-translate="btn_back">
                Kembali
            </a>

            <button type="submit" 
                    class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold shadow-sm text-sm hover:bg-gray-300 transition"
                    data-translate="btn_add">
                Tambah
            </button>
        </div>
    </form>
</div>
@endsection