@extends('layout-penjual')

@section('content')
<div class="max-w-2xl mx-auto flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide text-black" data-translate="title_change_pw">Ubah Sandi</h2>

    <div class="flex-grow space-y-6">
        <div>
            <label class="block font-bold mb-2 text-black" data-translate="label_old_pw">Password Lama:</label>
            <input type="password" placeholder="********" 
                   class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>

        <div>
            <label class="block font-bold mb-2 text-black" data-translate="label_new_pw">Password Baru:</label>
            <input type="password" placeholder="********" 
                   class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>

        <div>
            <label class="block font-bold mb-2 text-black" data-translate="label_confirm_pw">Konfirmasi Password:</label>
            <input type="password" placeholder="********" 
                   class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>
    </div>

    <div class="flex justify-between items-center py-10">
        <a href="{{ route('pengaturan-akun-penjual') }}" 
           class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm shadow-sm hover:bg-gray-300 transition text-black"
           data-translate="btn_back">
            Kembali
        </a>
        
        <a href="{{ route('pengaturan-akun-penjual') }}" 
           class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm shadow-sm hover:bg-gray-300 transition text-black"
           data-translate="btn_save">
            Simpan
        </a>
    </div>
</div>
@endsection