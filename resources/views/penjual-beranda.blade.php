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

<input type="checkbox" id="toggle-hapus" class="hidden shadow-none">

<div class="flex justify-between items-center mb-4">
    <h3 class="font-bold text-lg">Daftar Menu pada Toko Nasi</h3>
    <div class="flex gap-2">
        <a href="{{ route('tambah_menu') }}" class="bg-white border px-4 py-1 rounded-lg text-sm shadow-sm hover:bg-gray-50 transition">
            Tambah Menu
        </a>
        <label for="toggle-hapus" class="cursor-pointer bg-[#CBD5E1] px-4 py-1 rounded-lg text-sm shadow-sm select-none hover:bg-[#b8c5d6] transition">
            Hapus Menu
        </label>
    </div>
</div>

<div class="max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
    <div class="space-y-3">
        @foreach ($menus as $index => $menu)
        <div class="bg-white p-3 rounded-xl shadow-sm flex justify-between items-center">
            <div class="flex gap-4 items-center">
                <span class="text-gray-500 font-bold">{{ $index + 1 }}</span>
                <span class="font-medium">{{ $menu }}</span>
            </div>
            
            <a href="#modal-hapus-{{ $index }}" class="btn-merah-hapus bg-[#FF4D4D] text-white text-[10px] px-3 py-1 rounded-full shadow-sm hover:bg-red-600 transition">
                Hapus
            </a>
        </div>

        <div id="modal-hapus-{{ $index }}" class="fixed inset-0 bg-black/50 hidden target:flex items-center justify-center z-50">
            <div class="bg-white p-8 rounded-[2.5rem] shadow-xl max-w-sm w-full text-center mx-4 border border-gray-100">
                <div class="mb-8">
                    <h3 class="text-lg font-bold leading-tight">Apakah anda yakin ingin menghapus <br><span class="text-red-500">"{{ $menu }}"</span>?</h3>
                </div>
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('penjual-beranda', ['delete_index' => $index]) }}" 
                       class="bg-[#FF4D4D] text-white px-10 py-2 rounded-xl font-bold text-sm shadow-sm hover:bg-red-600 transition">
                        Ya
                    </a>
                    <a href="#" class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm shadow-sm hover:bg-gray-300 transition text-black">
                        Tidak
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .btn-merah-hapus { display: none; }
    #toggle-hapus:checked ~ div .btn-merah-hapus { display: block; }
    [id^="modal-hapus-"]:target { display: flex; }
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 10px; }
</style>
@endsection