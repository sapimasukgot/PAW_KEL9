@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Ubah Sandi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen flex flex-col p-6">
    <div class="w-full p-6 flex flex-col flex-grow">
        
        <h1 class="text-2xl font-bold text-gray-900 text-center mb-10" data-translate="title_change_pw">Ubah Sandi</h1>

        <form action="{{ route('pembeli-update-password') }}" method="POST" class="w-full space-y-5">
            @csrf

            <div>
                <label data-translate="label_old_pw" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Sandi Lama</label>
                <input type="password" name="password_lama" placeholder="••••••••" required
                    class="w-full bg-white border border-orange-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-[#e07b11] transition-all font-bold text-gray-700 shadow-sm">
                @error('password_lama') 
                    <span class="text-red-500 text-[10px] font-bold mt-1 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label data-translate="label_new_pw" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Sandi Baru</label>
                <input type="password" name="password_baru" placeholder="••••••••" required
                    class="w-full bg-white border border-orange-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-[#e07b11] transition-all font-bold text-gray-700 shadow-sm">
                @error('password_baru') 
                    <span class="text-red-500 text-[10px] font-bold mt-1 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label data-translate="new_password_confirm" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Konfirmasi Sandi Baru</label>
                <input type="password" name="password_baru_confirmation" placeholder="••••••••" required
                    class="w-full bg-white border border-orange-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-[#e07b11] transition-all font-bold text-gray-700 shadow-sm">
            </div>

            <div class="pt-8 space-y-3">
                <button type="submit"
                    class="w-full bg-[#e07b11] hover:bg-[#c26a0e] text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-orange-200 uppercase text-[11px] tracking-[0.2em] transition-all">
                    <span data-translate="btn_save">Simpan Sandi</span>
                </button>

                <a href="{{ route('pembeli-pengaturan') }}"
                    class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-extrabold py-4 rounded-2xl text-center uppercase text-[11px] tracking-[0.2em] transition-all">
                    <span data-translate="btn_back">Batal</span>
                </a>
            </div>
        </form>
    </div>
</body>
</html>