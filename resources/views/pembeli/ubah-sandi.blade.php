<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Ubah Sandi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen">
    @include('pembeli.nav')

    <div class="flex items-center justify-center p-6">
        <div class="w-full max-w-md p-6 flex flex-col min-h-[85vh]">
            
            <h1 class="text-2xl font-bold text-gray-900 text-center mb-10">Ubah Sandi</h1>

            <form action="{{ route('pembeli-update-password') }}" method="POST" class="w-full space-y-5">
                @csrf

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">
                        Sandi Baru
                    </label>
                    <input type="password" name="password_baru" placeholder="••••••••"
                        class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-[#e07b11] transition-all font-bold text-gray-700">
                    @error('password_baru') 
                        <span class="text-red-500 text-[10px] font-bold mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">
                        Konfirmasi Sandi Baru
                    </label>
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
        </div>
    </div>
</body>

</html>