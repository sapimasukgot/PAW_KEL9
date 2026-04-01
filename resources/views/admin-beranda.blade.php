<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen">

    @php
        $nav = request('nav', 'beranda');
        $action = request('action', 'tambah');
        $confirmDelete = request('confirm_delete');
        $deletedIds = explode(',', request('deleted_ids', ''));

        $newTokoNama = request('new_toko_nama');
        $newOwner = request('owner');
        $newPhone = request('phone');

        $daftar_toko = [
            ['id' => 1, 'nama' => 'Warung Mie', 'hp' => '08123456789'],
            ['id' => 2, 'nama' => 'Warung Nasi', 'hp' => '08122233344'],
            ['id' => 3, 'nama' => 'Toko Kelontong', 'hp' => '08556677889'],
        ];

        if ($newTokoNama) {
            array_unshift($daftar_toko, [
                'id' => rand(100, 999),
                'nama' => $newTokoNama,
                'hp' => $newPhone,
                'pemilik' => $newOwner
            ]);
        }
    @endphp

    <header class="bg-[#f7e4cf] p-4 shadow-sm border-b border-[#e6d1ba] sticky top-0 z-40">
        <h1
            class="text-xl md:text-2xl font-bold text-[#634a2c] mb-3 md:mb-2 px-2 md:px-4 text-center md:text-left tracking-tight">
            MakanMart</h1>

        <div class="flex gap-3 px-2 md:px-4 overflow-x-auto no-scrollbar justify-center md:justify-start">
            <a href="{{ route('admin-beranda', ['nav' => 'beranda', 'action' => $action, 'deleted_ids' => implode(',', $deletedIds)]) }}"
                class="{{ $nav == 'beranda' ? 'bg-[#e6d1ba]' : 'bg-white' }} whitespace-nowrap px-6 py-1.5 rounded-full font-semibold text-black text-sm shadow-sm transition-all border border-transparent">
                Beranda
            </a>
            <a href="{{ route('profile', ['nav' => 'profil', 'action' => $action, 'deleted_ids' => implode(',', $deletedIds)]) }}"
                class="{{ $nav == 'profil' ? 'bg-[#e6d1ba]' : 'bg-white' }} whitespace-nowrap px-6 py-1.5 rounded-full font-semibold text-black text-sm shadow-sm transition-all border border-transparent">
                Profil
            </a>
        </div>
    </header>

    <main class="p-4 md:p-8 max-w-5xl mx-auto">

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
                            class="px-8 py-3 rounded-full text-sm font-bold bg-[#d1d5db] hover:bg-gray-400 shadow-md active:scale-95 transition-all">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        @else

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <h2 class="text-xl md:text-2xl font-bold text-black px-2">Daftar Toko</h2>
                <div class="flex gap-2 w-full md:w-auto px-2">
                    <a href="{{ route('admin-beranda', ['nav' => $nav, 'action' => 'tambah', 'deleted_ids' => implode(',', $deletedIds)]) }}"
                        class="{{ $action == 'tambah' ? 'bg-[#d1d5db]' : 'bg-white' }} flex-1 md:flex-none text-center px-5 py-2.5 rounded-xl font-bold text-black text-sm shadow-sm border border-gray-200 transition-all">
                        Tambah Toko
                    </a>
                    <a href="{{ route('admin-beranda', ['nav' => $nav, 'action' => 'hapus', 'deleted_ids' => implode(',', $deletedIds)]) }}"
                        class="{{ $action == 'hapus' ? 'bg-[#d1d5db]' : 'bg-white' }} flex-1 md:flex-none text-center px-5 py-2.5 rounded-xl font-bold text-black text-sm shadow-sm border border-gray-200 transition-all">
                        Hapus Toko
                    </a>
                </div>
            </div>

            <div class="flex flex-col gap-3 px-2">
                @foreach($daftar_toko as $toko)
                    @if(!in_array($toko['id'], $deletedIds))
                        <div
                            class="bg-white p-4 md:p-5 rounded-2xl shadow-sm flex justify-between items-center px-4 md:px-8 hover:shadow-md transition-shadow border border-white/50">
                            <div class="flex flex-col">
                                <span class="text-lg md:text-xl text-gray-800 font-semibold">{{ $toko['nama'] }}</span>
                            </div>

                            @if($action == 'hapus')
                                <form action="{{ route('admin-beranda') }}" method="GET" class="inline">
                                    <input type="hidden" name="nav" value="{{ $nav }}">
                                    <input type="hidden" name="action" value="{{ $action }}">
                                    <input type="hidden" name="deleted_ids" value="{{ implode(',', $deletedIds) }}">
                                    <input type="hidden" name="confirm_delete" value="{{ $toko['id'] }}">
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl text-xs md:text-sm font-bold shadow-md transition-all active:scale-95">
                                        Hapus
                                    </button>
                                </form>
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
    </main>

    @if($confirmDelete)
        <div
            class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-end md:items-center justify-center z-50 p-0 md:p-4">
            <div
                class="bg-white rounded-t-[2.5rem] md:rounded-[2.5rem] p-8 md:p-10 max-w-sm w-full shadow-2xl text-center animate-in slide-in-from-bottom duration-300">
                <div class="w-20 h-20 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Hapus Toko?</h3>
                <p class="text-gray-500 mb-8 text-sm md:text-base leading-relaxed px-2">Apakah Anda yakin ingin menghapus
                    toko ini? Data akan hilang dari list.</p>

                <div class="flex flex-col md:flex-row gap-3">
                    <a href="{{ route('admin-beranda', ['nav' => $nav, 'action' => $action, 'deleted_ids' => implode(',', $deletedIds)]) }}"
                        class="order-2 md:order-1 flex-1 py-4 bg-gray-100 hover:bg-gray-200 rounded-2xl font-bold text-gray-700 transition-all">
                        Batal
                    </a>
                    <a href="{{ route('admin-beranda', ['nav' => $nav, 'action' => $action, 'deleted_ids' => implode(',', array_unique(array_merge($deletedIds, [$confirmDelete])))]) }}"
                        class="order-1 md:order-2 flex-1 py-4 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-bold shadow-lg shadow-red-200 transition-all">
                        Ya, Hapus
                    </a>
                </div>
            </div>
        </div>
    @endif

</body>

</html>