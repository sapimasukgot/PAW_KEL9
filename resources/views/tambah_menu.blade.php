@extends('layout-penjual')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold text-center mb-10 tracking-wide" data-translate="title_add_menu">Tambah Menu</h2>

        <form action="{{ route('store_menu') }}" method="POST" class="space-y-6">
            @csrf

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded-xl font-bold">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded-xl">
                    <strong class="block mb-1">Gagal menyimpan menu:</strong>
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="hidden" name="status" value="tersedia">

            <div>
                <label class="block font-bold mb-2">Nama Menu</label>
                <input type="text" name="nama_menu" placeholder="Masukkan nama menu..."
                    class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none" required>
            </div>

            <div>
                <label class="block font-bold mb-2">Deskripsi</label>
                <input type="text" name="deskripsi" placeholder="Contoh: Mie dengan kuah gurih dan bumbu spesial..."
                    class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none">
            </div>

            <div>
                <label class="block font-bold mb-2">Harga Reguler (Rp)</label>
                <input type="number" name="harga" placeholder="Contoh: 15000"
                    class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none" required min="0">
            </div>

            <div>
                <label class="block font-bold mb-2">Tambahan Harga Porsi Jumbo (Rp)</label>
                <input type="number" name="tambahan_jumbo" placeholder="Contoh: 4000 (isi 0 jika tidak ada porsi jumbo)"
                    class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none" value="0" min="0">
                <p class="text-xs text-gray-400 mt-1 ml-1">Harga jumbo = harga reguler + tambahan ini. Isi 0 jika tidak ada
                    pilihan jumbo.</p>
            </div>

            <div>
                <label class="block font-bold mb-2">Stok</label>
                <input type="number" name="stok" placeholder="Contoh: 50"
                    class="w-full p-3 rounded-xl bg-white shadow-inner focus:outline-none" required min="0">
            </div>

            <div>
                <label class="block font-bold mb-2">Topping (Nama & Harga)</label>
                <p class="text-xs text-gray-400 mb-2">Format: <span
                        class="font-mono bg-gray-100 px-1 rounded">NamaTopping:Harga</span> — pisahkan dengan koma.
                    Kosongkan jika tidak ada topping.</p>
                <p class="text-xs text-gray-400 mb-3">Contoh: <span
                        class="font-mono bg-gray-100 px-1 rounded">Telur:4000,Kerupuk:3000,Kulit:2000</span></p>

                <div id="topping-container" class="space-y-2"></div>

                <button type="button" onclick="tambahTopping()"
                    class="mt-3 text-xs text-orange-500 font-bold hover:underline">
                    + Tambah Topping
                </button>

                <input type="hidden" name="topping" id="topping_hidden">
            </div>

            <div class="flex justify-between items-center pt-10">
                <a href="{{ route('penjual-beranda') }}"
                    class="bg-[#CBD5E1] px-10 py-2 rounded-xl font-bold shadow-sm text-sm hover:bg-gray-300 transition">
                    Kembali
                </a>
                <button type="submit" onclick="buildToppingString()"
                    class="bg-orange-500 text-white px-10 py-2 rounded-xl font-bold shadow-sm text-sm hover:bg-orange-600 transition">
                    Tambah
                </button>
            </div>
        </form>
    </div>

    <script>
        function tambahTopping() {
            const container = document.getElementById('topping-container');
            const div = document.createElement('div');
            div.className = 'flex gap-2 items-center';
            div.innerHTML = `
                <input type="text" placeholder="Nama topping (Contoh: Telur)"
                       class="topping-nama flex-1 p-2 rounded-xl bg-white shadow-inner text-sm focus:outline-none">
                <input type="number" placeholder="Harga (Contoh: 4000)"
                       class="topping-harga w-36 p-2 rounded-xl bg-white shadow-inner text-sm focus:outline-none" min="0">
                <button type="button" onclick="this.parentElement.remove()"
                        class="text-red-400 font-bold text-lg hover:text-red-600">✕</button>
            `;
            container.appendChild(div);
        }

        function buildToppingString() {
            const namaInputs = document.querySelectorAll('.topping-nama');
            const hargaInputs = document.querySelectorAll('.topping-harga');
            const parts = [];

            namaInputs.forEach((namaInput, i) => {
                const nama = namaInput.value.trim();
                const harga = hargaInputs[i].value.trim();
                if (nama && harga) {
                    parts.push(nama + ':' + harga);
                }
            });

            document.getElementById('topping_hidden').value = parts.join(',');
        }
    </script>
@endsection