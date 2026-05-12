<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Penjual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        body { background-color: #F7EFDD; }
    </style>
</head>
<body class="min-h-screen flex flex-col">
<nav class="bg-white border-b border-gray-200 p-4 flex-none">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-[#7A5C2D] font-bold text-xl mb-3" data-translate="brand">MakanMart</h1>
        <div class="flex gap-2 overflow-x-auto no-scrollbar">
            @php $r = request(); @endphp
            
            <a href="{{ route('penjual-beranda') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ $r->routeIs('penjual-beranda*') || $r->routeIs('tambah_menu*') ? 'bg-[#EFDEB9]' : 'bg-white' }}" data-translate="nav_home">
               Beranda
            </a>
            
            <a href="{{ route('pesanan-penjual') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ $r->routeIs('pesanan-penjual*') || $r->routeIs('pesanan-detail*') ? 'bg-[#EFDEB9]' : 'bg-white' }}" data-translate="nav_orders">
               Pesanan
            </a>

            <a href="{{ route('ulasan-penjual') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ $r->routeIs('ulasan-penjual*') || $r->routeIs('ulasan-detail*') ? 'bg-[#EFDEB9]' : 'bg-white' }}" data-translate="nav_reviews">
               Ulasan
            </a>

            <a href="{{ route('riwayat-penjual') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ $r->routeIs('riwayat-penjual*') ? 'bg-[#EFDEB9]' : 'bg-white' }}" data-translate="nav_history">
               Riwayat
            </a>

            <a href="{{ route('profil-penjual') }}" 
               class="px-4 py-1 rounded-full border whitespace-nowrap {{ 
                    $r->routeIs('profil-penjual*') || 
                    $r->routeIs('ubah-profil*') || 
                    $r->routeIs('pengaturan-akun*') || 
                    $r->routeIs('ubah-sandi*') ||
                    $r->routeIs('ubah-bahasa*')
                    ? 'bg-[#EFDEB9]' : 'bg-white' }}" data-translate="nav_profile">
               Profil
            </a>
        </div>
    </div>
</nav>

    <main class="flex-1 p-6">
        <div class="max-w-4xl mx-auto">
            @yield('content')
        </div>
    </main>

    <script>
        const dictionary = {
        'id': {
            'brand': 'MakanMart',
            'nav_home': 'Beranda',
            'nav_orders': 'Pesanan',
            'nav_reviews': 'Ulasan',
            'nav_history': 'Riwayat',
            'nav_profile': 'Profil',
            'title_change_lang': 'Ubah Bahasa',
            'btn_back': 'Kembali',
            'title_change_pw': 'Ubah Sandi',
            'label_old_pw': 'Password Lama:',
            'label_new_pw': 'Password Baru:',
            'label_confirm_pw': 'Konfirmasi Password:',
            'btn_back': 'Kembali',
            'btn_save': 'Simpan',
            'title_settings': 'Pengaturan Akun',
            'label_change_pw': 'Ubah Sandi',
            'label_logout': 'Keluar Akun',
            'desc_logout_warning': 'Yakin mau keluar? Pas balik harus masuk akun lagi ya',
            'label_delete_account': 'Hapus Akun',
            'desc_delete_account_warning': 'Akunmu akan dihapus secara permanen.',
            'btn_back': 'Kembali',
            'label_order_history': 'Riwayat Pesanan',
            'label_language': 'Bahasa',
            'label_account_settings': 'Pengaturan Akun',
            'label_logout': 'Keluar Akun',
            'modal_logout_seller_title': 'Keluar Akun?',
            'modal_logout_seller_msg': 'Apakah Anda yakin ingin keluar dari akun Penjual? Pastikan semua pesanan hari ini sudah Anda cek.',
            'btn_cancel': 'Batal',
            'title_edit_profile': 'Ubah Profil',
            'btn_add_photo': 'Tambah Foto',
            'label_name': 'Nama:',
            'label_phone': 'No. HP:',
            'label_email': 'Email:',
            'btn_back': 'Kembali',
            'btn_save': 'Simpan',
            'title_customer_history': 'Riwayat Pesanan Pelanggan',
            'btn_view_detail': 'Lihat Detail',
            'title_menu_detail': 'Detail Menu',
            'title_order_detail': 'Detail Pesanan',
            'label_reguler': 'Reguler:',
            'label_jumbo': 'Jumbo:',
            'label_name': 'Nama:',
            'label_price': 'Harga:',
            'btn_back': 'Kembali',
            'title_customer_reviews': 'Ulasan Pelanggan',
            'label_review': 'Ulasan:',
            'btn_view_detail': 'Lihat Detail',
            'title_menu_detail': 'Detail Menu',
            'label_reguler': 'Reguler:',
            'label_jumbo': 'Jumbo:',
            'label_topping': 'Topping:',
            'label_spicy_lvl': 'Level Pedas:',
            'title_order_detail': 'Detail Pesanan',
            'label_name': 'Nama:',
            'label_table_no': 'No. Meja:',
            'label_price': 'Harga:',
            'label_status': 'Keterangan:',
            'status_completed': 'Selesai',
            'title_customer_review': 'Ulasan Pelanggan',
            'btn_back': 'Kembali',
            'title_customer_orders': 'Pesanan Pelanggan',
            'btn_view_detail': 'Lihat Detail',
            'status_order_completed': 'Pesanan Selesai',
            'title_menu_list': 'Daftar Menu pada Toko Nasi',
            'btn_add_menu': 'Tambah Menu',
            'btn_delete_mode': 'Hapus Menu',
            'btn_delete_item': 'Hapus',
            'modal_delete_menu_title': 'Hapus Menu?',
            'modal_delete_menu_confirm': 'Ya, Hapus',
            'modal_delete_menu_msg': 'Apakah anda yakin ingin menghapus menu ini? Tindakan ini tidak dapat dibatalkan.',
            'title_add_menu': 'Tambah Menu',
            'label_menu_name': 'Nama Menu',
            'label_topping': 'Topping',
            'label_spicy_lvl': 'Level Pedas',
            'btn_back': 'Kembali',
            'btn_add': 'Tambah',
            'label_order_status': 'Status Pesanan:',
        },
        'en': {
            'brand': 'EatMart',
            'nav_home': 'Home',
            'nav_orders': 'Orders',
            'nav_reviews': 'Reviews',
            'nav_history': 'History',
            'nav_profile': 'Profile',
            'title_change_lang': 'Change Language',
            'btn_back': 'Back',
            'title_change_pw': 'Change Password',
            'label_old_pw': 'Old Password:',
            'label_new_pw': 'New Password:',
            'label_confirm_pw': 'Confirm Password:',
            'btn_save': 'Save',
            'title_settings': 'Account Settings',
            'label_change_pw': 'Change Password',
            'label_logout': 'Logout',
            'desc_logout_warning': 'Are you sure you want to logout? You will need to log in again to access your account.',
            'label_delete_account': 'Delete Account',
            'desc_delete_account_warning': 'Your account will be deleted permanently.',
            'label_order_history': 'Order History',
            'label_language': 'Language',
            'label_account_settings': 'Account Settings',
            'label_logout': 'Logout',
            'modal_logout_seller_title': 'Logout Account?',
            'modal_logout_seller_msg': 'Are you sure you want to logout from your Seller account? Make sure you have checked all today\'s orders.',
            'btn_cancel': 'Cancel',
            'title_edit_profile': 'Edit Profile',
            'btn_add_photo': 'Add Photo',
            'label_name': 'Name:',
            'label_phone': 'Phone No:',
            'label_email': 'Email:',
            'btn_back': 'Back',
            'btn_save': 'Save',
            'title_customer_history': 'Customer Order History',
            'btn_view_detail': 'View Detail',
            'title_menu_detail': 'Menu Detail',
            'title_order_detail': 'Order Detail',
            'label_reguler': 'Regular:',
            'label_jumbo': 'Jumbo:',
            'label_name': 'Name:',
            'label_price': 'Price:',
            'btn_back': 'Back',
            'title_customer_reviews': 'Customer Reviews',
            'label_review': 'Review:',
            'btn_view_detail': 'View Detail',
            'title_menu_detail': 'Menu Detail',
            'label_reguler': 'Regular:',
            'label_jumbo': 'Jumbo:',
            'label_topping': 'Topping:',
            'label_spicy_lvl': 'Spicy Level:',
            'title_order_detail': 'Order Detail',
            'label_name': 'Name:',
            'label_table_no': 'Table No:',
            'label_price': 'Price:',
            'label_status': 'Status:',
            'status_completed': 'Completed',
            'title_customer_review': 'Customer Review',
            'btn_back': 'Back',
            'title_customer_orders': 'Customer Orders',
            'btn_view_detail': 'View Detail',
            'status_order_completed': 'Order Completed',
            'title_store': 'Toko Nasi',
            'title_menu_list': 'Menu List at Toko Nasi',
            'btn_add_menu': 'Add Menu',
            'btn_delete_mode': 'Delete Menu',
            'btn_delete_item': 'Delete',
            'modal_delete_menu_title': 'Delete Menu?',
            'modal_delete_menu_confirm': 'Yes, Delete',
            'modal_delete_menu_msg': 'Are you sure you want to delete this menu? This action cannot be undone.',
            'title_add_menu': 'Add Menu',
            'label_menu_name': 'Menu Name',
            'label_topping': 'Topping',
            'label_spicy_lvl': 'Spicy Level',
            'btn_back': 'Back',
            'btn_add': 'Add',
            'label_order_status': 'Order Status:',
        }
    };

    function applyLanguage() {
        const lang = localStorage.getItem('app_lang') || 'id';

        document.querySelectorAll('[data-translate]').forEach(el => {
            const key = el.getAttribute('data-translate');
            if (dictionary[lang] && dictionary[lang][key]) {
                el.innerText = dictionary[lang][key];
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
                <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl max-w-sm w-full text-center animate-in zoom-in duration-300">
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">${title}</h3>
                    <p class="text-gray-500 mb-8 text-sm">${message}</p>
                    <div class="flex flex-col gap-3">
                        <button id="btn-timer-confirm" disabled class="w-full py-4 bg-red-500 text-white rounded-2xl font-bold opacity-50 cursor-not-allowed">
                            ${actionText} (5)
                        </button>
                        <button onclick="document.getElementById('global-modal').remove()" class="w-full py-4 bg-gray-100 text-gray-700 rounded-2xl font-bold">Batal</button>
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