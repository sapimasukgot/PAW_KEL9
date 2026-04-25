<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Ubah Sandi Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#fcebda] min-h-screen">
    <header class="bg-[#f7e4cf] p-4 shadow-sm border-b border-[#e6d1ba] sticky top-0 z-40">
        <h1 class="text-xl md:text-2xl font-bold text-[#634a2c] mb-3 md:mb-2 px-2 md:px-4 text-center md:text-left tracking-tight">
            MakanMart
        </h1>

        <div class="flex gap-3 px-2 md:px-4 justify-center md:justify-start">
            <a href="{{ route('admin-beranda') }}"
                class="bg-white whitespace-nowrap px-6 py-1.5 rounded-full font-semibold text-black text-sm shadow-sm border border-transparent">
                Beranda
            </a>
            <a href="{{ route('profile') }}"
                class="bg-[#e6d1ba] whitespace-nowrap px-6 py-1.5 rounded-full font-semibold text-black text-sm shadow-sm border border-transparent">
                Profil
            </a>
        </div>
    </header>

    <div class="w-full p-6 flex flex-col min-h-[85vh]">
        
        <h1 class="text-2xl font-bold text-gray-900 text-center mb-10">Ubah Sandi</h1>

        <div class="w-full space-y-6">
            
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-900 ml-4">Password Lama:</label>
                <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                    <input type="password" value="********" readonly 
                           class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-900 ml-4">Password Baru:</label>
                <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                    <input type="password" value="********" readonly 
                           class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-900 ml-4">Konfirmasi Password:</label>
                <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                    <input type="password" value="********" readonly 
                           class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
                </div>
            </div>

        </div>

        <div class="mt-auto pt-12 flex justify-between items-center px-2">
            <a href="{{ route('pengaturan-akun-admin') }}" class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm">
                Kembali
            </a>

            <a href="{{ route('profile') }}" class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm text-center">
                Simpan
            </a>
        </div>

    </div>
</body>
</html>