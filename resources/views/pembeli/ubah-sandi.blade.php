<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Ubah Sandi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;">
    @include('pembeli.nav')

    <div class="w-full p-6 flex flex-col min-h-[85vh]">
        
        <h1 class="text-2xl font-bold text-gray-900 text-center mb-10">Ubah Sandi</h1>

        <div class="w-full space-y-6">
            
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-900 ml-2">Password Lama:</label>
                <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                    <input type="password" value="********" readonly 
                           class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-900 ml-2">Password Baru:</label>
                <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                    <input type="password" value="********" readonly 
                           class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-900 ml-2">Konfirmasi Password:</label>
                <div class="w-full bg-white rounded-3xl p-4 shadow-sm border border-orange-100">
                    <input type="password" value="********" readonly 
                           class="w-full bg-transparent focus:outline-none text-gray-600 px-2">
                </div>
            </div>

        </div>

        <div class="mt-auto pt-12 flex justify-between items-center">
            <a href="{{ route('pembeli-pengaturan') }}" class="bg-[#D9D9D9] text-gray-900 px-16 py-2 rounded-md font-bold hover:bg-gray-400 transition-all">
                Kembali
            </a>

            <a href="{{ route('pembeli-profil') }}" class="bg-[#D9D9D9] text-gray-900 px-16 py-2 rounded-md font-bold hover:bg-gray-400 transition-all">
                Simpan
            </a>
        </div>

    </div>
</body>
</html>