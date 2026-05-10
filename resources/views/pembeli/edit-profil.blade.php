@include('pembeli.nav')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Profil - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#fcebda] min-h-screen">
    <div class="p-6 max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8">Edit Profil</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-xl text-sm mb-4 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-xl text-xs mb-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route('pembeli-update-profil') }}" method="POST">
            @csrf
            <div class="space-y-4">

                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Nama</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="Nama"
                        class="w-full p-3 rounded-xl border shadow-sm focus:outline-none focus:ring-2 ring-orange-200">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Email"
                        class="w-full p-3 rounded-xl border shadow-sm focus:outline-none focus:ring-2 ring-orange-200">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Nomor Telepon</label>
                    <input type="text" value="+6212345678" placeholder="Nomor Telepon"
                        class="w-full p-3 rounded-xl border shadow-sm bg-gray-100 cursor-not-allowed" readonly>
                    <p class="text-[10px] text-gray-400 ml-1 mt-1">Nomor telepon tidak dapat diubah.</p>
                </div>
            </div>

            <div class="flex justify-between mt-10">
                <a href="{{ route('pembeli-profil') }}" class="bg-gray-200 px-8 py-2 rounded-xl font-bold">Kembali</a>
                <button type="submit"
                    class="bg-orange-500 text-white px-8 py-2 rounded-xl font-bold hover:bg-orange-600 transition-all">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>