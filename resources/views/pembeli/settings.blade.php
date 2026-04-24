<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Pengaturan Akun</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;">
    @include('pembeli.nav')

    <div class="w-full p-6 flex flex-col min-h-[85vh]">
        
        <h1 class="text-2xl font-bold text-gray-900 text-center mb-10">Pengaturan Akun</h1>

        <div class="w-full space-y-4">
            
            <a href="{{ route('pembeli-ubah-sandi') }}" class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center gap-4 hover:bg-orange-50 transition-all">
                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center flex-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <span class="font-bold text-gray-800">Ubah Sandi</span>
            </a>

            <a href="{{ route('login') }}" class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center gap-4 hover:bg-orange-50 transition-all">
                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center flex-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-gray-800">Keluar Akun</span>
                    <p class="text-xs text-gray-500 italic">Yakin mau keluar? Pas balik harus masuk akun lagi ya.</p>
                </div>
            </a>

            <div class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center gap-4 cursor-pointer hover:bg-red-50 transition-all">
                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center flex-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-red-500">Hapus Akun</span>
                    <p class="text-xs text-gray-500">Akunmu akan dihapus secara permanen. Jadi kamu gak bisa lagi akses riwayat transaksi dan detail lainnya dari akunmu.</p>
                </div>
            </div>

        </div>

        <div class="mt-auto pt-12">
            <a href="{{ route('pembeli-profil') }}" class="bg-[#D9D9D9] text-gray-900 px-16 py-2 rounded-md font-bold hover:bg-gray-400 transition-all">
                Kembali
            </a>
        </div>

    </div>
</body>
</html>

    <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin untuk menghapus akun ini? Semua data Anda akan dihapus permanen dari sistem.")) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>

</body>
</html>