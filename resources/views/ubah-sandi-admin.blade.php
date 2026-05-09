@extends('layout-admin')

@section('content')
<div class="w-full p-6 flex flex-col min-h-[85vh]">
    <h1 class="text-2xl font-bold text-gray-900 text-center mb-10">Ubah Sandi</h1>

    <div class="w-full space-y-6">
        <div class="space-y-2">
            <label class="block text-sm font-bold text-gray-900 ml-4">Password Lama:</label>
            <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                <input type="password" value="********" readonly 
                       class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-bold text-gray-900 ml-4">Password Baru:</label>
            <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                <input type="password" value="********" readonly 
                       class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-bold text-gray-900 ml-4">Konfirmasi Password:</label>
            <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                <input type="password" value="********" readonly 
                       class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
            </div>
        </div>
    </div>

    <div class="mt-auto pt-12 flex justify-between items-center px-2">
        <a href="{{ route('pengaturan-akun-admin') }}" class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm">
            Kembali
        </a>

        <a href="{{ route('profile') }}" class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm text-center">
            Simpan
        </a>
    </div>
</div>
@endsection