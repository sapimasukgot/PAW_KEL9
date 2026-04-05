<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen">
    @include('pembeli.nav')
    <div class="p-6 max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8">Edit Profil</h2>
        
        <div class="flex justify-center mb-8">
            <div class="w-24 h-24 bg-gray-300 rounded-full flex items-center justify-center border-4 border-white shadow-md relative">
                <span class="text-4xl">👤</span>
                <button class="absolute bottom-0 right-0 bg-white p-1 rounded-full shadow text-sm">📷</button>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-bold mb-1">Nama</label>
                <input type="text" value="Justin Laksana" class="w-full p-3 rounded-xl border-none shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-bold mb-1">Email</label>
                <input type="email" value="justin123@gmail.com" class="w-full p-3 rounded-xl border-none shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-bold mb-1">Nomor Telepon</label>
                <input type="text" value="+6212345678" class="w-full p-3 rounded-xl border-none shadow-sm">
            </div>
        </div>

        <div class="flex justify-between mt-10">
            <a href="{{ route('pembeli-profil') }}" class="bg-gray-300 px-8 py-2 rounded-xl font-bold">Kembali</a>
            <button class="bg-gray-300 px-8 py-2 rounded-xl font-bold">Simpan</button>
        </div>
    </div>
</body>
</html>