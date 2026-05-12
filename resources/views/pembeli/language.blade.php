<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="title_ubah_bahasa">MakanMart - Ubah Bahasa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif; 
        }

        .lang-btn.active {
            border-color: #e07b11;
            background-color: #fffaf5;
        }

        .lang-btn.active .check-icon {
            display: block;
        }
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen">
    
    @include('pembeli.nav')

    <div class="p-6">
        <div class="max-w-md mx-auto">
            <h1 class="text-2xl font-bold text-gray-900 text-center mb-10" data-translate="title_ubah_bahasa">Ubah Bahasa</h1>
            
            <div class="space-y-4">
                <button onclick="setLang('id')" id="btn-id" 
                    class="lang-btn w-full bg-white p-6 rounded-3xl shadow-sm border-2 border-transparent flex justify-between items-center font-bold text-gray-700 transition-all hover:border-orange-200">
                    <span>Bahasa Indonesia (ID)</span>
                    <span id="check-id" class="check-icon hidden text-[#e07b11] text-xl">✔</span>
                </button>

                <button onclick="setLang('en')" id="btn-en" 
                    class="lang-btn w-full bg-white p-6 rounded-3xl shadow-sm border-2 border-transparent flex justify-between items-center font-bold text-gray-700 transition-all hover:border-orange-200">
                    <span>English (EN)</span>
                    <span id="check-en" class="check-icon hidden text-[#e07b11] text-xl">✔</span>
                </button>
            </div>

            <div class="mt-10">
                <a href="{{ route('pembeli-profil') }}" 
                    class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-extrabold py-4 rounded-2xl text-center uppercase text-[11px] tracking-[0.2em] transition-all"
                    data-translate="btn_back">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <script>
        function setLang(lang) {
            localStorage.setItem('app_lang', lang);
            updateUI(lang); 
            if (typeof window.refreshLanguage === 'function') {
                window.refreshLanguage();
            }
        }

        function updateUI(currentLang) {
            document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.check-icon').forEach(icon => icon.classList.add('hidden'));

            const activeBtn = document.getElementById('btn-' + currentLang);
            const activeCheck = document.getElementById('check-' + currentLang);
            
            if (activeBtn && activeCheck) {
                activeBtn.classList.add('active');
                activeCheck.classList.remove('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedLang = localStorage.getItem('app_lang') || 'id';
            updateUI(savedLang);
        });
    </script>
</body>
</html>