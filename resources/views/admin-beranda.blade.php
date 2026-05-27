@extends('layout-admin')

@section('content')
<div class="text-center mb-8">
    <h2 class="text-2xl font-bold" data-translate="title_store_list">Daftar Toko</h2>
</div>

<div class="flex justify-between items-center mb-4">
    <h3 class="font-bold text-lg" data-translate="title_add_store">Kelola Toko Lapak</h3>
    <div class="flex gap-2">
        <a href="{{ route('admin.tambah_toko') }}" class="bg-white border px-4 py-1.5 rounded-lg text-sm shadow-sm hover:bg-gray-50 transition-all font-medium" data-translate="btn_add_new_store">
            Tambah Toko Baru
        </a>
        
        <button id="btn-mode-hapus" class="bg-[#CBD5E1] px-4 py-1.5 rounded-lg text-sm shadow-sm hover:bg-gray-300 transition-all text-gray-700 font-medium select-none cursor-pointer transition-colors duration-200">
            Mode Hapus Toko
        </button>
    </div>
</div>

<div class="max-h-[500px] overflow-y-auto pr-2 custom-scrollbar">
    <div class="space-y-3">
        @forelse ($tokos as $index => $toko)
        <div class="bg-white p-4 rounded-xl shadow-sm flex justify-between items-center border border-orange-50">
            <div class="flex gap-6 items-center">
                <span class="text-gray-400 font-bold text-lg">{{ $index + 1 }}</span>
                <div class="space-y-1">
                    <span class="font-bold text-gray-900 block text-base">{{ $toko->nama_toko }}</span>
                    <p class="text-xs text-gray-500">
                        📍 Lokasi: {{ $toko->lokasi }} | 🕒 Jam Buka: {{ $toko->jam_buka }} - {{ $toko->jam_tutup }}
                    </p>
                    <p class="text-xs text-orange-600 font-medium">
                        Owner: {{ $toko->user->name ?? 'Pemilik Tidak Terdaftar' }} ({{ $toko->user->email ?? '-' }})
                    </p>
                </div>
            </div>
            
            <form action="{{ route('admin.delete_toko', $toko->toko_id) }}" method="POST" class="form-hapus m-0 hidden transition-all duration-300">
                @csrf
                <button type="submit" 
                        onclick="return confirm('Apakah Anda benar-benar yakin ingin menghapus mitra toko {{ $toko->nama_toko }}?')"
                        class="bg-[#FF4D4D] text-white text-xs px-4 py-1.5 rounded-full shadow-sm hover:bg-red-600 transition-all font-semibold"
                        data-translate="btn_delete_item">
                    Hapus
                </button>
            </form>
        </div>
        @empty
        <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-orange-50">
            <p class="text-gray-400 text-sm">Belum ada mitra toko lapak yang terdaftar dalam sistem database.</p>
        </div>
        @endforelse
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #E6D1BA; border-radius: 10px; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnModeHapus = document.getElementById('btn-mode-hapus');
        // Mengambil semua form hapus yang ada di dalam looping data toko
        const formHapusList = document.querySelectorAll('.form-hapus');

        btnModeHapus.addEventListener('click', () => {
            formHapusList.forEach(form => {
                // Menghapus class 'hidden' jika ada, dan menambahkannya kembali jika diklik lagi (Toggle)
                form.classList.toggle('hidden');
            });

            // Memberikan efek perubahan warna and teks tombol utama sebagai indikator mode aktif
            if(btnModeHapus.classList.contains('bg-red-200')) {
                btnModeHapus.innerText = "Mode Hapus Toko";
                btnModeHapus.className = "bg-[#CBD5E1] px-4 py-1.5 rounded-lg text-sm shadow-sm hover:bg-gray-300 transition-all text-gray-700 font-medium cursor-pointer transition-colors duration-200";
            } else {
                btnModeHapus.innerText = "Selesai Mengelola";
                btnModeHapus.className = "bg-red-200 text-red-700 px-4 py-1.5 rounded-lg text-sm shadow-sm hover:bg-red-300 transition-all font-bold cursor-pointer transition-colors duration-200";
            }
        });
    });
</script>
@endsection