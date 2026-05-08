<nav class="w-full p-4 flex flex-col gap-3 shadow-sm" style="background-color: #F7EFDD;">
    <h1 class="text-xl font-bold" style="color: #5C430D;" data-translate="brand">MakanMart</h1>
    <div class="flex gap-2">
        <a href="{{ route('pembeli-beranda') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ request()->routeIs('pembeli-beranda*') ? '#EFDEB9' : '#FAF4E9' }};"
           data-translate="nav_home">Beranda</a>
        <a href="{{ route('pembeli-riwayat') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ request()->routeIs('pembeli-riwayat*') ? '#EFDEB9' : '#FAF4E9' }};"
           data-translate="nav_history">Riwayat</a>
        <a href="{{ route('pembeli-profil') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ request()->routeIs('pembeli-profil*') ? '#EFDEB9' : '#FAF4E9' }};"
           data-translate="nav_profile">Profil</a>
    </div>
</nav>

<script>
    const dictionary = {
        'id': { 'brand': 'MakanMart', 'nav_home': 'Beranda', 'nav_history': 'Riwayat', 'nav_profile': 'Profil' },
        'en': { 'brand': 'EatMart', 'nav_home': 'Home', 'nav_history': 'History', 'nav_profile': 'Profile' }
    };
    
    function applyLanguage() {
        const lang = localStorage.getItem('app_lang') || 'id';
        document.querySelectorAll('[data-translate]').forEach(el => {
            const key = el.getAttribute('data-translate');
            if (dictionary[lang][key]) el.innerText = dictionary[lang][key];
        });
    }
    document.addEventListener('DOMContentLoaded', applyLanguage);
</script>