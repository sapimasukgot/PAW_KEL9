<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Bahasa - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#fcebda] min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-sm bg-white rounded-[2.5rem] shadow-2xl p-10 flex flex-col items-center">
        
        <h1 class="text-2xl font-[900] text-black tracking-tighter mb-1 uppercase">Ubah Bahasa</h1>
        <div class="w-12 h-1.5 bg-[#e07b11] rounded-full mb-10"></div>

        <div class="w-full space-y-4 mb-12">
            <label class="relative flex items-center justify-between p-4 rounded-2xl border-2 border-[#e07b11] bg-orange-50 cursor-pointer transition-all">
                <input type="radio" name="language" value="id" class="hidden peer" checked>
                <div class="flex items-center gap-4">
                    <span class="text-2xl">🇮🇩</span>
                    <span class="font-bold text-black text-sm">Bahasa Indonesia</span>
                </div>
                <div class="w-6 h-6 bg-[#e07b11] rounded-full flex items-center justify-center">
                    <div class="w-2.5 h-2.5 bg-white rounded-full"></div>
                </div>
            </label>

            <label class="relative flex items-center justify-between p-4 rounded-2xl border border-gray-100 hover:bg-gray-50 cursor-pointer transition-all">
                <input type="radio" name="language" value="en" class="hidden">
                <div class="flex items-center gap-4">
                    <span class="text-2xl">🇺🇸</span>
                    <span class="font-bold text-gray-400 text-sm">English</span>
                </div>
                <div class="w-6 h-6 border-2 border-gray-200 rounded-full"></div>
            </label>
        </div>

        <div class="w-full space-y-3">
            <button class="w-full bg-[#e07b11] hover:bg-[#c26a0e] text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-orange-100 transition-all uppercase text-[11px] tracking-[0.2em]">
                Simpan Perubahan
            </button>
            
                <a href="{{ route('pembeli-profil') }}" 
                class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-500 font-extrabold py-4 rounded-2xl transition-all text-center uppercase text-[11px] tracking-[0.2em]">
                Kembali
                </a>
            </a>
        </div>
    </div>

</body>
</html>