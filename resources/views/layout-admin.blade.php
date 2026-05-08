<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { font-family: 'Inter', sans-serif; background-color: #fcebda; }</style>
</head>
<body class="min-h-screen flex flex-col">
    <header class="bg-[#f7e4cf] p-4 shadow-sm border-b border-[#e6d1ba] sticky top-0 z-40">
        <h1 class="text-xl md:text-2xl font-bold text-[#634a2c] text-center mb-3">MakanMart Admin</h1>
        <div class="flex gap-3 justify-center">
            <a href="{{ route('admin-beranda') }}" class="{{ request()->routeIs('admin-beranda*') ? 'bg-[#e6d1ba]' : 'bg-white' }} px-6 py-1.5 rounded-full font-semibold text-sm">Beranda</a>
            <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile*') ? 'bg-[#e6d1ba]' : 'bg-white' }} px-6 py-1.5 rounded-full font-semibold text-sm">Profil</a>
        </div>
    </header>
    <main class="flex-1 p-6 max-w-5xl mx-auto w-full">@yield('content')</main>
    <script>
    let globalTimer;
    function showCustomModal(config) {
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
                    <button onclick="document.getElementById('global-modal').remove()" class="w-full py-4 bg-gray-100 text-gray-700 rounded-2xl font-bold hover:bg-gray-200 transition-all">Batal</button>
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