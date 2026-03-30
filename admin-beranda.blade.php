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
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen">

    @php
        $nav = request('nav', 'beranda');
        $action = request('action', 'tambah');
    @endphp

    <header class="bg-[#f7e4cf] p-4 shadow-sm border-b border-[#e6d1ba]">
        <h1 class="text-2xl font-bold text-[#634a2c] mb-2 px-4">MakanMart</h1>
        <div class="flex gap-4 px-4">
            <a href="{{ route('admin-beranda', ['nav' => 'beranda', 'action' => $action]) }}"
                class="{{ $nav == 'beranda' ? 'bg-[#e6d1ba]' : 'bg-white' }} px-6 py-1 rounded-full font-semibold text-black shadow-sm transition-all">
                Beranda
            </a>
            <a href="{{ route('admin-beranda', ['nav' => 'profil', 'action' => $action]) }}"
                class="{{ $nav == 'profil' ? 'bg-[#e6d1ba]' : 'bg-white' }} px-6 py-1 rounded-full font-semibold text-black shadow-sm transition-all">
                Profil
            </a>
        </div>
    </header>

    <main class="p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-black">Daftar Toko</h2>

            <div class="flex gap-4">
                <a href="{{ route('admin-beranda', ['nav' => $nav, 'action' => 'tambah']) }}"
                    class="{{ $action == 'tambah' ? 'bg-[#d1d5db]' : 'bg-white' }} px-6 py-2 rounded-xl font-semibold text-black shadow-sm border border-gray-200 transition-all">
                    Tambah Toko
                </a>
                <a href="{{ route('admin-beranda', ['nav' => $nav, 'action' => 'hapus']) }}"
                    class="{{ $action == 'hapus' ? 'bg-[#d1d5db]' : 'bg-white' }} px-6 py-2 rounded-xl font-semibold text-black shadow-sm border border-gray-200 transition-all">
                    Hapus Toko
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <div class="bg-white p-4 rounded-2xl shadow-sm flex justify-between items-center px-6">
                <div class="flex gap-6 items-center">
                    <span class="text-xl font-semibold text-gray-700 w-8">1</span>
                    <span class="text-xl text-gray-800">Warung Mie</span>
                </div>

                @if($action == 'hapus')
                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow-md">
                        Hapus
                    </button>
                @endif
            </div>

            <div class="bg-white p-4 rounded-2xl shadow-sm flex justify-between items-center px-6">
                <div class="flex gap-6 items-center">
                    <span class="text-xl font-semibold text-gray-700 w-8">2</span>
                    <span class="text-xl text-gray-800">Warung Nasi</span>
                </div>

                @if($action == 'hapus')
                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow-md">
                        Hapus
                    </button>
                @endif
            </div>
        </div>

        @if($action == 'tambah')
            <div class="mt-6 flex justify-center">
                <button
                    class="bg-white border-2 border-dashed border-gray-300 w-full p-4 rounded-2xl flex justify-center items-center gap-2 text-gray-500 hover:bg-gray-50 hover:border-gray-400 transition-all font-bold">
                    <span class="text-2xl">+</span> Tambah Toko Baru
                </button>
            </div>
        @endif
    </main>

</body>

</html>