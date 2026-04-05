@extends('layout-penjual')

@section('content')
@php
    // Ambil data session agar saat halaman dibuka, inputan terisi data terakhir
    $nama = session('user_nama', 'Joni Alfreandra');
    $nohp = session('user_nohp', '+6287654321');
    $email = session('user_email', 'jAlfdra123@gmail.com');
@endphp

<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-center mb-8">Ubah Profil</h2>

    <form action="{{ route('profil-penjual') }}" method="GET" class="space-y-6">
        <div class="flex flex-col items-center gap-2 mb-8">
            <div class="w-24 h-24 bg-gray-300 rounded-full overflow-hidden">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}" alt="avatar">
            </div>
            <button type="button" class="text-xs font-bold text-gray-600 border border-gray-300 px-3 py-1 rounded-lg">Tambah Foto</button>
        </div>

        <div>
            <label class="block font-bold mb-2">Nama:</label>
            <input type="text" name="nama" value="{{ $nama }}" class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>

        <div>
            <label class="block font-bold mb-2">No. HP:</label>
            <input type="text" name="nohp" value="{{ $nohp }}" class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>

        <div>
            <label class="block font-bold mb-2">Email:</label>
            <input type="email" name="email" value="{{ $email }}" class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>

        <div class="flex justify-between items-center pt-10">
            <a href="{{ route('profil-penjual') }}" class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm text-black inline-block">Kembali</a>
            
            <button type="submit" class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm text-black">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection