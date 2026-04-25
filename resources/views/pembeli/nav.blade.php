<nav class="w-full p-4 flex flex-col gap-3 shadow-sm" style="background-color: #F7EFDD;">
    <h1 class="text-xl font-bold" style="color: #5C430D;">MakanMart</h1>

    <div class="flex gap-2">
        <a href="{{ route('pembeli-beranda') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ (request()->routeIs('pembeli-beranda*') || request()->routeIs('pembeli-detail*') || request()->routeIs('pembeli-rating*') || request()->routeIs('pembeli-thanks*') || request()->routeIs('pembeli-ongoing*')  || request()->routeIs('pembeli-checkout*') || request()->routeIs('pembeli-pembayaran*')) ? '#EFDEB9' : '#FAF4E9' }};">
            Beranda
        </a>

        <a href="{{ route('pembeli-riwayat') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ request()->routeIs('pembeli-riwayat*') ? '#EFDEB9' : '#FAF4E9' }};">
            Riwayat
        </a>

        <a href="{{ route('pembeli-profil') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ request()->routeIs('pembeli-profil*') || request()->routeIs('pembeli-edit-profil*') || request()->routeIs('pembeli-bahasa*') || request()->routeIs('pembeli-pengaturan*') || request()->routeIs('pembeli-ubah-sandi*')? '#EFDEB9' : '#FAF4E9' }};">
            Profil
        </a>
    </div>
</nav>