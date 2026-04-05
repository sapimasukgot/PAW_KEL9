<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body class="bg-[#fcebda] pb-10">
    @include('pembeli.nav')
    <div class="p-6 space-y-4">
    <div class="bg-white p-6 rounded-3xl shadow-sm flex items-center justify-between relative">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-[#e07b11] rounded-full flex items-center justify-center shadow-md">
                <span class="text-white font-bold text-2xl uppercase">
                    {{ substr("Justin Laksana", 0, 1) }}{{ substr(strrchr("Justin Laksana", " "), 1, 1) }}
                </span>
            </div>
            <div>
                <h2 class="font-bold text-lg">Justin Laksana</h2>
                <p class="text-xs text-gray-500">justin123@gmail.com</p>
                <p class="text-xs text-gray-500">+6212345678</p>
            </div>
        </div>
        <a href="{{ route('pembeli-edit-profil') }}" class="absolute top-4 right-4 text-xl hover:scale-110 transition-transform">✏️</a>
    </div>

    <div class="space-y-3">
        <a href="{{ route('pembeli-riwayat') }}" class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">📋</span> <span class="font-bold flex-1">Riwayat Pemesanan</span>
        </a>
        <a href="{{ route('pembeli-bahasa') }}" class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">🌐</span> <span class="font-bold flex-1">Bahasa</span>
        </a>
        <a href="{{ route('pembeli-pengaturan') }}" class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4 hover:bg-gray-50 transition">
            <span class="text-xl">🔒</span> <span class="font-bold flex-1">Pengaturan Akun</span>
        </a>
    </div>

    <button onclick="confirmAction('logout')" class="w-full bg-white p-4 rounded-2xl shadow-sm flex items-center justify-center gap-4 text-black font-bold mt-10 hover:bg-red-50 transition-colors">
        <span>➡️</span> Keluar Akun
    </button>
</div>

<script>
    function confirmAction(type) {
        let msg = type === 'logout' ? 'Apakah ingin keluar dari akun ini?' : 'Apakah Anda benar-benar ingin menghapus akun?';
        if (confirm(msg)) {
            window.location.href = "{{ route('login') }}";
        }
    }
</script>
</body>
</html>