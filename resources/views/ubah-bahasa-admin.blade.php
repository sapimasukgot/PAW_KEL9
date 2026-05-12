@extends('layout-admin')

@section('content')
<div class="w-full p-6 flex flex-col min-h-[80vh]">
    <h1 class="text-2xl font-bold text-gray-900 text-center mb-10" data-translate="title_change_lang">Ubah Bahasa</h1>

    <div class="w-full space-y-4">
        <div onclick="setLang('id')" id="btn-id" class="lang-btn w-full bg-white rounded-3xl p-5 shadow-sm border-2 border-transparent flex items-center justify-between cursor-pointer hover:border-orange-200 transition-all">
            <span class="text-gray-800 font-bold text-base ml-2">Bahasa Indonesia (ID)</span>
            <div id="check-id" class="check-icon hidden text-green-600 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <div onclick="setLang('en')" id="btn-en" class="lang-btn w-full bg-white rounded-3xl p-5 shadow-sm border-2 border-transparent flex items-center justify-between cursor-pointer hover:border-orange-200 transition-all">
            <span class="text-gray-800 font-bold text-base ml-2">English (EN)</span>
            <div id="check-en" class="check-icon hidden text-green-600 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
    </div>

    <div class="mt-auto pt-12">
        <a href="{{ route('profile') }}" class="bg-[#d1d5db] text-gray-900 px-16 py-2.5 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm inline-block" data-translate="btn_back">
            Kembali
        </a>
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
        document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('border-orange-400', 'bg-orange-50'));
        document.querySelectorAll('.check-icon').forEach(icon => icon.classList.add('hidden'));
        const activeBtn = document.getElementById('btn-' + currentLang);
        const activeCheck = document.getElementById('check-' + currentLang);
        
        if (activeBtn && activeCheck) {
            activeBtn.classList.add('border-orange-400', 'bg-orange-50');
            activeCheck.classList.remove('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const savedLang = localStorage.getItem('app_lang') || 'id';
        updateUI(savedLang);
    });
</script>
@endsection