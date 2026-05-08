@extends('layout-admin')

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
                    <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center overflow-hidden shadow-inner">
                        <span class="text-white font-bold text-3xl">A</span>
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
            <button onclick="handleAdminLogout()" class="w-full bg-white p-4 rounded-2xl shadow-sm flex justify-center items-center gap-2 hover:bg-red-50 transition group">
                <span class="text-red-500">🚪</span>
                <span class="font-bold text-gray-800">Keluar Akun Admin</span>
            </button>
        </div>
    </main>

    <script>
        let timerInterval;
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
                        <p class="text-gray-500 mb-8 text-sm leading-relaxed px-2">${message}</p>
                        <div class="flex flex-col gap-3">
                            <button id="btn-timer-confirm" disabled class="w-full py-4 bg-red-500 text-white rounded-2xl font-bold shadow-lg opacity-50 cursor-not-allowed transition-all">
                                ${actionText} (5)
                            </button>
                            <button onclick="document.getElementById('global-modal').remove()" class="w-full py-4 bg-gray-100 text-gray-700 rounded-2xl font-bold hover:bg-gray-200 transition-all">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>`;
            
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            let timeLeft = 5;
            const btn = document.getElementById('btn-timer-confirm');
            
            clearInterval(timerInterval);
            timerInterval = setInterval(() => {
                timeLeft--;
                btn.innerText = `${actionText} (${timeLeft})`;
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                    btn.innerText = actionText;
                }
            }, 1000);

            btn.onclick = () => window.location.href = actionUrl;
        }

        function handleAdminLogout() {
            showCustomModal({
                title: 'Keluar Dashboard Admin?',
                message: 'Apakah Anda yakin ingin mengakhiri sesi administrasi?',
                actionText: 'Keluar Sekarang',
                actionUrl: "{{ route('login') }}"
            });
        }
    </script>
</body>

</html>