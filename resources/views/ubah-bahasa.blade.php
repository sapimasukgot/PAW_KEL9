@extends('layout-penjual')

@section('content')
<div class="max-w-2xl mx-auto flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide text-black" data-translate="title_change_lang">Ubah Bahasa</h2>

    <div class="flex-grow space-y-4">
        <div onclick="setLang('id')" id="btn-id" 
             class="lang-btn bg-white p-5 rounded-2xl shadow-sm flex items-center justify-between border-2 border-transparent hover:border-[#7A5C2D] transition cursor-pointer">
            <div class="flex items-center gap-3">
                <div id="check-id" class="check-icon hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                <span class="font-bold text-lg text-black ml-0 transition-all" id="text-id">Bahasa Indonesia (ID)</span>
            </div>
        </div>

        <div onclick="setLang('en')" id="btn-en" 
             class="lang-btn bg-white p-5 rounded-2xl shadow-sm flex items-center justify-between border-2 border-transparent hover:border-[#7A5C2D] transition cursor-pointer">
            <div class="flex items-center gap-3">
                <div id="check-en" class="check-icon hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                <span class="font-bold text-lg text-black transition-all" id="text-en">English (EN)</span>
            </div>
        </div>
    </div>

    <div class="flex justify-end py-10">
        <a href="{{ route('profil-penjual') }}" 
           class="bg-[#CBD5E1] px-10 py-2 rounded-lg font-bold text-sm shadow-sm hover:bg-gray-300 transition text-black"
           data-translate="btn_back">
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
        document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('border-[#7A5C2D]'));
        document.querySelectorAll('.check-icon').forEach(icon => icon.classList.add('hidden'));
        document.getElementById('text-id').classList.add('pl-9');
        document.getElementById('text-en').classList.add('pl-9');

        const activeBtn = document.getElementById('btn-' + currentLang);
        const activeCheck = document.getElementById('check-' + currentLang);
        const activeText = document.getElementById('text-' + currentLang);
        
        if (activeBtn && activeCheck) {
            activeBtn.classList.add('border-[#7A5C2D]');
            activeCheck.classList.remove('hidden');
            activeText.classList.remove('pl-9');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const savedLang = localStorage.getItem('app_lang') || 'id';
        updateUI(savedLang);
    });
</script>
@endsection