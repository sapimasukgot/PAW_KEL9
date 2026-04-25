<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Ubah Sandi</title>
    <script src="https://cdn.tailwindcss.com"></script>
<<<<<<< HEAD
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen flex items-center justify-center p-6">
=======
</head>
<body style="background-color: #FFEDD9;">
    @include('pembeli.nav')
>>>>>>> f01c8532a487fa97c7d444466a57fd0363bc7fa2

    <div class="w-full p-6 flex flex-col min-h-[85vh]">
        
        <h1 class="text-2xl font-bold text-gray-900 text-center mb-10">Ubah Sandi</h1>

<<<<<<< HEAD
        <form action="{{ route('pembeli-update-password') }}" method="POST" class="w-full space-y-5">
            @csrf

            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Sandi
                    Baru</label>
                <input type="password" name="password_baru" placeholder="••••••••"
                    class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-[#e07b11] transition-all font-bold text-gray-700">
                @error('password_baru') <span class="text-red-500 text-[10px] font-bold mt-1 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Konfirmasi
                    Sandi Baru</label>
                <input type="password" name="password_baru_confirmation" placeholder="••••••••"
                    class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-[#e07b11] transition-all font-bold text-gray-700">
            </div>

            <div class="pt-4 space-y-3">
                <button type="submit"
                    class="w-full bg-[#e07b11] hover:bg-[#c26a0e] text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-orange-100 uppercase text-[11px] tracking-[0.2em] transition-all">
                    Simpan Sandi
                </button>

                <a href="{{ route('pembeli-pengaturan') }}"
                    class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-500 font-extrabold py-4 rounded-2xl text-center uppercase text-[11px] tracking-[0.2em] transition-all">
                    Batal
                </a>
            </div>
        </form>
=======
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

>>>>>>> f01c8532a487fa97c7d444466a57fd0363bc7fa2
    </div>
</body>

</html>