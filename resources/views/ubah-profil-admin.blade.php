<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Ubah Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen">

    <header class="bg-[#f7e4cf] p-4 shadow-sm border-b border-[#e6d1ba] sticky top-0 z-40">
        <h1 class="text-xl md:text-2xl font-bold text-[#634a2c] mb-3 md:mb-2 px-2 md:px-4 text-center md:text-left tracking-tight">
            MakanMart
        </h1>

        <div class="flex gap-3 px-2 md:px-4 justify-center md:justify-start">
            <a href="{{ route('admin-beranda') }}"
                class="bg-white whitespace-nowrap px-6 py-1.5 rounded-full font-semibold text-black text-sm shadow-sm border border-transparent">
                Beranda
            </a>
            <a href="{{ route('profile') }}"
                class="bg-[#e6d1ba] whitespace-nowrap px-6 py-1.5 rounded-full font-semibold text-black text-sm shadow-sm border border-transparent">
                Profil
            </a>
        </div>
    </header>

    <main class="p-4 md:p-8 max-w-5xl mx-auto">
        
        <h2 class="text-2xl md:text-3xl font-bold text-black text-center mb-10">Ubah Profil</h2>

            @csrf
            
            <div class="w-full bg-white rounded-[2.5rem] p-8 shadow-sm border border-orange-100 space-y-6">
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 ml-4">Nama Lengkap</label>
                    <input type="text" name="nama" value="Admin MakanMart" 
                        class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 ml-4">Alamat Email</label>
                    <input type="email" name="email" value="admin@makanmart.com" 
                        class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 ml-4">Nomor Telepon</label>
                    <input type="text" name="telepon" value="081234567890" 
                        class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
                </div>
            </div>

            <div class="flex justify-between items-center px-2 pt-4">
                <a href="{{ route('profile') }}" 
                    class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm">
                    Kembali
                </a>
                
                <a href="{{ route('profile') }}" 
                    class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm text-center">
                    Simpan
                </a>
            </div>
        </form>

    </main>

</body>
</html>