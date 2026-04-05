@include('pembeli.nav')

<div class="p-4">
    <h1 class="text-xl font-bold text-center my-6">Terima Kasih Sudah Memesan! Selamat Menikmati!</h1>
    
    <div class="bg-white p-4 rounded-2xl space-y-4 shadow-sm">
        <div class="flex justify-between border-b pb-2">
            <span>Reguler:</span> <strong>1</strong>
        </div>
        <div class="flex justify-between border-b pb-2">
            <span>Jumbo:</span> <strong>1</strong>
        </div>
        <div class="flex justify-between">
            <span>Total Harga:</span> <strong>Rp 32.000</strong>
        </div>
    </div>

    <div class="flex justify-between mt-10">
        <a href="{{ route('pembeli-ongoing') }}" class="bg-gray-300 px-6 py-2 rounded-lg">Kembali</a>
        <button class="bg-gray-300 px-6 py-2 rounded-lg">Beri Rating</button>
    </div>
</div>