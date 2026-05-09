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
        <div class="bg-white p-6 rounded-3xl shadow-sm flex items-center justify-between relative">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-[#e07b11] rounded-full flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-2xl uppercase">JL</span>
                </div>
                <div>
                    <h2 class="font-bold text-lg" id="display-name">Justin Laksana</h2>
                    <p class="text-xs text-gray-500">justin123@gmail.com</p>
                </div>
            </div>
            <a href="{{ route('pembeli-edit-profil') }}" class="text-xl">✏️</a>
        </div>

        <div class="space-y-3">
            <a href="{{ route('pembeli-riwayat') }}" class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4">
                📋 <span class="font-bold flex-1" data-translate="label_riwayat">Riwayat</span>
            </a>
            <a href="{{ route('pembeli-bahasa') }}" class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4">
                🌐 <span class="font-bold flex-1" data-translate="label_bahasa">Bahasa</span>
            </a>
            <a href="{{ route('pembeli-pengaturan') }}" class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4">
                ⚙️ <span class="font-bold flex-1" data-translate="label_pengaturan">Pengaturan Akun</span>
            </a>
        </div>

        <button onclick="triggerLogout()" class="w-full bg-white p-4 rounded-2xl shadow-sm flex items-center justify-center gap-4 text-black font-bold mt-10 hover:bg-red-50 transition-colors">
            <span>➡️</span> <span data-translate="label_keluar">Keluar Akun</span>
            
        </button>
    </div>
    <script>
        function triggerLogout() {
            if (confirm(dictionary[localStorage.getItem('app_lang') || 'id']['modal_logout_confirm_msg'] || "Are you sure you want to log out?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>
</button>
</body>
</html>