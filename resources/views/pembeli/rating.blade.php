@include('pembeli.nav')

<div class="p-6">
    <h2 class="text-center font-bold text-xl mb-6">Rangkuman Pesanan</h2>
    <div class="grid grid-cols-2 gap-4 mb-8">
        <div class="bg-white p-4 rounded-xl shadow-sm">
            <p class="text-xs font-bold">Detail Menu</p>
            <p class="text-xs">Reguler: 1, Jumbo: 1, Topping: Telur</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm">
            <p class="text-xs font-bold">Detail Pesanan</p>
            <p class="text-xs">Nama: Aan, Meja: 1, Harga: 32.000</p>
        </div>
    </div>

    <h3 class="text-center font-bold mb-4">Berikan Rating Makanan</h3>
    <div class="flex justify-center gap-2 mb-6 text-3xl text-gray-300">
        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
    </div>

    <textarea class="w-full h-32 p-4 rounded-2xl border-none shadow-inner mb-6" placeholder="Tulis ulasan kamu di sini..."></textarea>

    <div class="flex justify-between">
        <a href="{{ route('pembeli-summary') }}" class="bg-gray-300 px-8 py-2 rounded-lg font-bold">Kembali</a>
        <form action="{{ route('pembeli-rating-simpan') }}" method="POST">
            @csrf
            <button type="submit" class="bg-gray-300 px-8 py-2 rounded-lg font-bold">Kirim</button>
        </form>
    </div>
</div>