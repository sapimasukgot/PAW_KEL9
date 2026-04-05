@extends('layout-penjual')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <h2 class="text-2xl font-bold text-center mb-8">Pengaturan Akun</h2>

    <a href="{{ url('ubah-sandi') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
        <span class="text-xl">🔒</span>
        <span class="font-bold text-lg">Ubah Sandi</span>
    </a>

    <a href="{{ route('login') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
        <span class="text-xl">🚪</span>
        <div class="flex flex-col">
            <span class="font-bold text-lg">Keluar Akun</span>
            <span class="text-xs text-gray-400 italic">Yakin mau keluar? Pas balik harus masuk akun lagi ya</span>
        </div>
    </a>

    <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 border-red-100 border">
        <span class="text-xl">🗑️</span>
        <div class="flex flex-col text-red-500">
            <span class="font-bold text-lg">Hapus Akun</span>
            <span class="text-xs italic">Akunmu akan dihapus secara permanen.</span>
        </div>
    </div>

    <div class="pt-10">
        <a href="{{ route('profil-penjual') }}" class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm text-black inline-block">Kembali</a>
    </div>
</div>
@endsection