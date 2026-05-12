@include('pembeli.nav')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="title_edit_profile">Edit Profil - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#fcebda] min-h-screen">
    <div class="p-6 max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8" data-translate="title_edit_profile">Edit Profil</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-xl text-sm mb-4 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-xl text-xs mb-4">
                <ul class="list-none">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembeli-update-profil') }}" method="POST">
            @csrf
            <div class="space-y-4">

                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1 ml-1" data-translate="label_name">Nama</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" 
                        placeholder="Nama" data-translate="holder_name"
                        class="w-full p-3 rounded-xl border shadow-sm focus:outline-none focus:ring-2 ring-orange-200">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1 ml-1" data-translate="label_email">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                        placeholder="Email" data-translate="holder_email"
                        class="w-full p-3 rounded-xl border shadow-sm focus:outline-none focus:ring-2 ring-orange-200">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 mb-1 ml-1" data-translate="label_phone">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone ?? '+6212345678') }}" 
                        placeholder="Nomor Telepon" data-translate="holder_telp"
                        class="w-full p-3 rounded-xl border shadow-sm focus:outline-none focus:ring-2 ring-orange-200">
                </div>
            </div>

            <div class="flex justify-between mt-10">
                <a href="{{ route('pembeli-profil') }}" class="bg-gray-200 px-8 py-2 rounded-xl font-bold" data-translate="btn_back">Kembali</a>
                <button type="submit"
                    class="bg-orange-500 text-white px-8 py-2 rounded-xl font-bold hover:bg-orange-600 transition-all" data-translate="btn_save">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof window.refreshLanguage === 'function') {
                window.refreshLanguage();
            }
        });
    </script>
</body>
</html>