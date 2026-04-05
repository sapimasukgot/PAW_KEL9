@extends('layout-penjual')

@section('content')
@php
    // Menangkap data jika datang dari halaman ubah-profil
    if (request()->has('nama')) {
        session([
            'user_nama' => request('nama'),
            'user_nohp' => request('nohp'),
            'user_email' => request('email')
        ]);
    }

    // Mengambil data dari session, jika kosong pakai data default
    $nama = session('user_nama', 'Joni Alfreandra');
    $nohp = session('user_nohp', '+6287654321');
    $email = session('user_email', 'jAlfdra123@gmail.com');
@endphp

<div class="space-y-6">
    <div class="bg-white p-6 rounded-[2rem] shadow-sm flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="w-20 h-20 bg-gray-300 rounded-full overflow-hidden flex-shrink-0">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}" alt="avatar">
            </div>
            <div>
                <h3 class="text-xl font-bold">{{ $nama }}</h3>
                <p class="text-gray-500 text-sm">{{ $email }}</p>
                <p class="text-gray-500 text-sm">{{ $nohp }}</p>
            </div>
        </div>
        <a href="{{ route('ubah-profil') }}" class="p-2 hover:bg-gray-100 rounded-full transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
        </a>
    </div>

    <div class="space-y-4">
        <a href="{{ route('riwayat-penjual') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">📄</span>
            <span class="font-bold">Riwayat Pesanan</span>
        </a>
        <a href="{{ route('ubah-bahasa') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">🌐</span>
            <span class="font-bold">Bahasa</span>
        </a>
        <a href="{{ route('pengaturan-akun') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">🔒</span>
            <span class="font-bold">Pengaturan Akun</span>
        </a>
    </div>

    <a href="{{ route('login') }}" class="w-full bg-white p-4 rounded-2xl shadow-sm flex justify-center items-center gap-2 mt-10 hover:bg-red-50 transition group">
        <span class="text-red-500">🚪</span>
        <span class="font-bold text-gray-800">Keluar Akun</span>
    </a>
</div>
@endsection