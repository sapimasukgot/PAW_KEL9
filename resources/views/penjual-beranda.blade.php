@extends('layout-penjual')

@section('content')
@php

    if (!session()->has('daftar_menu')) {
        session(['daftar_menu' => ['Nasi Ayam Goreng', 'Nasi Ayam Geprek']]);
        session()->save();
    }

    $menus = session('daftar_menu');

    if (request()->has('nama')) {
        $namaBaru = request()->query('nama');
        if (!in_array($namaBaru, $menus)) {
            $menus[] = $namaBaru;
            session(['daftar_menu' => $menus]);
            session()->save(); 
            
            echo "<script>window.location.href='".route('penjual-beranda')."';</script>";
            exit;
        }
    }


    if (request()->has('delete_index')) {
        $indexHapus = request()->query('delete_index');
        
        if (isset($menus[$indexHapus])) {
            unset($menus[$indexHapus]); 
            $menus = array_values($menus); 
            
            session(['daftar_menu' => $menus]); 
            session()->save(); 
        }

        echo "<script>window.location.href='".route('penjual-beranda')."';</script>";
        exit;
    }
@endphp 

<div class="text-center mb-8">
    <h2 class="text-2xl font-bold">Toko Nasi</h2>
</div>

<div class="flex justify-between items-center mb-4">
    <h3 class="font-bold text-lg">Daftar Menu pada Toko Nasi</h3>
    <div class="flex gap-2">
        <a href="{{ route('tambah_menu') }}" class="bg-white border px-4 py-1 rounded-lg text-sm shadow-sm">Tambah Menu</a>
        <button onclick="toggleHapusMode()" class="bg-[#CBD5E1] px-4 py-1 rounded-lg text-sm shadow-sm">Hapus Menu</button>
    </div>
</div>

<div class="max-h-[400px] overflow-y-auto pr-2">
    <div class="space-y-3">
        @foreach (session('daftar_menu', ['Nasi Ayam Goreng', 'Nasi Ayam Geprek']) as $index => $menu)
        <div class="bg-white p-3 rounded-xl shadow-sm flex justify-between items-center">
            <div class="flex gap-4 items-center">
                <span class="text-gray-500 font-bold">{{ $index + 1 }}</span>
                <span class="font-medium">{{ $menu }}</span>
            </div>
            <button onclick="confirmHapusMenu('{{ $menu }}', '{{ route('penjual-beranda', ['delete_index' => $index]) }}')" 
                    class="btn-hapus-item hidden bg-[#FF4D4D] text-white text-[10px] px-3 py-1 rounded-full">
                Hapus
            </button>
        </div>
        @endforeach
    </div>
</div>

<script>
    function toggleHapusMode() {
        document.querySelectorAll('.btn-hapus-item').forEach(el => el.classList.toggle('hidden'));
    }

    function confirmHapusMenu(nama, url) {
        showCustomModal({
            title: 'Hapus Menu?',
            message: `Apakah anda yakin ingin menghapus "${nama}"? Tindakan ini tidak dapat dibatalkan.`,
            actionText: 'Ya, Hapus',
            actionUrl: url
        });
    }
</script>
@endsection