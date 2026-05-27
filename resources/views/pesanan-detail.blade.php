@include('layout-penjual')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Detail Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;" class="min-h-screen pb-10">

    <div class="max-w-3xl mx-auto p-4">

        <h1 class="text-2xl font-bold text-center my-6 text-gray-900">Detail Pesanan Masuk</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="w-full h-44 bg-gray-300 rounded-xl overflow-hidden shadow-sm flex items-center justify-center">
                @php
                    $details = $pesanan->detail_pesanan ?? $pesanan->detailPesanan ?? $pesanan->details ?? null;
                @endphp
                @if(isset($details) && $details->count() > 0 && !empty($details->first()->menu->foto))
                    <img src="{{ asset('storage/' . $details->first()->menu->foto) }}" alt="Detail Pesanan" class="w-full h-full object-cover">
                @else
                    <div class="text-orange-400 font-bold text-xs uppercase tracking-widest text-center px-4">
                        📸 Foto Menu MakanMart
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm flex flex-col justify-start">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Aksi Perubahan Status</h4>

                <form id="form-update-status" class="h-full flex flex-col justify-between">
                    @csrf
                    <div class="space-y-2">
                        <p class="text-[11px] text-gray-400">Pilih status terbaru untuk memperbarui status antrean di halaman pembeli:</p>
                        <select id="select-status" name="status" class="w-full bg-gray-100 px-4 py-2 rounded-xl text-xs font-bold text-gray-700 focus:outline-none focus:ring-1 ring-orange-400">
                            <option value="Pending" {{ $pesanan->status == 'Pending' ? 'selected' : '' }}>⏳ Menunggu Antrian</option>
                            <option value="Dimasak" {{ $pesanan->status == 'Dimasak' ? 'selected' : '' }}>🍳 Sedang Dimasak</option>
                            <option value="Siap" {{ $pesanan->status == 'Siap' ? 'selected' : '' }}>✅ Siap Disajikan / Selesai</option>
                            <option value="Batal" {{ $pesanan->status == 'Batal' ? 'selected' : '' }}>❌ Batalkan Pesanan</option>
                        </select>
                    </div>

                    <button type="submit" class="mt-4 bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold py-2 px-4 rounded-xl shadow-sm transition-all text-center">
                        Update Status Pesanan
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            
            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Daftar Menu yang Harus Dimasak</h4>
                
                @if(isset($details) && $details->count() > 0)
                    @foreach($details as $detail)
                        <div class="border-b border-orange-50 pb-2 mb-2 last:border-none last:pb-0">
                            <p class="font-bold text-xs text-orange-600">📋 {{ $detail->menu->nama_menu ?? 'Menu Pilihan' }}</p>
                            
                            <div class="mt-1 space-y-1 pl-2 text-xs text-gray-600">
                                @if($detail->harga_satuan == ($detail->menu->harga ?? 0))
                                    <p><span class="font-semibold text-gray-800">Porsi Reguler:</span> {{ $detail->jumlah ?? 0 }}x</p>
                                @else
                                    <p><span class="font-semibold text-gray-800">Porsi Jumbo:</span> {{ $detail->jumlah ?? 0 }}x</p>
                                @endif
                                <p><span class="font-semibold text-gray-800">Topping:</span> {{ $detail->topping ?? '-' }}</p>
                                <p><span class="font-semibold text-gray-800">Pedas:</span> {{ $detail->level_pedas ?? '-' }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-xs text-gray-400 italic">Rincian item porsi menu tidak ditemukan.</p>
                @endif
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">
                <h4 class="font-bold text-sm text-gray-800 mb-2">Detail Identitas Pelanggan</h4>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Nama:</span>
                    <input type="text" readonly value="{{ $pesanan->nama_pembeli }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">No. Meja:</span>
                    <input type="text" readonly value="{{ $pesanan->no_meja }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs min-w-[150px] text-center focus:outline-none border-none text-gray-600 select-none">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Harga Total:</span>
                    <input type="text" readonly value="Rp {{ number_format($pesanan->harga_total ?? $pesanan->total_harga ?? 0, 0, ',', '.') }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs font-bold text-orange-600 min-w-[150px] text-center focus:outline-none border-none select-none">
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="w-24 text-xs font-bold text-gray-700">Keterangan:</span>
                    <input type="text" readonly value="{{ $pesanan->keterangan ?? '-' }}" class="bg-gray-100 px-4 py-1.5 rounded-full text-xs w-full max-w-sm text-left focus:outline-none border-none italic text-gray-500 select-none">
                </div>
            </div>
        </div>

        <div class="w-full flex justify-between items-center pt-2">
            <a href="{{ route('pesanan-penjual') }}" class="bg-[#CBD5E1] text-gray-700 px-12 py-1.5 rounded-lg font-semibold hover:bg-gray-400 transition-all text-xs shadow-sm">
                Kembali
            </a>
            <div id="status-indicator" class="bg-orange-100 text-orange-700 px-10 py-1.5 rounded-lg font-bold text-xs shadow-sm select-none border border-orange-200">
                Status: {{ $pesanan->status }}
            </div>
        </div>

    </div>

    <script>
        document.getElementById('form-update-status').addEventListener('submit', function(e) {
            e.preventDefault();

            const statusValue = document.getElementById('select-status').value;
            const fetchUrl = "{{ route('api.penjual.update-status', $pesanan->pesanan_id ?? $pesanan->id) }}";

            fetch(fetchUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: statusValue })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    document.getElementById('status-indicator').innerText = "Status: " + data.status;
                    alert(data.message);
                } else {
                    alert('Gagal memperbarui status data.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>