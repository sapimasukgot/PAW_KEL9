@extends('layout-admin')

@section('content')
    @php
        // Logika Prototype: Simulasi Database menggunakan Session & Request
        $action = request('action', 'tambah');
        $deletedIds = request('deleted_ids') ? explode(',', request('deleted_ids')) : [];

        $newTokoNama = request('new_toko_nama');
        $newOwner = request('owner');
        $newPhone = request('phone');

        // Data Awal
        $daftar_toko = [
            ['id' => 1, 'nama' => 'Warung Mie', 'hp' => '08123456789'],
            ['id' => 2, 'nama' => 'Warung Nasi', 'hp' => '08122233344'],
            ['id' => 3, 'nama' => 'Toko Kelontong', 'hp' => '08556677889'],
        ];

        // Simulasi Tambah
        if ($newTokoNama) {
            array_unshift($daftar_toko, [
                'id' => rand(100, 999),
                'nama' => $newTokoNama,
                'hp' => $newPhone,
                'pemilik' => $newOwner
            ]);
        }
    @endphp

    @if($action == 'form_tambah')
        <div class="mb-10 animate-in fade-in zoom-in duration-300">
            <h2 class="text-2xl md:text-3xl font-bold text-black text-center mb-6">Tambah Toko</h2>
            <form action="{{ route('admin-beranda') }}" method="GET"
                class="space-y-4 bg-[#ffedd9] p-6 md:p-8 rounded-[2.5rem] shadow-xl max-w-2xl mx-auto border border-[#e6d1ba]">
                <input type="hidden" name="action" value="tambah">
                <input type="hidden" name="deleted_ids" value="{{ implode(',', $deletedIds) }}">

                <div class="space-y-1">
                    <label class="block text-sm font-semibold text-gray-700 ml-2">Nama Lapak</label>
                    <input type="text" name="new_toko_nama" required placeholder="Contoh: Warung Nasi Goreng"
                        class="w-full bg-white rounded-full px-6 py-3.5 text-sm outline-none shadow-inner focus:ring-2 ring-[#e6d1ba]">
                </div>

                <div class="space-y-1">
                    <label class="block text-sm font-semibold text-gray-700 ml-2">Nama Pemilik</label>
                    <input type="text" name="owner" placeholder="Contoh: Joni Alfreandra"
                        class="w-full bg-white rounded-full px-6 py-3.5 text-sm outline-none shadow-inner focus:ring-2 ring-[#e6d1ba]">
                </div>

                <div class="space-y-1">
                    <label class="block text-sm font-semibold text-gray-700 ml-2">Nomor HP</label>
                    <input type="text" name="phone" placeholder="Contoh: 0887654321"
                        class="w-full bg-white rounded-full px-6 py-3.5 text-sm outline-none shadow-inner focus:ring-2 ring-[#e6d1ba]">
                </div>

                <div class="flex justify-end gap-3 pt-6">
                    <a href="{{ route('admin-beranda', ['action' => 'tambah', 'deleted_ids' => implode(',', $deletedIds)]) }}"
                        class="px-8 py-3 rounded-full text-sm font-bold bg-gray-200 hover:bg-gray-300 transition-all">Batal</a>
                    <button type="submit"
                        class="px-8 py-3 rounded-full text-sm font-bold bg-[#d1d5db] hover:bg-gray-400 shadow-md transition-all">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <h2 class="text-xl md:text-2xl font-bold text-black px-2">Daftar Toko</h2>
            <div class="flex gap-2 w-full md:w-auto px-2">
                <a href="{{ route('admin-beranda', ['action' => 'tambah', 'deleted_ids' => implode(',', $deletedIds)]) }}"
                    class="{{ $action == 'tambah' ? 'bg-[#d1d5db]' : 'bg-white' }} flex-1 md:flex-none text-center px-5 py-2.5 rounded-xl font-bold text-black text-sm shadow-sm border border-gray-200 transition-all">
                    Mode View
                </a>
                <a href="{{ route('admin-beranda', ['action' => 'hapus', 'deleted_ids' => implode(',', $deletedIds)]) }}"
                    class="{{ $action == 'hapus' ? 'bg-[#d1d5db]' : 'bg-white' }} flex-1 md:flex-none text-center px-5 py-2.5 rounded-xl font-bold text-black text-sm shadow-sm border border-gray-200 transition-all">
                    Mode Hapus
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-3 px-2">
            @foreach($daftar_toko as $toko)
                @if(!in_array($toko['id'], $deletedIds))
                    <div class="bg-white p-4 md:p-5 rounded-2xl shadow-sm flex justify-between items-center px-4 md:px-8 hover:shadow-md transition-shadow border border-white/50">
                        <div class="flex flex-col">
                            <span class="text-lg md:text-xl text-gray-800 font-semibold">{{ $toko['nama'] }}</span>
                            <span class="text-xs text-gray-400">{{ $toko['hp'] }}</span>
                        </div>

                        @if($action == 'hapus')
                            {{-- Panggil Modal JavaScript dengan Timer --}}
                            <button onclick="showCustomModal({
                                title: 'Hapus Toko?',
                                message: 'Apakah Anda yakin ingin menghapus toko <b>{{ $toko['nama'] }}</b>? Data akan hilang dari list secara permanen.',
                                actionText: 'Ya, Hapus Toko',
                                actionUrl: '{{ route('admin-beranda', [
                                    'action' => 'hapus', 
                                    'deleted_ids' => implode(',', array_unique(array_merge($deletedIds, [$toko['id']])))
                                ]) }}'
                            })" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl text-xs md:text-sm font-bold shadow-md active:scale-95 transition-all">
                                Hapus
                            </button>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>

        @if($action == 'tambah')
            <div class="mt-6 px-2">
                <a href="{{ route('admin-beranda', ['action' => 'form_tambah', 'deleted_ids' => implode(',', $deletedIds)]) }}"
                    class="bg-white/60 border-2 border-dashed border-gray-300 w-full p-8 rounded-2xl flex flex-col justify-center items-center gap-2 text-gray-400 hover:bg-white hover:border-gray-500 transition-all font-bold group text-center block">
                    <span class="text-4xl group-hover:scale-125 transition-transform">+</span>
                    <span class="text-sm md:text-base">Tambah Toko Baru</span>
                </a>
            </div>
        @endif
    @endif
@endsection