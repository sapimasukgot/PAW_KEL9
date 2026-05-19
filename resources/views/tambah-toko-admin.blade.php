@extends('layout-admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-[2.5rem] shadow-sm border border-orange-100">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800" data-translate="title_add_store">Tambah Toko Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-xl text-xs mb-5 shadow-sm">
            <span class="font-bold block mb-1">Gagal Menyimpan Data:</span>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.store_toko') }}" method="POST" class="space-y-5">
        @csrf
        
        <div class="space-y-2">
            <label class="block text-sm font-bold text-gray-700 ml-4">Pilih Pemilik / Penjual Toko</label>
            <select name="user_id" required class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner appearance-none">
                <option value="">-- Pilih User Penjual --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-bold text-gray-700 ml-4" data-translate="label_store_name">Nama Lapak</label>
            <input type="text" name="nama_toko" value="{{ old('nama_toko') }}" placeholder="Contoh: Warung Nasi Goreng Katsu" required
                   class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-bold text-gray-700 ml-4">Lokasi / Nomor Lapak Kantin</label>
            <input type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Kantin FILKOM Lapak 4" required
                   class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 ml-4">Jam Buka</label>
                <input type="time" name="jam_buka" value="{{ old('jam_buka') }}" required
                       class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 ml-4">Jam Tutup</label>
                <input type="time" name="jam_tutup" value="{{ old('jam_tutup') }}" required
                       class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
            </div>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('admin-beranda') }}" 
               class="bg-gray-100 text-gray-700 px-8 py-3 rounded-xl font-bold hover:bg-gray-200 transition-all block text-center" 
               data-translate="btn_cancel">
                Batal
            </a>
            
            <button type="submit" 
                    class="bg-orange-500 text-white px-8 py-3 rounded-xl font-bold hover:bg-orange-600 transition-all shadow-md" 
                    data-translate="btn_add">
                Tambah Toko
            </button>
        </div>
    </form>
</div>
@endsection