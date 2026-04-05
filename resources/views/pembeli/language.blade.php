@include('pembeli.nav')

<div class="p-6">
    <h2 class="text-center font-bold text-xl mb-10">Ubah Bahasa</h2>
    
    <div class="space-y-4">
        <div class="bg-white p-4 rounded-2xl flex justify-between items-center border-2 border-green-400">
            <span class="font-bold">Bahasa Indonesia (ID)</span>
            <span class="text-green-500 font-bold">✔</span>
        </div>
        <div class="bg-white p-4 rounded-2xl flex justify-between items-center text-gray-400">
            <span class="font-bold">English (EN)</span>
        </div>
    </div>

    <div class="mt-20">
        <a href="{{ route('pembeli-profil') }}" class="bg-gray-300 px-10 py-2 rounded-lg font-bold">Kembali</a>
    </div>
</div>