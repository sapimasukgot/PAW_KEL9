<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Profil Admin</title>
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

    <main class="p-4 md:p-8 max-w-5xl mx-auto flex flex-col min-h-[80vh]">
        
        <h2 class="text-2xl md:text-3xl font-bold text-black text-center mb-10">Profil Admin</h2>

        <div class="w-full space-y-4">
            
            <div class="w-full bg-white rounded-3xl p-6 shadow-sm border border-orange-100 flex items-center justify-between">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Admin MakanMart</h3>
                        <p class="text-gray-500 text-sm">admin@makanmart.com</p>
                    </div>
                </div>

                <a href="{{ route('ubah-profil-admin') }}" class="p-3 bg-gray-100 rounded-full hover:bg-orange-100 transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </a>
            </div>

            <a href="{{ route('ubah-bahasa-admin') }}" class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center justify-between hover:bg-orange-50 transition-all group">
                <div class="flex items-center gap-4">
                    <span class="text-xl">🌐</span> 
                    <span class="font-bold text-gray-800">Bahasa</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

<a href="{{ route('pengaturan-akun-admin') }}" class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center justify-between hover:bg-orange-50 transition-all group">
    <div class="flex items-center gap-4">
        <span class="text-xl">🔒</span> 
        <span class="font-bold text-gray-800">Pengaturan Akun</span>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
    </svg>
</a>

        </div>

        <div class="mt-auto pt-16 flex justify-center">
    <a href="{{ route('login') }}" class="w-full bg-white p-4 rounded-2xl shadow-sm flex justify-center items-center gap-2 mt-10 hover:bg-red-50 transition group">
        <span class="text-red-500">🚪</span>
        <span class="font-bold text-gray-800">Keluar Akun</span>
    </a>
        </div>

    </main>

</body>
</html>