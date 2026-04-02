@extends('layout-penjual')

@section('content')
<div class="space-y-4">
    <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center justify-between">
        <div class="flex items-center gap-4">
            <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            </div>
            <div>
                <h3 class="font-bold text-xl">Joni Alfreandra</h3>
                <p class="text-gray-500">jAlfdra123@gmail.com</p>
                <p class="text-gray-500">+6287654321</p>
            </div>
        </div>
        <button class="p-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
    </div>

    <div class="space-y-2">
        <a href="{{ route('riwayat-penjual') }}" class="block bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4">
            <span class="text-2xl">📋</span>
            <span class="font-bold text-lg">Riwayat Pesanan</span>
        </a>
        <a href="/bahasa" class="block bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4">
            <span class="text-2xl">🌐</span>
            <span class="font-bold text-lg">Bahasa</span>
        </a>
        <a href="/pengaturan" class="block bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4">
            <span class="text-2xl">🔒</span>
            <span class="font-bold text-lg">Pengaturan Akun</span>
        </a>
    </div>

    <button class="w-full bg-white p-4 rounded-2xl shadow-sm flex justify-center items-center gap-2 mt-6">
        <span>🚪</span>
        <span class="font-bold">Keluar Akun</span>
    </button>
</div>
@endsection