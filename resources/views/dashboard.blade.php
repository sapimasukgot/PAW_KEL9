<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Role - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#fcebda] min-h-screen p-4 md:p-8 flex items-center justify-center">

    <div
        class="w-full max-w-5xl bg-[#ffedd9] rounded-[2rem] shadow-2xl overflow-hidden flex flex-col md:flex-row min-h-[600px]">

        <div class="h-48 md:h-auto md:w-1/2 relative">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&q=80&w=800"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/10"></div>
        </div>

        <div class="flex-1 flex flex-col items-center justify-center p-6 md:p-12">
            <h1 class="text-2xl md:text-4xl font-bold text-black mb-8 md:mb-12 text-center tracking-wide">Pilih Role
                kamu:</h1>
            <form action="{{ route('updateRole') }}" method="POST"
                class="grid grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-12">
                @csrf
                @foreach(['Pembeli', 'Penjual', 'Admin'] as $role)
                    @php
                        $targetRoute = strtolower($role);
                    @endphp
                    <button type="submit" name="role" value="{{ $targetRoute }}"
                        class="bg-[#e07b11] hover:bg-[#c26a0e] hover:-translate-y-1 transition-all duration-300 w-full aspect-square md:w-36 md:h-36 rounded-[2rem] flex flex-col items-center justify-end pb-4 shadow-lg group relative overflow-hidden">
                        <div class="absolute top-2 w-16 md:w-20 group-hover:scale-110 transition-transform">
                            <span class="text-white text-2xl font-bold">{{ substr($role, 0, 1) }}</span>
                        </div>
                        <span
                            class="text-white font-semibold text-sm md:text-base z-10 uppercase tracking-wider">{{ $role }}</span>
                    </button>
                @endforeach
            </form>

            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-12">
                @foreach(['Pembeli', 'Penjual', 'Admin'] as $role)
                    @php
                        $targetRoute = '#';
                        if ($role == 'Admin') {
                            $targetRoute = route('admin-beranda');
                        } elseif ($role == 'Penjual') {
                            $targetRoute = route('penjual-beranda');
                        } elseif ($role == 'Pembeli') {
                            $targetRoute = route('pembeli-beranda');
                        }
                    @endphp

                    <a href="{{ route('updateRole', ['role' => strtolower($role)]) }}"
                        class="bg-[#e07b11] hover:bg-[#c26a0e] hover:-translate-y-1 transition-all duration-300 w-full aspect-square md:w-36 md:h-36 rounded-[2rem] flex flex-col items-center justify-end pb-4 shadow-lg group relative overflow-hidden">
                        <img src="https://placehold.co/100x100/transparent/white?text={{ substr($role, 0, 1) }}"
                            class="absolute top-2 w-16 md:w-20 group-hover:scale-110 transition-transform">
                        <span class="text-white font-semibold text-sm md:text-base z-10">{{ $role }}</span>
                    </a>
                @endforeach
            </div>

            <a href="{{ route('login') }}"
                class="bg-[#d6d6d6] hover:bg-[#bebebe] px-10 py-3 rounded-full text-black font-bold text-lg shadow-md transition-all">Kembali</a>
        </div>
    </div>

</body>

</html>