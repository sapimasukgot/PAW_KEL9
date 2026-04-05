@include('pembeli.nav')

<section class="p-4">
    <h2 class="font-bold mb-2">Pesanan Berlangsung</h2>
    <div class="bg-white p-4 rounded-2xl shadow-md flex justify-between items-center border-l-4 border-orange-500">
        <div class="flex gap-4">
            <img src="mie-small.jpg" class="w-12 h-12 rounded-lg">
            <div>
                <p class="font-bold">Mie Pangsit</p>
                <a href="{{ route('pembeli-summary') }}" class="text-xs text-blue-500 underline">Lihat Detail</a>
            </div>
        </div>
    </div>
</section>