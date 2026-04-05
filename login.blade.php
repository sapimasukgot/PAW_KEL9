<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#2a2a2a] min-h-screen flex items-center justify-center p-4 md:p-8">

    <div
        class="bg-[#ffedd9] w-full max-w-5xl h-auto md:h-[600px] rounded-[2rem] shadow-2xl relative overflow-hidden flex">

        <input type="checkbox" id="toggle-form" class="hidden peer">


        <div
            class="absolute top-0 left-0 w-full md:w-1/2 h-full z-20 transition-transform duration-700 ease-in-out peer-checked:translate-x-full hidden md:block rounded-[2rem] overflow-hidden">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&q=80&w=800"
                alt="Interior Cafe" class="w-full h-full object-cover">
        </div>


        <div
            class="absolute top-0 right-0 w-full md:w-1/2 h-full z-10 transition-transform duration-700 ease-in-out peer-checked:translate-x-full flex flex-col px-6 md:px-16 py-8 bg-[#ffedd9]">

            <h1 class="text-4xl font-bold text-center mb-10 text-black tracking-wide">LOGIN</h1>

            <form method="POST" action="{{ route('login') }}" class="flex-grow flex flex-col">
                @csrf <div class="mb-4">
                    <label class="block text-xs font-semibold text-black mb-1 ml-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-[#b5a7a4] bg-opacity-40 rounded-xl outline-none px-4 py-3 text-sm text-black font-medium">
                </div>

                <div class="mb-2">
                    <label class="block text-xs font-semibold text-black mb-1 ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-[#b5a7a4] bg-opacity-40 rounded-xl outline-none px-4 py-3 text-sm text-black font-medium">
                </div>

                <div class="text-right mb-8">
                    <a href="{{ route('password.request') }}"
                        class="text-[10px] font-bold text-black hover:underline">Lupa Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-[#b5a7a4] hover:bg-[#a39592] transition-colors duration-200 text-black font-bold py-3 rounded-xl shadow-sm text-lg tracking-wider">
                    LOGIN
                </button>
            </form>

            <div class="text-center mt-auto pb-4">
                <p class="text-xs font-bold text-black">
                    Belum Punya Akun?
                    <label for="toggle-form" class="text-blue-600 hover:underline cursor-pointer">Sign Up</label>
                </p>
            </div>
        </div>


        <div
            class="absolute top-0 left-0 w-full md:w-1/2 h-full z-10 transition-transform duration-700 ease-in-out -translate-x-full peer-checked:translate-x-0 flex flex-col px-6 md:px-16 py-8 bg-[#ffedd9]">

            <h1 class="text-4xl font-bold text-center mb-10 text-black tracking-wide">REGISTER</h1>

            <form method="POST" action="{{ route('register') }}" class="flex-grow flex flex-col">
                @csrf

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-black mb-1 ml-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-[#b5a7a4] bg-opacity-40 rounded-xl outline-none px-4 py-3 text-sm text-black font-medium">
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-black mb-1 ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-[#b5a7a4] bg-opacity-40 rounded-xl outline-none px-4 py-3 text-sm text-black font-medium">
                </div>

                <div class="mb-8">
                    <label class="block text-xs font-semibold text-black mb-1 ml-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full bg-[#b5a7a4] bg-opacity-40 rounded-xl outline-none px-4 py-3 text-sm text-black font-medium">
                </div>

                <button type="submit"
                    class="w-full bg-[#b5a7a4] hover:bg-[#a39592] transition-colors duration-200 text-black font-bold py-3 rounded-xl shadow-sm text-lg tracking-wider">
                    REGISTER
                </button>
            </form>

            <div class="text-center mt-auto pb-4">
                <p class="text-xs font-bold text-black">
                    Sudah Punya Akun?
                    <label for="toggle-form" class="text-blue-600 hover:underline cursor-pointer">Login</label>
                </p>
            </div>
        </div>

    </div>

</body>

</html>