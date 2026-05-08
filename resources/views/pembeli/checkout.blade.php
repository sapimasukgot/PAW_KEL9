@include('pembeli.nav')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen pb-10">
    <div class="p-4 max-w-lg mx-auto">
        <h2 class="text-xl font-bold text-center mb-6">Order Menu</h2>
        <div class="bg-white p-6 rounded-3xl shadow-sm space-y-6">
            <div>
                <label class="block text-sm font-bold mb-2">Detail Menu (Topping, Level)</label>
                <textarea id="persist-topping" class="w-full p-3 border rounded-2xl bg-gray-50 h-24"></textarea>
            </div>
            <div>
                <label class="block text-sm font-bold mb-2">Keterangan Pesanan</label>
                <textarea id="persist-keterangan" class="w-full p-3 border rounded-2xl bg-gray-50 h-24"></textarea>
            </div>
        </div>

        <div class="flex justify-between mt-10">
            <a href="{{ url()->previous() }}" class="bg-gray-300 px-8 py-2 rounded-xl font-bold">Kembali</a>
            <button onclick="openPaymentModal()" class="bg-blue-500 text-white px-10 py-2 rounded-xl font-bold">Bayar</button>
        </div>
    </div>

    <div id="payModal" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-[9999] p-4">
        <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl max-w-sm w-full text-center">
            <h3 class="text-xl font-bold mb-6">Siap Membayar?</h3>
            <div class="flex gap-3">
                <button onclick="document.getElementById('payModal').classList.add('hidden')" class="flex-1 py-3 bg-gray-200 rounded-xl font-bold">Batal</button>
                <button id="timerBtn" disabled class="flex-1 py-3 bg-orange-500 text-white rounded-xl font-bold opacity-50">Ya (5s)</button>
            </div>
        </div>
    </div>

    <script>
    let timerJob;
    function openPaymentModal() {
        const modal = document.getElementById('payModal');
        const btn = document.getElementById('timerBtn');
        modal.classList.remove('hidden');
        
        clearInterval(timerJob);
        let timeLeft = 5;
        btn.disabled = true;
        btn.classList.add('opacity-50');
        btn.innerText = `Ya (${timeLeft}s)`;

        timerJob = setInterval(() => {
            timeLeft--;
            btn.innerText = `Ya (${timeLeft}s)`;
            if (timeLeft <= 0) {
                clearInterval(timerJob);
                btn.innerText = "Ya";
                btn.disabled = false;
                btn.classList.remove('opacity-50');
            }
        }, 1000);

        btn.onclick = () => window.location.href = "{{ route('pembeli-pembayaran') }}";
    }

    document.addEventListener('DOMContentLoaded', () => {
        const fields = ['persist-topping', 'persist-keterangan'];
        fields.forEach(id => {
            const el = document.getElementById(id);
            el.value = localStorage.getItem(id) || '';
            el.addEventListener('input', () => localStorage.setItem(id, el.value));
        });
    });
    </script>
</body>
</html>