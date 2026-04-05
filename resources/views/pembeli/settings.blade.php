@include('pembeli.nav')

<div class="p-6 space-y-4">
    <h2 class="text-center font-bold text-xl mb-6">Pengaturan Akun</h2>

    <a href="{{ route('pembeli-ubah-sandi') }}" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4">
        <span>🔒</span>
        <div>
            <p class="font-bold">Ubah Sandi</p>
        </div>
    </a>

    <div onclick="confirmAction('logout')" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 cursor-pointer">
        <span>➡️</span>
        <div>
            <p class="font-bold">Keluar Akun</p>
            <p class="text-xs text-gray-400">Yakin mau keluar? Pas balik harus masuk akun lagi ya</p>
        </div>
    </div>

    <div onclick="deleteAcc()" class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-4 cursor-pointer">
        <span>🗑️</span>
        <div>
            <p class="font-bold">Hapus Akun</p>
            <p class="text-xs text-gray-400">Akunmu akan dihapus secara permanen. Jadi kamu gak bisa lagi akses riwayat transaksi...</p>
        </div>
    </div>
</div>

<script>
    function deleteAcc() {
        if(confirm("Apakah Anda benar-benar ingin menghapus akun?")) {
            alert("Akun Berhasil Dihapus!"); // Simulasi pop-up pesan kiri atas
            window.location.href = "{{ route('login') }}";
        }
    }
</script>