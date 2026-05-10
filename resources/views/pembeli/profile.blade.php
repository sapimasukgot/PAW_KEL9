@include('pembeli.nav')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title data-translate="title_profile">Profil - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#fcebda] pb-10">
    <div class="p-6 space-y-4">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-xl text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-3xl shadow-sm flex items-center justify-between relative">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-[#e07b11] rounded-full flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-2xl uppercase">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
                </div>
                <div>

                    <h2 class="font-bold text-lg">{{ Auth::user()->name }}</h2>
                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <a href="{{ route('pembeli-edit-profil') }}" class="text-xl hover:scale-110 transition-transform">✏️</a>
        </div>

        <div class="space-y-3">
            <a href="{{ route('pembeli-riwayat') }}"
                class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
                <span class="font-bold flex-1" data-translate="label_riwayat">Riwayat</span>
            </a>
            <a href="{{ route('pembeli-bahasa') }}"
                class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
                <span class="font-bold flex-1" data-translate="label_bahasa">Bahasa</span>
            </a>
            <a href="{{ route('pembeli-pengaturan') }}"
                class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
                <span class="font-bold flex-1" data-translate="label_pengaturan">Pengaturan Akun</span>
            </a>
        </div>

        <button onclick="triggerLogout()"
            class="w-full bg-white p-4 rounded-2xl shadow-sm flex items-center justify-center gap-4 text-black font-bold mt-10 hover:bg-red-50 transition-colors">
            <span>➡️</span> <span data-translate="label_keluar">Keluar Akun</span>
        </button>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

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
</body>

</html>