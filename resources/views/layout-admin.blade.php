<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { font-family: 'Inter', sans-serif; background-color: #fcebda; }</style>
</head>
<body class="min-h-screen flex flex-col">
    <header class="bg-[#f7e4cf] p-4 shadow-sm border-b border-[#e6d1ba] sticky top-0 z-40">
        <h1 class="text-xl md:text-2xl font-bold text-[#634a2c] text-center mb-3" data-translate="brand">MakanMart</h1>
        <div class="flex gap-3 justify-center">
            <a href="{{ route('admin-beranda') }}" 
               class="{{ request()->routeIs('admin-beranda*') ? 'bg-[#e6d1ba]' : 'bg-white' }} px-6 py-1.5 rounded-full font-semibold text-sm" 
               data-translate="nav_home">Beranda</a>
            <a href="{{ route('profile') }}" 
               class="{{ 
                request()->routeIs('profile*') || 
                request()->routeIs('ubah-profil-admin*') || 
                request()->routeIs('ubah-bahasa-admin*') || 
                request()->routeIs('pengaturan-akun-admin*') || 
                request()->routeIs('ubah-sandi-admin*')
                ? 'bg-[#e6d1ba]' : 'bg-white' 
           }} px-6 py-1.5 rounded-full font-semibold text-sm transition-colors" 
           data-translate="nav_profile">Profil</a>
        </div>
    </header>

    <main class="flex-1 p-6 max-w-5xl mx-auto w-full">@yield('content')</main>

    <script>
        const dictionary = {
            'id': {
                'brand': 'MakanMart',
                'nav_home': 'Beranda',
                'nav_profile': 'Profil',
                'title_store_list': 'Daftar Toko',
                'title_add_store': 'Tambah Toko',
                'btn_view_mode': 'Mode View',
                'btn_delete_mode': 'Mode Hapus',
                'btn_delete_item': 'Hapus',
                'btn_add_new_store': 'Tambah Toko Baru',
                'label_store_name': 'Nama Lapak',
                'label_owner_name': 'Nama Pemilik',
                'label_phone': 'Nomor HP',
                'holder_store_name': 'Contoh: Warung Nasi Goreng',
                'holder_owner_name': 'Contoh: Joni Alfreandra',
                'holder_phone': 'Contoh: 0887654321',
                'btn_cancel': 'Batal',
                'btn_add': 'Tambah',
                'modal_delete_title': 'Hapus Toko?',
                'modal_delete_msg': 'Apakah Anda yakin ingin menghapus toko ini? Data akan hilang secara permanen.',
                'modal_delete_confirm': 'Ya, Hapus Toko',
                'title_admin_profile': 'Profil Admin',
                'label_language': 'Bahasa',
                'label_account_settings': 'Pengaturan Akun',
                'label_logout': 'Keluar Akun',
                'modal_logout_admin_title': 'Keluar Dashboard Admin?',
                'modal_logout_admin_msg': 'Apakah Anda yakin ingin mengakhiri sesi administrasi?',
                'modal_logout_admin_action': 'Keluar Sekarang',
                'title_edit_profile': 'Ubah Profil',
                'label_full_name': 'Nama Lengkap',
                'label_email': 'Alamat Email',
                'label_phone': 'Nomor Telepon',
                'btn_save': 'Simpan',
                'btn_back': 'Kembali',
                'title_account_settings': 'Pengaturan Akun',
                'label_change_pw': 'Ubah Sandi',
                'label_logout': 'Keluar Akun',
                'desc_logout_warn': 'Yakin mau keluar? Pas balik harus masuk akun lagi ya.',
                'label_delete_acc': 'Hapus Akun',
                'desc_delete_warn': 'Akunmu akan dihapus secara permanen.',
                'btn_back': 'Kembali',
                'change_password': 'Ubah Sandi',
                'title_change_pw': 'Ubah Sandi',
                'label_old_pw': 'Password Lama',
                'label_new_pw': 'Password Baru',
                'label_confirm_pw': 'Konfirmasi Password',
                'btn_save': 'Simpan',
                'btn_back': 'Kembali',
            },
            'en': {
                'brand': 'EatMart',
                'nav_home': 'Home',
                'nav_profile': 'Profile',
                'title_store_list': 'Store List',
                'title_add_store': 'Add Store',
                'btn_view_mode': 'View Mode',
                'btn_delete_mode': 'Delete Mode',
                'btn_delete_item': 'Delete',
                'btn_add_new_store': 'Add New Store',
                'label_store_name': 'Shop Name',
                'label_owner_name': 'Owner Name',
                'label_phone': 'Phone Number',
                'holder_store_name': 'Example: Fried Rice Stall',
                'holder_owner_name': 'Example: Joni Alfreandra',
                'holder_phone': 'Example: 0887654321',
                'btn_cancel': 'Cancel',
                'btn_add': 'Add',
                'modal_delete_title': 'Delete Store?',
                'modal_delete_msg': 'Are you sure you want to delete this store? Data will be permanently lost.',
                'modal_delete_confirm': 'Yes, Delete Store',
                'title_admin_profile': 'Admin Profile',
                'label_language': 'Language',
                'label_account_settings': 'Account Settings',
                'label_logout': 'Logout Account',
                'modal_logout_admin_title': 'Exit Admin Dashboard?',
                'modal_logout_admin_msg': 'Are you sure you want to end the administrative session?',
                'modal_logout_admin_action': 'Logout Now',
                'title_edit_profile': 'Edit Profile',
                'label_full_name': 'Full Name',
                'label_email': 'Email Address',
                'label_phone': 'Phone Number',
                'btn_save': 'Save',
                'btn_back': 'Back',
                'title_account_settings': 'Account Settings',
                'label_change_pw': 'Change Password',
                'label_logout': 'Logout Account',
                'desc_logout_warn': 'Are you sure you want to logout? You will need to log in again to access your account.',
                'label_delete_acc': 'Delete Account',
                'desc_delete_warn': 'Your account will be permanently deleted.',
                'change_password': 'Change Password',
                'title_change_pw': 'Change Password',
                'label_old_pw': 'Old Password',
                'label_new_pw': 'New Password',
                'label_confirm_pw': 'Confirm Password',
                'btn_save': 'Save',
                'btn_back': 'Back',
            }
        };

        function applyLanguage() {
            const lang = localStorage.getItem('app_lang') || 'id';

            document.querySelectorAll('[data-translate]').forEach(el => {
                const key = el.getAttribute('data-translate');
                
                if (dictionary[lang] && dictionary[lang][key]) {
                    const translation = dictionary[lang][key];

                    if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                        el.placeholder = translation;
                    } 
                    else {
                        el.innerText = translation;
                    }
                }
            });

            document.documentElement.lang = lang;
        }

        document.addEventListener('DOMContentLoaded', applyLanguage);

        window.refreshLanguage = applyLanguage;

        let globalTimer;
        function showCustomModal(config) {
            const { title, message, actionText, actionUrl } = config;
            const existing = document.getElementById('global-modal');
            if (existing) existing.remove();

            const modalHTML = `
                <div id="global-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[9999] p-4">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl max-w-sm w-full text-center border border-gray-100 animate-in zoom-in duration-300">
                        <div class="w-20 h-20 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2 text-gray-900">${title}</h3>
                        <p class="text-gray-500 mb-8 text-sm leading-relaxed">${message}</p>
                        <div class="flex flex-col gap-3">
                            <button id="btn-timer-confirm" disabled class="w-full py-4 bg-red-500 text-white rounded-2xl font-bold shadow-lg opacity-50 cursor-not-allowed transition-all">
                                ${actionText} (5)
                            </button>
                            <button onclick="document.getElementById('global-modal').remove()" class="w-full py-4 bg-gray-100 text-gray-700 rounded-2xl font-bold hover:bg-gray-200 transition-all">Batal</button>
                        </div>
                    </div>
                </div>`;
            
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            let timeLeft = 5;
            const btn = document.getElementById('btn-timer-confirm');
            
            clearInterval(globalTimer);
            globalTimer = setInterval(() => {
                timeLeft--;
                btn.innerText = `${actionText} (${timeLeft})`;
                if (timeLeft <= 0) {
                    clearInterval(globalTimer);
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                    btn.innerText = actionText;
                }
            }, 1000);

            btn.onclick = () => window.location.href = actionUrl;
        }
    </script>
</body>
</html>