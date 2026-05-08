<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><title>MakanMart - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2a2a2a] min-h-screen flex items-center justify-center p-4">
    <script>alert("JS Login Berhasil Dimuat!");</script>

    <div id="auth-box" class="bg-[#ffedd9] w-full max-w-4xl h-[600px] rounded-[2rem] shadow-2xl relative overflow-hidden flex transition-transform duration-300">
        <input type="checkbox" id="toggle-form" class="hidden peer">

        <div class="w-full md:w-1/2 p-12 flex flex-col justify-center z-20 peer-checked:opacity-0 transition-all duration-500">
            <h1 class="text-4xl font-bold mb-8">LOGIN</h1>
            <form method="POST" action="{{ route('login.submit') }}" class="flex flex-col gap-4">
                @csrf
                <input type="text" id="log-name" name="name" placeholder="Nama" class="w-full p-4 rounded-xl bg-gray-200 border-none outline-none">
                <input type="email" id="log-email" name="email" placeholder="Email" class="w-full p-4 rounded-xl bg-gray-200 border-none outline-none">
                <button type="submit" class="w-full bg-[#b5a7a4] py-4 rounded-xl font-bold">LOGIN</button>
            </form>
            <p class="mt-6 text-center text-xs">Belum punya akun? <label for="toggle-form" class="text-blue-600 cursor-pointer font-bold">Sign Up</label></p>
        </div>

        <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=800')"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('toggle-form');
            const box = document.getElementById('auth-box');

            toggle.addEventListener('change', () => {
                box.style.transform = "scale(0.97)";
                setTimeout(() => { box.style.transform = "scale(1)"; }, 300);
            });

            const inputs = ['log-name', 'log-email'];
            inputs.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = localStorage.getItem('auth_' + id) || '';
                    el.addEventListener('input', () => localStorage.setItem('auth_' + id, el.value));
                }
            });
        });
    </script>
</body>
</html>