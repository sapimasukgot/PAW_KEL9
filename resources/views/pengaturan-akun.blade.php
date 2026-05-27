@extends('layout-penjual')

@section('content')
    <div class="max-w-2xl mx-auto space-y-6">
        <h2 class="text-2xl font-bold text-center mb-8" data-translate="title_settings">Pengaturan Akun</h2>

        <a href="{{ route('ubah-sandi-penjual') }}"
            class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">🔒</span>
            <span class="font-bold text-lg" data-translate="label_change_pw">Ubah Sandi</span>
        </a>

        <a href="{{ route('logout') }}"
            class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">🚪</span>
            <div class="flex flex-col">
                <span class="font-bold text-lg" data-translate="label_logout">Keluar Akun</span>
                <span class="text-xs text-gray-400 italic" data-translate="desc_logout_warning">Yakin mau keluar? Pas balik
                    harus masuk akun lagi ya</span>
            </div>
        </a>

        <form action="{{ route('hapus-akun-penjual') }}" method="POST"
            onsubmit="return confirm('Yakin ingin menghapus akun secara permanen?')">
            @csrf
            <button type="submit"
                class="w-full bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 border-red-100 border cursor-pointer hover:bg-red-50 transition text-left">
                <span class="text-xl">🗑️</span>
                <div class="flex flex-col text-red-500">
                    <span class="font-bold text-lg" data-translate="label_delete_account">Hapus Akun</span>
                    <span class="text-xs italic" data-translate="desc_delete_account_warning">Akunmu akan dihapus secara
                        permanen.</span>
                </div>
            </button>
        </form>

        <div class="pt-10">
            <a href="{{ route('profil-penjual') }}"
                class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold text-sm text-black inline-block"
                data-translate="btn_back">Kembali</a>
        </div>
    </div>
@endsection