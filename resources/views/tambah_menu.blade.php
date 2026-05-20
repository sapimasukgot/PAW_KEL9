@extends('layout-penjual')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide" data-translate="title_add_menu">Tambah Menu</h2>

    <form action="{{ route('store_menu') }}" method="POST" class="space-y-6">
        @csrf 

    @if (session('error'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 15px; font-weight: bold;">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 15px;">
            <strong style="display: block; margin-bottom: 5px;">Gagal menyimpan menu:</strong>
            <ul style="margin-left: 20px; list-style-type: disc;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <input type="hidden" name="stok" value="99">
        <input type="hidden" name="status" value="tersedia">

        <div>
            <label class="block font-bold mb-2" data-translate="label_menu_name">Nama Menu</label>
            <input type="text" name="nama_menu" placeholder="Masukkan nama menu..." 
                   class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none border-none" required>
        </div>

        <div>
            <label class="block font-bold mb-2">Harga Menu</label>
            <input type="number" name="harga" placeholder="Masukkan harga menu (Contoh: 15000)..." 
                   class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none border-none" required>
        </div>

        <div>
            <label class="block font-bold mb-2" data-translate="label_topping">Topping / Deskripsi Tambahan</label>
            <input type="text" name="deskripsi" placeholder="Contoh: Pakai Telur, Katsu, Kerupuk" 
                   class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none border-none">
        </div>

        <div class="flex justify-between items-center pt-10">
            <a href="{{ route('penjual-beranda') }}" 
               class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold shadow-sm text-sm hover:bg-gray-300 transition"
               data-translate="btn_back">
                Kembali
            </a>

            <button type="submit" 
                    class="bg-orange-500 text-white px-10 py-2 rounded-xl font-bold shadow-sm text-sm hover:bg-orange-600 transition"
                    data-translate="btn_add">
                Tambah
            </button>
        </div>
    </form>
</div>
@endsection