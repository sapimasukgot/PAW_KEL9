<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Login & Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .form-transition {
            transition: opacity 0.4s ease-in-out, transform 0.5s ease-in-out;
        }
    </style>
</head>

<body class="bg-[#2a2a2a] min-h-screen flex items-center justify-center p-4">

    <div id="auth-box"
        class="bg-[#ffedd9] w-full max-w-4xl h-[600px] md:h-[560px] rounded-[2rem] shadow-2xl relative overflow-hidden flex flex-col md:flex-row">
        <input type="checkbox" id="toggle-form" class="hidden peer" {{ ($errors->any() && !$errors->has('email')) ? 'checked' : '' }}>

        <div
            class="hidden md:block absolute top-0 left-0 w-1/2 h-full z-40 transition-transform duration-700 ease-in-out peer-checked:translate-x-full rounded-[2rem] overflow-hidden shadow-2xl">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&q=80&w=800"
                alt="Interior Cafe" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/10"></div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-[#ffedd9] form-transition
                    md:absolute md:top-0 md:right-0 z-30
                    peer-checked:opacity-0 peer-checked:pointer-events-none peer-checked:-translate-x-10">

            <h1 class="text-3xl md:text-4xl font-bold text-center mb-8 text-black tracking-wide">LOGIN</h1>

            <form method="POST" action="{{ route('login.submit') }}" class="flex flex-col gap-4">
                @csrf

                @if ($errors->has('email') && !$errors->has('name'))
                    <div class="bg-red-100 text-red-700 p-3 rounded-xl text-xs">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-[#b5a7a4]/20 rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 ring-[#b5a7a4] transition-all">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-[#b5a7a4]/20 rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 ring-[#b5a7a4] transition-all">
                </div>

                <button type="submit"
                    class="w-full bg-[#b5a7a4] hover:bg-[#a39592] py-4 rounded-xl font-bold text-lg shadow-md mt-4 transition-all active:scale-95">
                    LOGIN
                </button>
            </form>

            <div class="text-center mt-8">
                <p class="text-xs font-bold text-gray-600">Belum Punya Akun?
                    <label for="toggle-form" class="text-blue-600 hover:underline cursor-pointer ml-1 font-bold">Sign
                        Up</label>
                </p>
            </div>
        </div>
        <div
            class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-[#ffedd9] form-transition
                    absolute top-0 left-0 z-20 opacity-0 pointer-events-none translate-x-10
                    peer-checked:opacity-100 peer-checked:pointer-events-auto peer-checked:z-30 peer-checked:translate-x-0 transition-all duration-700">

            <h1 class="text-3xl md:text-4xl font-bold text-center mb-6 text-black tracking-wide">REGISTER</h1>

            <form method="POST" action="{{ route('register.submit') }}" class="flex flex-col gap-3">
                @csrf

                @if ($errors->has('name') || $errors->has('password') || $errors->has('error'))
                    <div class="bg-red-100 text-red-700 p-2 rounded-lg text-[10px]">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full bg-[#b5a7a4]/20 rounded-xl px-4 py-2 text-sm outline-none">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-[#b5a7a4]/20 rounded-xl px-4 py-2 text-sm outline-none">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-[#b5a7a4]/20 rounded-xl px-4 py-2 text-sm outline-none">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-semibold ml-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full bg-[#b5a7a4]/20 rounded-xl px-4 py-2 text-sm outline-none">
                </div>

                <button type="submit"
                    class="w-full bg-[#b5a7a4] hover:bg-[#a39592] py-4 rounded-xl font-bold text-lg shadow-md mt-4 transition-all active:scale-95">
                    REGISTER
                </button>
            </form>

            <div class="text-center mt-6">
                <p class="text-xs font-bold text-gray-600">Sudah Punya Akun?
                    <label for="toggle-form"
                        class="text-blue-600 hover:underline cursor-pointer ml-1 font-bold">Login</label>
                </p>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('toggle-form');
            const box = document.getElementById('auth-box');

            toggle.addEventListener('change', () => {
                box.style.transform = "scale(0.98)";
                box.style.transition = "transform 0.3s ease-in-out";
                setTimeout(() => { box.style.transform = "scale(1)"; }, 300);
            });
        });
    </script>
</body>

</html>