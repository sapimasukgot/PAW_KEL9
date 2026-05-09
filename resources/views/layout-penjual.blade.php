<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Penjual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        body { background-color: #F7EFDD; }
    </style>
</head>
<body class="min-h-screen flex flex-col">
<nav class="bg-white border-b border-gray-200 p-4 flex-none">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-[#7A5C2D] font-bold text-xl mb-3">MakanMart</h1>
        <div class="flex gap-2 overflow-x-auto no-scrollbar">
            @php $r = request(); @endphp
            
            <a href="{{ route('penjual-beranda') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ $r->routeIs('penjual-beranda*') || $r->routeIs('tambah_menu*') ? 'bg-[#EFDEB9]' : 'bg-white' }}">
               Beranda
            </a>
            
            <a href="{{ route('pesanan-penjual') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ $r->routeIs('pesanan-penjual*') || $r->routeIs('pesanan-detail*') ? 'bg-[#EFDEB9]' : 'bg-white' }}">
               Pesanan
            </a>

            <a href="{{ route('ulasan-penjual') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ $r->routeIs('ulasan-penjual*') || $r->routeIs('ulasan-detail*') ? 'bg-[#EFDEB9]' : 'bg-white' }}">
               Ulasan
            </a>

            <a href="{{ route('riwayat-penjual') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ $r->routeIs('riwayat-penjual*') ? 'bg-[#EFDEB9]' : 'bg-white' }}">
               Riwayat
            </a>

            <a href="{{ route('profil-penjual') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ 
                    $r->routeIs('profil-penjual*') || 
                    $r->routeIs('ubah-profil*') || 
                    $r->routeIs('pengaturan-akun*') || 
                    $r->routeIs('ubah-sandi*') 
                    ? 'bg-[#EFDEB9]' : 'bg-white' 
               }}">
               Profil
            </a>
        </div>
    </div>
</nav>

    <main class="flex-1 p-6">
        <div class="max-w-4xl mx-auto">
            @yield('content')
        </div>
    </main>

    <script>
    let globalTimer;
    function showCustomModal(config) {
        const { title, message, actionText, actionUrl } = config;
        const existing = document.getElementById('global-modal');
        if (existing) existing.remove();

        const modalHTML = `
            <div id="global-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[9999] p-4">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl max-w-sm w-full text-center animate-in zoom-in duration-300">
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">${title}</h3>
                    <p class="text-gray-500 mb-8 text-sm">${message}</p>
                    <div class="flex flex-col gap-3">
                        <button id="btn-timer-confirm" disabled class="w-full py-4 bg-red-500 text-white rounded-2xl font-bold opacity-50 cursor-not-allowed">
                            ${actionText} (5)
                        </button>
                        <button onclick="document.getElementById('global-modal').remove()" class="w-full py-4 bg-gray-100 text-gray-700 rounded-2xl font-bold">Batal</button>
                    </div>
                </div>
            </div>`;
        
        document.body.insertAdjacentHTML('beforeend', modalHTML);
        let timeLeft = 5;
        const btn = document.getElementById('btn-timer-confirm');
        
        clearInterval(globalTimer);
        globalTimer = setInterval(() => {
            timeLeft--;
            btn.innerText = `${actionText} (${timeLeft})`;
            if (timeLeft <= 0) {
                clearInterval(globalTimer);
                btn.disabled = false;
                btn.classList.remove('opacity-50', 'cursor-not-allowed');
                btn.innerText = actionText;
            }
        }, 1000);

        btn.onclick = () => window.location.href = actionUrl;
    }
    </script>
</body>
</html>