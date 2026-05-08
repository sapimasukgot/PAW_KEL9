@include('pembeli.nav')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><title>Edit Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen">
    <div class="p-6 max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8">Edit Profil</h2>
        <div class="space-y-4">
            <input type="text" id="edit-nama" placeholder="Nama" class="w-full p-3 rounded-xl border shadow-sm">
            <input type="email" id="edit-email" placeholder="Email" class="w-full p-3 rounded-xl border shadow-sm">
            <input type="text" id="edit-telp" placeholder="Nomor Telepon" class="w-full p-3 rounded-xl border shadow-sm">
        </div>
        <div class="flex justify-between mt-10">
            <a href="{{ route('pembeli-profil') }}" class="bg-gray-200 px-8 py-2 rounded-xl font-bold">Kembali</a>
            <button onclick="simpanLokal()" class="bg-orange-500 text-white px-8 py-2 rounded-xl font-bold">Simpan</button>
        </div>
    </div>

    <script>
    function simpanLokal() {
        alert("Profil disimpan secara lokal!");
        window.location.href = "{{ route('pembeli-profil') }}";
    }

    document.addEventListener('DOMContentLoaded', () => {
        initPersistence('profile', ['edit-nama', 'edit-email', 'edit-telp']);
    });
    </script>
</body>
</html>