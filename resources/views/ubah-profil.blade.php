@extends('layout-penjual')

@section('content')
<<<<<<< HEAD
@php
    $nama = session('user_nama', 'Joni Alfreandra');
    $nohp = session('user_nohp', '+6287654321');
    $email = session('user_email', 'jAlfdra123@gmail.com');
@endphp

<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-center mb-8" data-translate="title_edit_profile">Ubah Profil</h2>

    <form action="{{ route('profil-penjual') }}" method="GET" class="space-y-6">
        <div class="flex flex-col items-center gap-2 mb-8">
            <div class="w-24 h-24 bg-gray-300 rounded-full overflow-hidden">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}" alt="avatar">
            </div>
            <button type="button" class="text-xs font-bold text-gray-600 border border-gray-300 px-3 py-1 rounded-lg" data-translate="btn_add_photo">
                Tambah Foto
            </button>
        </div>

        <div>
            <label class="block font-bold mb-2" data-translate="label_name">Nama:</label>
            <input type="text" name="nama" value="{{ $nama }}" class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>

        <div>
            <label class="block font-bold mb-2" data-translate="label_phone">No. HP:</label>
            <input type="text" name="nohp" value="{{ $nohp }}" class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>

        <div>
            <label class="block font-bold mb-2" data-translate="label_email">Email:</label>
            <input type="email" name="email" value="{{ $email }}" class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-0">
        </div>

        <div class="flex justify-between items-center pt-10">
            <a href="{{ route('profil-penjual') }}" class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm text-black inline-block" data-translate="btn_back">
                Kembali
            </a>
            
            <button type="submit" class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm text-black" data-translate="btn_save">
                Simpan
            </button>
        </div>
    </form>
</div>
=======
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8">Ubah Profil</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-xl text-sm font-semibold mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-xl text-xs mb-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route('penjual-update-profil') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex flex-col items-center gap-2 mb-8">
                <div class="w-24 h-24 bg-orange-500 rounded-full flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-4xl uppercase">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
                </div>
            </div>

            <div>
                <label class="block font-bold mb-2">Nama:</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                    class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-2 ring-orange-200">
            </div>

            <div>
                <label class="block font-bold mb-2">Email:</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                    class="w-full p-4 rounded-2xl bg-white shadow-inner border-none focus:ring-2 ring-orange-200">
            </div>

            <div class="flex justify-between items-center pt-10">
                <a href="{{ route('profil-penjual') }}"
                    class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm text-black inline-block">Kembali</a>
                <button type="submit"
                    class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm text-black hover:bg-gray-400 transition-all">Simpan</button>
            </div>
        </form>
    </div>
>>>>>>> 51b0182 (perbaikinhalaman profil penjual dan admin)
@endsection