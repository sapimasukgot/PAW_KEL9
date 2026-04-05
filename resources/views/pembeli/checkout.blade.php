<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen pb-10">
    @include('pembeli.nav')

    <div class="p-4 max-w-lg mx-auto">
        <h2 class="text-xl font-bold text-center mb-6">Order {{ $menu['nama'] }}</h2>
        
        <div class="bg-white p-6 rounded-3xl shadow-sm space-y-6">
            <div>
                <label class="block text-sm font-bold mb-2">Detail Menu</label>
                <textarea class="w-full p-3 border rounded-2xl bg-gray-50 h-24" placeholder="Contoh: Reguler: 1, Jumbo: 1, Topping: Telur, Level: 0"></textarea>
            </div>
            <div>
                <label class="block text-sm font-bold mb-2">Detail Pesanan</label>
                <textarea class="w-full p-3 border rounded-2xl bg-gray-50 h-24" placeholder="Contoh: Nama: Aan, No Meja: 1, Keterangan: Kurangi garam"></textarea>
            </div>
        </div>

        <div class="flex justify-between mt-10">
            <a href="{{ url()->previous() }}" class="bg-gray-300 px-8 py-2 rounded-xl font-bold">Kembali</a>
            <button onclick="openModal()" class="bg-blue-500 text-white px-10 py-2 rounded-xl font-bold">Bayar</button>
        </div>
    </div>

    <div id="paymentModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center p-6 z-50">
        <div class="bg-white p-8 rounded-3xl w-full max-w-sm text-center">
            <h3 class="text-lg font-bold mb-6">Apakah sudah siap untuk membayar pesanan?</h3>
            <div class="flex gap-4 justify-center">
                <button onclick="closeModal()" class="bg-gray-300 px-6 py-2 rounded-xl font-bold">Kembali</button>
                <a id="btnYa" href="{{ route('pembeli-pembayaran') }}" 
                   class="bg-orange-500 text-white px-6 py-2 rounded-xl font-bold opacity-50 cursor-not-allowed pointer-events-none transition">
                   Ya (5s)
                </a>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('paymentModal').classList.remove('hidden');
            let btn = document.getElementById('btnYa');
            let timeLeft = 5;
            let timer = setInterval(() => {
                timeLeft--;
                btn.innerText = `Ya (${timeLeft}s)`;
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    btn.innerText = "Ya";
                    btn.classList.remove('opacity-50', 'cursor-not-allowed', 'pointer-events-none');
                }
            }, 1000);
        }
        function closeModal() { document.getElementById('paymentModal').classList.add('hidden'); }
    </script>
</body>
</html>