<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#fcebda] min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-sm bg-white rounded-[2.5rem] shadow-2xl p-10 flex flex-col items-center">
        <h1 class="text-2xl font-[900] text-black tracking-tighter mb-1 uppercase text-center">Pengaturan Akun</h1>
        <div class="w-12 h-1.5 bg-[#e07b11] rounded-full mb-10"></div>

        <div class="w-full space-y-4 mb-10">
            <a href="{{ route('pembeli-ubah-sandi') }}" class="flex items-center justify-between p-5 bg-gray-50 rounded-2xl border border-gray-100 hover:bg-gray-100 transition-all group">
                <span class="font-bold text-gray-700">Ubah Sandi</span>
                <svg class="w-5 h-5 text-[#e07b11] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ route('pembeli-bahasa') }}" class="flex items-center justify-between p-5 bg-gray-50 rounded-2xl border border-gray-100 hover:bg-gray-100 transition-all group">
                <span class="font-bold text-gray-700">Ubah Bahasa</span>
                <svg class="w-5 h-5 text-[#e07b11] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <div class="w-full space-y-3">
            <a href="{{ route('login') }}" class="block w-full bg-[#e07b11] hover:bg-[#c26a0e] text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-orange-100 text-center uppercase text-[11px] tracking-[0.2em] transition-all">
                Keluar Akun
            </a>

            <form action="{{ route('hapus-akun') }}" method="POST" id="delete-form">
                @csrf
                <button type="button" onclick="confirmDelete()" class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-extrabold py-4 rounded-2xl text-center uppercase text-[11px] tracking-[0.2em] transition-all border border-red-100">
                    Hapus Akun Permanen
                </button>
            </form>
            
            <a href="{{ route('pembeli-profil') }}" class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-500 font-extrabold py-4 rounded-2xl text-center uppercase text-[11px] tracking-[0.2em] transition-all">
                Kembali
            </a>
        </div>
    </div>

    <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin untuk menghapus akun ini? Semua data Anda akan dihapus permanen dari sistem.")) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>

</body>
</html>