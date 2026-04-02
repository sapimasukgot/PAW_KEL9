<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Penjual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 10px; }
        body { overflow: hidden; }
    </style>
</head>
<body class="bg-[#F7EFDD] h-screen flex flex-col">
    <nav class="bg-white border-b border-gray-200 p-4 flex-none">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-[#7A5C2D] font-bold text-xl mb-3">MakanMart</h1>
            <div class="flex gap-2">
                <a href="{{ route('penjual-beranda') }}" 
                   class="px-4 py-1 rounded-full border transition-colors {{ Route::is('penjual-beranda') || Route::is('tambah-menu') ? 'bg-[#EFDEB9] border-[#EFDEB9]' : 'bg-white' }}">
                   Beranda
                </a>
        
                <a href="{{ route('pesanan-penjual') }}" 
                   class="px-4 py-1 rounded-full border transition-colors {{ Route::is('pesanan-penjual') || Route::is('pesanan-detail') ? 'bg-[#EFDEB9] border-[#EFDEB9]' : 'bg-white' }}">
                   Pesanan
                </a>
        
                <a href="{{ route('ulasan-penjual') }}" 
                   class="px-4 py-1 rounded-full border transition-colors {{ Route::is('ulasan-penjual') || Route::is('ulasan-detail') ? 'bg-[#EFDEB9] border-[#EFDEB9]' : 'bg-white' }}">
                   Ulasan
                </a>
        
                <a href="{{ route('riwayat-penjual') }}" 
                   class="px-4 py-1 rounded-full border transition-colors {{ Route::is('riwayat-penjual') || Route::is('riwayat-detail') ? 'bg-[#EFDEB9] border-[#EFDEB9]' : 'bg-white' }}">
                   Riwayat
                </a>
        
                <a href="{{ route('profil-penjual') }}" 
                   class="px-4 py-1 rounded-full border transition-colors {{ Route::is('profil-penjual') ? 'bg-[#EFDEB9] border-[#EFDEB9]' : 'bg-white' }}">
                   Profil
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-1 overflow-y-auto custom-scrollbar p-6">
        <div class="max-w-4xl mx-auto">
            @yield('content')
        </div>
    </main>
</body>
</html>