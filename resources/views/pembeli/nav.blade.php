<header class="p-4 flex gap-4">
    <a href="{{ route('pembeli-beranda') }}" class="{{ request()->routeIs('pembeli-beranda') ? 'bg-[#f2e1cc]' : 'bg-white' }} px-6 py-1 rounded-full font-bold shadow-sm">Beranda</a>
    <a href="{{ route('pembeli-riwayat') }}" class="{{ request()->routeIs('pembeli-riwayat') ? 'bg-[#f2e1cc]' : 'bg-white' }} px-6 py-1 rounded-full font-bold shadow-sm text-gray-500">Riwayat</a>
    <a href="{{ route('pembeli-profil') }}" class="{{ request()->routeIs('pembeli-profil') ? 'bg-[#f2e1cc]' : 'bg-white' }} px-6 py-1 rounded-full font-bold shadow-sm text-gray-500">Profil</a>
</header>