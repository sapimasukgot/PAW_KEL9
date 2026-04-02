<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen text-gray-800">

    @php
        $currentPage = request('page', 'index');
        $lang = request('lang', 'id');

        $admin = [
            'nama' => 'Josh Nath',
            'email' => 'jnath123@gmail.com',
            'phone' => '+6211223344',
            'bahasa' => ($lang == 'id' ? 'Bahasa Indonesia (ID)' : 'English (EN)')
        ];
    @endphp

    <header class="bg-[#f7e4cf] p-4 shadow-sm border-b border-[#e6d1ba] sticky top-0 z-40">
        <h1 class="text-xl font-bold text-[#634a2c] mb-3 px-2 text-center">MakanMart</h1>
        <div class="flex gap-3 px-2 justify-center">
            <a href="{{ route('admin-beranda', ['page' => 'index', 'lang' => $lang]) }}"
                class="bg-white whitespace-nowrap px-6 py-1.5 rounded-full font-semibold text-black text-sm border border-gray-200 hover:bg-gray-50 transition-all block text-center">
                Beranda
            </a>
            <span
                class="bg-[#e6d1ba] whitespace-nowrap px-6 py-1.5 rounded-full font-semibold text-black text-sm">Profil</span>
        </div>
    </header>

    <main class="p-4 max-w-lg mx-auto pb-10">

        @if($currentPage == 'index')
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 mb-5 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-lg font-bold">{{ $admin['nama'] }}</h2>
                            <span
                                class="bg-gray-100 text-gray-500 text-xs font-bold px-2.5 py-0.5 rounded-full border">admin</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">{{ $admin['email'] }}</p>
                        <p class="text-xs text-gray-500">{{ $admin['phone'] }}</p>
                    </div>
                </div>
                <a href="{{ route('profile', ['page' => 'ubah_profil']) }}"
                    class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </a>
            </div>

            <div class="space-y-4">
                <a href="{{ route('profile', ['page' => 'ubah_bahasa', 'lang' => $lang]) }}"
                    class="bg-white rounded-2xl p-6 shadow-sm flex items-center gap-4 hover:bg-gray-50 transition-colors border border-gray-100 block">
                    <div class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1a2 2 0 012 2v1.5m2.289 2.855A11 11 0 0111.97 12a11 11 0 01-9.914 5.914" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold">Bahasa</span>
                </a>

                <a href="{{ route('profile', ['page' => 'pengaturan_akun', 'lang' => $lang]) }}"
                    class="bg-white rounded-2xl p-6 shadow-sm flex items-center gap-4 hover:bg-gray-50 transition-colors border border-gray-100 block">
                    <div class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold">Pengaturan Akun</span>
                </a>
            </div>

            <div class="mt-10">
                <button
                    class="bg-white rounded-full w-full p-4 shadow-sm flex items-center justify-center gap-3 font-bold border border-gray-200 active:scale-95 transition-transform">
                    <div class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <span>Keluar Akun</span>
                </button>
            </div>
        @endif

        @if($currentPage == 'ubah_profil')
            <div class="animate-in fade-in zoom-in-95 duration-300">
                <h2 class="text-2xl font-bold text-black text-center mb-8">Ubah Profil</h2>
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 space-y-5">

                    <div class="flex flex-col items-center gap-4 mb-4">
                        <div
                            class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-400 border border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-500">Pasang foto yang oke! Agar akunmu memiliki foto
                            profil</span>
                        <button
                            class="bg-gray-200 hover:bg-gray-300 px-5 py-2.5 rounded-full text-sm font-bold active:scale-95 transition-all shadow-sm">Tambah
                            Foto</button>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-700 ml-1">Nama</label>
                        <input type="text" value="{{ $admin['nama'] }}"
                            class="w-full bg-white rounded-full px-5 py-3 text-sm outline-none shadow-inner focus:ring-2 ring-gray-100 border border-gray-100">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-700 ml-1">No. HP</label>
                        <input type="text" value="{{ $admin['phone'] }}"
                            class="w-full bg-white rounded-full px-5 py-3 text-sm outline-none shadow-inner focus:ring-2 ring-gray-100 border border-gray-100">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-700 ml-1">Email</label>
                        <input type="email" value="{{ $admin['email'] }}"
                            class="w-full bg-white rounded-full px-5 py-3 text-sm outline-none shadow-inner focus:ring-2 ring-gray-100 border border-gray-100">
                    </div>

                    <div class="pt-6 flex justify-between gap-3">
                        <a href="{{ route('profile', ['page' => 'index', 'lang' => $lang]) }}"
                            class="bg-gray-200 hover:bg-gray-300 text-black px-8 py-3 rounded-xl text-sm font-bold transition-all active:scale-95">Kembali</a>
                        <button
                            class="bg-[#d1d5db] hover:bg-gray-400 text-black px-8 py-3 rounded-xl text-sm font-bold shadow-md transition-all active:scale-95">Simpan</button>
                    </div>
                </div>
            </div>
        @endif

        @if($currentPage == 'ubah_bahasa')
            <div class="animate-in fade-in zoom-in-95 duration-300">
                <h2 class="text-2xl font-bold text-black text-center mb-8">Ubah Bahasa</h2>

                <div class="space-y-4">
                    <a href="{{ route('profile', ['page' => 'ubah_bahasa', 'lang' => 'id']) }}"
                        class="bg-white rounded-full p-4 px-6 shadow-sm flex items-center justify-between border {{ $lang == 'id' ? 'border-[#e6d1ba]' : 'border-gray-100' }} hover:bg-gray-50 transition-all">
                        <span class="text-sm font-bold">Bahasa Indonesia (ID)</span>
                        @if($lang == 'id')
                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                    </a>

                    <a href="{{ route('profile', ['page' => 'ubah_bahasa', 'lang' => 'en']) }}"
                        class="bg-white rounded-full p-4 px-6 shadow-sm flex items-center justify-between border {{ $lang == 'en' ? 'border-[#e6d1ba]' : 'border-gray-100' }} hover:bg-gray-50 transition-all">
                        <span class="text-sm font-bold">English (EN)</span>
                        @if($lang == 'en')
                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                    </a>
                </div>

                <div class="pt-10">
                    <a href="{{ route('profile', ['page' => 'index', 'lang' => $lang]) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black px-8 py-3 rounded-xl text-sm font-bold transition-all active:scale-95 shadow-sm">Kembali</a>
                </div>
            </div>
        @endif

        @if($currentPage == 'pengaturan_akun')
            <div class="animate-in fade-in zoom-in-95 duration-300">
                <h2 class="text-2xl font-bold text-black text-center mb-8">Pengaturan Akun</h2>

                <div class="space-y-4">
                    <a href="{{ route('profile', ['page' => 'ubah_sandi', 'lang' => $lang]) }}"
                        class="bg-white rounded-2xl p-6 shadow-sm flex items-center gap-4 hover:bg-gray-50 transition-colors border border-gray-100 block">
                        <div class="text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <span class="text-lg font-bold">Ubah Sandi</span>
                    </a>

                    <button
                        class="bg-white rounded-2xl p-6 shadow-sm flex items-center gap-4 hover:bg-gray-50 transition-colors border border-gray-100 block text-left w-full">
                        <div class="text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-lg font-bold block">Keluar Akun</span>
                            <span class="text-xs text-gray-500">Yakin mau keluar? Pas balik harus masuk akun lagi ya</span>
                        </div>
                    </button>

                    <button
                        class="bg-white rounded-2xl p-6 shadow-sm flex items-center gap-4 hover:bg-red-50 transition-colors border border-gray-100 block text-left w-full group">
                        <div class="text-gray-400 group-hover:text-red-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-lg font-bold block">Hapus Akun</span>
                            <span class="text-xs text-gray-500">Akunmu akan dihapus secara permanen. Jadi kamu gak bisa lagi
                                akses riwayat transaksi dan detail lainnya dari akunmu</span>
                        </div>
                    </button>
                </div>

                <div class="pt-10">
                    <a href="{{ route('profile', ['page' => 'index', 'lang' => $lang]) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black px-8 py-3 rounded-xl text-sm font-bold transition-all active:scale-95 shadow-sm">Kembali</a>
                </div>
            </div>
        @endif

        @if($currentPage == 'ubah_sandi')
            <div class="animate-in fade-in zoom-in-95 duration-300">
                <h2 class="text-2xl font-bold text-black text-center mb-8">Ubah Sandi</h2>
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 space-y-5">

                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-700 ml-1">Password Lama:</label>
                        <input type="password" placeholder="********"
                            class="w-full bg-white rounded-full px-5 py-3 text-sm outline-none shadow-inner focus:ring-2 ring-gray-100 border border-gray-100">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-700 ml-1">Password Baru:</label>
                        <input type="password" placeholder="********"
                            class="w-full bg-white rounded-full px-5 py-3 text-sm outline-none shadow-inner focus:ring-2 ring-gray-100 border border-gray-100">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-700 ml-1">Konfirmasi Password:</label>
                        <input type="password" placeholder="********"
                            class="w-full bg-white rounded-full px-5 py-3 text-sm outline-none shadow-inner focus:ring-2 ring-gray-100 border border-gray-100">
                    </div>

                    <div class="pt-6 flex justify-between gap-3">
                        <a href="{{ route('profile', ['page' => 'pengaturan_akun', 'lang' => $lang]) }}"
                            class="bg-gray-200 hover:bg-gray-300 text-black px-8 py-3 rounded-xl text-sm font-bold transition-all active:scale-95">Kembali</a>
                        <button
                            class="bg-[#d1d5db] hover:bg-gray-400 text-black px-8 py-3 rounded-xl text-sm font-bold shadow-md transition-all active:scale-95">Simpan</button>
                    </div>
                </div>
            </div>
        @endif

    </main>

</body>

</html>