@include('pembeli.nav')

<div class="flex flex-col items-center justify-center min-h-screen p-6 text-center">
    <img src="path-ke-gambar-hp.png" class="w-48 mb-6">
    <h1 class="text-2xl font-bold">Silahkan lakukan pembayaran di counter!</h1>
    <p class="text-gray-600">Tunggu konfirmasi pembayaran dari penjual</p>
    
    <a href="{{ route('pembeli-ongoing') }}" class="mt-20 bg-gray-300 px-10 py-2 rounded-lg font-bold">Selanjutnya</a>
</div>