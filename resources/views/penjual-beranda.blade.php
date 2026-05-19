@extends('layout-penjual')

@section('content')
<div class="text-center mb-8">
    <h2 class="text-2xl font-bold" data-translate="title_store">Daftar Menu Toko</h2>
</div>

<div class="flex justify-between items-center mb-4">
    <h3 class="font-bold text-lg" data-translate="title_menu_list">Daftar Menu Terdaftar</h3>
    <div class="flex gap-2">
        <a href="{{ route('tambah_menu') }}" class="bg-white border px-4 py-1 rounded-lg text-sm shadow-sm hover:bg-gray-50 transition-all font-medium" data-translate="btn_add_menu">Tambah Menu</a>
        
        <button type="button" onclick="toggleHapusMode()" class="bg-[#CBD5E1] px-4 py-1 rounded-lg text-sm shadow-sm hover:bg-gray-300 transition-all text-gray-700 font-medium" data-translate="btn_delete_mode">
            Hapus Menu
        </button>
    </div>
</div>

<div class="max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
    <div class="space-y-3">
        @forelse ($menus as $index => $menu)
        <div class="bg-white p-3 rounded-xl shadow-sm flex justify-between items-center border border-gray-50 hover:border-orange-50 transition-all">
            <div class="flex gap-4 items-center">
                <span class="text-gray-500 font-bold">{{ $index + 1 }}</span>
                <div>
                    <span class="font-bold text-gray-900 block text-base">{{ $menu->nama_menu }}</span>
                    <span class="text-xs text-orange-500 font-semibold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                    @if($menu->deskripsi)
                        <p class="text-[11px] text-gray-400 mt-0.5">{{ $menu->deskripsi }}</p>
                    @endif
                </div>
            </div>
            
            <form id="delete-form-{{ $menu->menu_id }}" action="{{ route('delete_menu', $menu->menu_id) }}" method="POST" class="m-0">
                @csrf
                <button type="submit" 
                        class="btn-hapus-item hidden bg-[#FF4D4D] text-white text-[10px] px-3 py-1.5 rounded-full shadow-sm hover:bg-red-600 transition-all font-semibold"
                        data-translate="btn_delete_item">
                    Hapus
                </button>
            </form>
        </div>
        @empty
        <div class="text-center py-10 bg-white rounded-xl shadow-sm border border-gray-100">
            <p class="text-gray-400 text-sm" data-translate="empty_menu_message">Belum ada menu yang ditambahkan pada toko ini.</p>
        </div>
        @endforelse
    </div>
</div>


<script>
    function toggleHapusMode() {
        document.querySelectorAll('.btn-hapus-item').forEach(el => {
            el.classList.toggle('hidden');
        });
    }
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 10px; }
</style>
@endsection