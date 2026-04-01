<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#2a2a2a] min-h-screen flex items-center justify-center p-4">

    <div
        class="bg-[#ffedd9] w-full max-w-4xl min-h-[500px] md:h-[600px] rounded-[2rem] shadow-2xl relative overflow-hidden flex flex-col md:flex-row">

        <input type="checkbox" id="toggle-form" class="hidden peer">

        <div
            class="hidden md:block absolute top-0 left-0 w-1/2 h-full z-30 transition-transform duration-700 ease-in-out peer-checked:translate-x-full rounded-[2rem] overflow-hidden">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&q=80&w=800"
                alt="Interior Cafe" class="w-full h-full object-cover">
        </div>

        <div
            class="w-full md:w-1/2 min-h-[500px] md:h-full flex flex-col px-8 md:px-12 py-10 bg-[#ffedd9] transition-all duration-700 
                    md:absolute md:top-0 md:right-0 z-20
                    peer-checked:opacity-0 peer-checked:pointer-events-none md:peer-checked:opacity-100 md:peer-checked:-translate-x-full">

            <h1 class="text-3xl md:text-4xl font-bold text-center mb-8 text-black tracking-wide">LOGIN</h1>

            <form method="POST" action="{{ route('login.submit') }}" class="flex-grow flex flex-col gap-4">
                @csrf
                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Email</label>
                    <input type="email" name="email"
                        class="w-full bg-[#b5a7a4]/30 rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 ring-[#b5a7a4] transition-all">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Password</label>
                    <input type="password" name="password"
                        class="w-full bg-[#b5a7a4]/30 rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 ring-[#b5a7a4] transition-all">
                </div>

                <div class="text-right">
                    <a href="#" class="text-[10px] font-bold hover:underline">Lupa Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-[#b5a7a4] hover:bg-[#a39592] py-4 rounded-xl font-bold text-lg shadow-md mt-2">
                    LOGIN
                </button>
            </form>

            <div class="text-center mt-8">
                <p class="text-xs font-bold">Belum Punya Akun?
                    <label for="toggle-form" class="text-blue-600 hover:underline cursor-pointer ml-1">Sign Up</label>
                </p>
            </div>
        </div>

        <div class="w-full md:w-1/2 min-h-[500px] md:h-full flex flex-col px-8 md:px-12 py-10 bg-[#ffedd9] transition-all duration-700
                    absolute top-0 left-0 z-10 opacity-0 pointer-events-none
                    peer-checked:opacity-100 peer-checked:pointer-events-auto md:peer-checked:z-20">

            <h1 class="text-3xl md:text-4xl font-bold text-center mb-8 text-black tracking-wide">REGISTER</h1>

            <form method="POST" action="{route{'register.submit'}}" class="flex-grow flex flex-col gap-4">
                @csrf
                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full bg-[#b5a7a4]/30 rounded-xl px-4 py-3 text-sm outline-none">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-[#b5a7a4]/30 rounded-xl px-4 py-3 text-sm outline-none">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full bg-[#b5a7a4]/30 rounded-xl px-4 py-3 text-sm outline-none">
                </div>
                <button type="submit"
                    class="w-full bg-[#b5a7a4] hover:bg-[#a39592] py-4 rounded-xl font-bold text-lg mt-4 shadow-md">
                    REGISTER
                </button>
            </form>

            <div class="text-center mt-8">
                <p class="text-xs font-bold">Sudah Punya Akun?
                    <label for="toggle-form" class="text-blue-600 hover:underline cursor-pointer ml-1">Login</label>
                </p>
            </div>
        </div>

    </div>

</body>

</html>