<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Role - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#fcebda] min-h-screen p-0">

    <div
        class="w-full h-full rounded-none md:rounded-[2rem] shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2 bg-[#ffedd9]">

        <div class="h-full relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&q=80&w=800"
                alt="Interior Cafe" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-black bg-opacity-10"></div>
        </div>


        <div class="h-full flex flex-col items-center justify-center p-6 md:p-12">

            <h1 class="text-3xl md:text-4xl font-bold text-black mb-12 tracking-wide text-center">
                Pilih Role kamu:
            </h1>

            <div class="flex flex-col items-center gap-6">

                <div class="flex gap-6">

                    <a href="#"
                        class="bg-[#e07b11] hover:bg-[#c26a0e] hover:-translate-y-1 transition-all duration-300 w-36 h-36 rounded-[2rem] flex flex-col items-center justify-end pb-4 shadow-lg cursor-pointer relative overflow-hidden group">
                        <img src="https://placehold.co/100x100/transparent/white?text=Img+Pembeli"
                            alt="Ilustrasi Pembeli"
                            class="absolute top-2 w-24 h-24 object-contain group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-semibold text-base z-10">Pembeli</span>
                    </a>

                    <a href="#"
                        class="bg-[#e07b11] hover:bg-[#c26a0e] hover:-translate-y-1 transition-all duration-300 w-36 h-36 rounded-[2rem] flex flex-col items-center justify-end pb-4 shadow-lg cursor-pointer relative overflow-hidden group">
                        <img src="https://placehold.co/100x100/transparent/white?text=Img+Penjual"
                            alt="Ilustrasi Penjual"
                            class="absolute top-2 w-24 h-24 object-contain group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-semibold text-base z-10">Penjual</span>
                    </a>
                </div>

                <a href="{{ route('admin-beranda') }}"
                    class="bg-[#e07b11] hover:bg-[#c26a0e] hover:-translate-y-1 transition-all duration-300 w-36 h-36 rounded-[2rem] flex flex-col items-center justify-end pb-4 shadow-lg cursor-pointer relative overflow-hidden group">
                    <img src="https://placehold.co/100x100/transparent/white?text=Img+Admin" alt="Ilustrasi Admin"
                        class="absolute top-2 w-24 h-24 object-contain group-hover:scale-110 transition-transform duration-300">
                    <span class="text-white font-semibold text-base z-10">Admin</span>
                </a>
            </div>

            <a href="{{ route('login') }}"
                class="mt-16 bg-[#d6d6d6] hover:bg-[#bebebe] transition-colors duration-200 px-12 py-3 rounded-full text-black font-bold text-xl shadow-md">
                Kembali
            </a>

        </div>

    </div>

</body>

</html>