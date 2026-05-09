@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><title data-translate="title_order_menu">Order Menu - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen pb-10">
    <div class="p-4 max-w-lg mx-auto">
        <h2 class="text-xl font-bold text-center mb-6" data-translate="title_order_menu">Order Menu</h2>
        
        <div class="bg-white p-6 rounded-3xl shadow-sm space-y-6">
            <div>
                <label class="block text-sm font-bold mb-2" data-translate="label_detail_menu">Detail Menu (Topping, Level)</label>
                <textarea id="persist-topping" data-translate="holder_detail_menu" placeholder="Masukkan topping atau level..." 
                          class="w-full p-3 border rounded-2xl bg-gray-50 h-24"></textarea>
            </div>
            <div>
                <label class="block text-sm font-bold mb-2" data-translate="label_note">Keterangan Pesanan</label>
                <textarea id="persist-keterangan" data-translate="holder_note" placeholder="Tambahkan catatan untuk penjual..." 
                          class="w-full p-3 border rounded-2xl bg-gray-50 h-24"></textarea>
            </div>
        </div>

        <div class="flex justify-between mt-10">
            <a href="{{ url()->previous() }}" class="bg-gray-300 px-8 py-2 rounded-xl font-bold" data-translate="btn_back">Kembali</a>
            <button onclick="openPaymentModal()" class="bg-blue-500 text-white px-10 py-2 rounded-xl font-bold" data-translate="btn_pay_now">Bayar</button>
        </div>
    </div>

    <div id="payModal" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-[9999] p-4">
        <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl max-w-sm w-full text-center">
            <h3 class="text-xl font-bold mb-6" data-translate="modal_ready_pay">Siap Membayar?</h3>
            <div class="flex gap-3">
                <button onclick="document.getElementById('payModal').classList.add('hidden')" class="flex-1 py-3 bg-gray-200 rounded-xl font-bold" data-translate="btn_batal">Batal</button>
                <button id="timerBtn" disabled class="flex-1 py-3 bg-orange-500 text-white rounded-xl font-bold opacity-50"></button>
            </div>
        </div>
    </div>

    <script>
    let timerJob;

    function openPaymentModal() {
        const modal = document.getElementById('payModal');
        const btn = document.getElementById('timerBtn');
        
        // Ambil bahasa dan kata "Ya/Yes" dari dictionary global di nav.blade.php
        const lang = localStorage.getItem('app_lang') || 'id';
        const wordYes = (dictionary[lang] && dictionary[lang]['btn_yes']) ? dictionary[lang]['btn_yes'] : 'Ya';
        
        modal.classList.remove('hidden');
        
        clearInterval(timerJob);
        let timeLeft = 5;
        btn.disabled = true;
        btn.classList.add('opacity-50');
        btn.innerText = `${wordYes} (${timeLeft}s)`;

        timerJob = setInterval(() => {
            timeLeft--;
            btn.innerText = `${wordYes} (${timeLeft}s)`;
            if (timeLeft <= 0) {
                clearInterval(timerJob);
                btn.innerText = wordYes;
                btn.disabled = false;
                btn.classList.remove('opacity-50');
            }
        }, 1000);

        btn.onclick = () => window.location.href = "{{ route('pembeli-pembayaran') }}";
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Persistensi form
        const fields = ['persist-topping', 'persist-keterangan'];
        fields.forEach(id => {
            const el = document.getElementById(id);
            el.value = localStorage.getItem(id) || '';
            el.addEventListener('input', () => localStorage.setItem(id, el.value));
        });

        // Tampilkan teks tombol "Ya" awal sesuai bahasa
        const lang = localStorage.getItem('app_lang') || 'id';
        const wordYes = (dictionary[lang] && dictionary[lang]['btn_yes']) ? dictionary[lang]['btn_yes'] : 'Ya';
        document.getElementById('timerBtn').innerText = `${wordYes} (5s)`;
    });
    </script>
</body>
</html>