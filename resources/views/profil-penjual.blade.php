@extends('layout-penjual')

@section('content')
<<<<<<< HEAD
@php
    if (request()->has('nama')) {
        session([
            'user_nama' => request('nama'),
            'user_nohp' => request('nohp'),
            'user_email' => request('email')
        ]);
    }
    $nama = session('user_nama', 'Joni Alfreandra');
    $nohp = session('user_nohp', '+6287654321');
    $email = session('user_email', 'jAlfdra123@gmail.com');
@endphp

<div class="space-y-6">
    <div class="bg-white p-6 rounded-[2rem] shadow-sm flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="w-20 h-20 bg-gray-300 rounded-full overflow-hidden flex-shrink-0">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}" alt="avatar">
=======
    <div class="space-y-6">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-xl text-sm font-semibold">
                {{ session('success') }}
>>>>>>> 51b0182 (perbaikinhalaman profil penjual dan admin)
            </div>
        @endif

<<<<<<< HEAD
    <div class="space-y-4">
        <a href="{{ route('riwayat-penjual') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">📄</span>
            <span class="font-bold" data-translate="label_order_history">Riwayat Pesanan</span>
        </a>
        <a href="{{ route('ubah-bahasa-penjual') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">🌐</span>
            <span class="font-bold" data-translate="label_language">Bahasa</span>
        </a>
        <a href="{{ route('pengaturan-akun-penjual') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">🔒</span>
            <span class="font-bold" data-translate="label_account_settings">Pengaturan Akun</span>
        </a>
    </div>

    <button onclick="handleLogout()" class="w-full bg-white p-4 rounded-2xl shadow-sm flex justify-center items-center gap-2 mt-10 hover:bg-red-50 transition group">
        <span class="text-red-500">🚪</span>
        <span class="font-bold text-gray-800" data-translate="label_logout">Keluar Akun</span>
    </button>
</div>

<script>
    function handleLogout() {
        const lang = localStorage.getItem('app_lang') || 'id';
        
        showCustomModal({
            title: dictionary[lang]['modal_logout_seller_title'],
            message: dictionary[lang]['modal_logout_seller_msg'],
            actionText: dictionary[lang]['label_logout'],
            actionUrl: "{{ route('login') }}"
        });
    }

    function showCustomModal(config) {
        const lang = localStorage.getItem('app_lang') || 'id';
        const { title, message, actionText, actionUrl } = config;
        const existing = document.getElementById('global-modal');
        if (existing) existing.remove();

        const modalHTML = `
            <div id="global-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[9999] p-4">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl max-w-sm w-full text-center border border-gray-100 animate-in zoom-in duration-300">
                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">${title}</h3>
                    <p class="text-gray-500 mb-8 text-sm leading-relaxed">${message}</p>
                    <div class="flex flex-col gap-3">
                        <button id="btn-timer-confirm" disabled class="w-full py-4 bg-red-500 text-white rounded-2xl font-bold shadow-lg opacity-50 cursor-not-allowed transition-all">
                            ${actionText} (5)
                        </button>
                        <button onclick="document.getElementById('global-modal').remove()" class="w-full py-4 bg-gray-100 text-gray-700 rounded-2xl font-bold hover:bg-gray-200 transition-all">
                            ${dictionary[lang]['btn_cancel']}
                        </button>
                    </div>
=======
        <div class="bg-white p-6 rounded-[2rem] shadow-sm flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-3xl uppercase">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
>>>>>>> 51b0182 (perbaikinhalaman profil penjual dan admin)
                </div>
                <div>
                    <h3 class="text-xl font-bold">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <a href="{{ route('ubah-profil') }}" class="p-2 hover:bg-gray-100 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </a>
        </div>

<<<<<<< HEAD
        btn.onclick = () => window.location.href = actionUrl;
    }
</script>
=======
        <div class="space-y-4">
            <a href="{{ route('riwayat-penjual') }}"
                class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
                <span class="text-xl">📄</span>
                <span class="font-bold">Riwayat Pesanan</span>
            </a>
            <a href="{{ route('ubah-bahasa-penjual') }}"
                class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
                <span class="text-xl">🌐</span>
                <span class="font-bold">Bahasa</span>
            </a>
            <a href="{{ route('pengaturan-akun-penjual') }}"
                class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
                <span class="text-xl">🔒</span>
                <span class="font-bold">Pengaturan Akun</span>
            </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>

        <button onclick="handleLogout()"
            class="w-full bg-white p-4 rounded-2xl shadow-sm flex justify-center items-center gap-2 mt-10 hover:bg-red-50 transition group">
            <span class="text-red-500">🚪</span>
            <span class="font-bold text-gray-800">Keluar Akun</span>
        </button>
    </div>

    <script>
        let timerInterval;

        function showCustomModal(config) {
            const { title, message, actionText, onConfirm } = config;
            const existing = document.getElementById('global-modal');
            if (existing) existing.remove();

            const modalHTML = `
                <div id="global-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[9999] p-4">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl max-w-sm w-full text-center border border-gray-100">
                        <h3 class="text-2xl font-bold mb-2 text-gray-900">${title}</h3>
                        <p class="text-gray-500 mb-8 text-sm leading-relaxed">${message}</p>
                        <div class="flex flex-col gap-3">
                            <button id="btn-timer-confirm" disabled class="w-full py-4 bg-red-500 text-white rounded-2xl font-bold opacity-50 cursor-not-allowed transition-all">
                                ${actionText} (5)
                            </button>
                            <button onclick="document.getElementById('global-modal').remove()" class="w-full py-4 bg-gray-100 text-gray-700 rounded-2xl font-bold hover:bg-gray-200 transition-all">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>`;

            document.body.insertAdjacentHTML('beforeend', modalHTML);

            let timeLeft = 5;
            const btn = document.getElementById('btn-timer-confirm');

            clearInterval(timerInterval);
            timerInterval = setInterval(() => {
                timeLeft--;
                btn.innerText = `${actionText} (${timeLeft})`;
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                    btn.innerText = actionText;
                }
            }, 1000);

            btn.onclick = onConfirm;
        }

        function handleLogout() {
            showCustomModal({
                title: 'Keluar Akun?',
                message: 'Apakah Anda yakin ingin keluar dari akun Penjual?',
                actionText: 'Keluar Akun',
                onConfirm: () => document.getElementById('logout-form').submit()
            });
        }
    </script>
>>>>>>> 51b0182 (perbaikinhalaman profil penjual dan admin)
@endsection