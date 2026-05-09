@include('pembeli.nav')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title data-translate="title_edit_profile">Edit Profil - MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcebda] min-h-screen">
    <div class="p-6 max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-center mb-8" data-translate="title_edit_profile">Edit Profil</h2>
        
        <div class="space-y-4">
            <input type="text" id="edit-nama" data-translate="holder_name" placeholder="Nama" class="w-full p-3 rounded-xl border shadow-sm">
            <input type="email" id="edit-email" data-translate="holder_email" placeholder="Email" class="w-full p-3 rounded-xl border shadow-sm">
            <input type="text" id="edit-telp" data-translate="holder_telp" placeholder="Nomor Telepon" class="w-full p-3 rounded-xl border shadow-sm">
        </div>

        <div class="flex justify-between mt-10">
            <a href="{{ route('pembeli-profil') }}" class="bg-gray-200 px-8 py-2 rounded-xl font-bold" data-translate="btn_back">Kembali</a>
            <button onclick="simpanLokal()" class="bg-orange-500 text-white px-8 py-2 rounded-xl font-bold" data-translate="btn_save">Simpan</button>
        </div>
    </div>

    <script>
    function simpanLokal() {
        // Ambil bahasa yang aktif dari localStorage
        const lang = localStorage.getItem('app_lang') || 'id';
        
        // Ambil pesan alert dari dictionary global di nav.blade.php
        const msg = (dictionary[lang] && dictionary[lang]['alert_save_local']) 
                    ? dictionary[lang]['alert_save_local'] 
                    : "Profil disimpan!";
        
        alert(msg);
        window.location.href = "{{ route('pembeli-profil') }}";
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Jika Anda menggunakan fungsi initPersistence untuk menyimpan data ketikan
        if (typeof initPersistence === 'function') {
            initPersistence('profile', ['edit-nama', 'edit-email', 'edit-telp']);
        }
    });
    </script>
</body>
</html>