@extends('layout-penjual')

@section('content')
    <div class="space-y-6">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-xl text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-orange-100 flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-3xl uppercase">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <a href="{{ route('ubah-profil') }}" class="p-3 bg-gray-100 rounded-full hover:bg-orange-100 transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-orange-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </a>
        </div>

        <div class="space-y-4">
            <a href="{{ route('riwayat-penjual') }}"
                class="bg-white p-6 rounded-2xl shadow-sm border border-orange-100 flex items-center gap-4 hover:bg-orange-50 transition-all group">
                <span class="text-xl">📄</span>
                <span class="font-bold text-gray-800" data-translate="label_order_history">Riwayat Pesanan</span>
            </a>
            <a href="{{ route('ubah-bahasa-penjual') }}"
                class="bg-white p-6 rounded-2xl shadow-sm border border-orange-100 flex items-center gap-4 hover:bg-orange-50 transition-all group">
                <span class="text-xl">🌐</span>
                <span class="font-bold text-gray-800" data-translate="label_language">Bahasa</span>
            </a>
            <a href="{{ route('pengaturan-akun-penjual') }}"
                class="bg-white p-6 rounded-2xl shadow-sm border border-orange-100 flex items-center gap-4 hover:bg-orange-50 transition-all group">
                <span class="text-xl">🔒</span>
                <span class="font-bold text-gray-800" data-translate="label_account_settings">Pengaturan Akun</span>
            </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>

        <button onclick="triggerLogout()"
            class="w-full bg-white p-4 rounded-2xl shadow-sm flex items-center justify-center gap-4 text-black font-bold mt-10 hover:bg-red-50 transition-colors border border-orange-50">
            <span>➡️</span> <span data-translate="label_logout">Keluar Akun</span>
        </button>
    </div>

    <script>
        function triggerLogout() {
            const lang = localStorage.getItem('app_lang') || 'id';

            const msg = (typeof dictionary !== 'undefined' && dictionary[lang] && dictionary[lang]['modal_logout_message'])
                ? dictionary[lang]['modal_logout_message']
                : 'Apakah Anda yakin ingin keluar?';

            if (confirm(msg)) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
@endsection