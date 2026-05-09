<nav class="w-full p-4 flex flex-col gap-3 shadow-sm sticky top-0 z-50" style="background-color: #F7EFDD;">
    <h1 class="text-xl font-bold" style="color: #5C430D;" data-translate="brand">MakanMart</h1>
    
    <div class="flex gap-2">
        <a href="{{ route('pembeli-beranda') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ 
                request()->routeIs('pembeli-beranda*') || 
                request()->routeIs('pembeli-ongoing*') || 
                request()->routeIs('pembeli-detail*') || 
                request()->routeIs('pembeli-checkout*') || 
                request()->routeIs('pembeli-pembayaran*') || 
                request()->routeIs('pembeli-rating*') || 
                request()->routeIs('pembeli-thanks*') ||
                request()->routeIs('pembeli-detail-pesanan*')
                ? '#EFDEB9' : '#FAF4E9' 
           }};"
           data-translate="nav_home">Beranda</a>

        <a href="{{ route('pembeli-riwayat') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ request()->routeIs('pembeli-riwayat*') ? '#EFDEB9' : '#FAF4E9' }};"
           data-translate="nav_history">Riwayat</a>

        <a href="{{ route('pembeli-profil') }}" 
           class="px-5 py-1 rounded-full text-xs font-bold transition-colors shadow-sm"
           style="background-color: {{ 
                request()->routeIs('pembeli-profil*') || 
                request()->routeIs('pembeli-edit-profil*') || 
                request()->routeIs('pembeli-pengaturan*') || 
                request()->routeIs('pembeli-bahasa*') || 
                request()->routeIs('pembeli-ubah-sandi*')
                ? '#EFDEB9' : '#FAF4E9' 
           }};"
           data-translate="nav_profile">Profil</a>
    </div>
</nav>
<script>
    const dictionary = {
        'id': {
            'brand': 'MakanMart',
            'nav_home': 'Beranda',
            'nav_history': 'Riwayat',
            'nav_profile': 'Profil',
            'title_profile': 'Profil Saya',
            'label_lang': 'Bahasa',
            'label_settings': 'Pengaturan Akun',
            'label_logout': 'Keluar Akun',
            'title_change_pw': 'Ubah Kata Sandi',
            'label_old_pw': 'Sandi Lama',
            'label_new_pw': 'Sandi Baru',
            'btn_save': 'Simpan Perubahan',
            'holder_pw': 'Masukkan sandi anda...',
            'btn_back': 'Kembali',
            'title_recommendation': 'Rekomendasi',
            'title_ongoing': 'Pesanan Sedang Berlangsung',
            'btn_see_detail': 'Lihat Detail',
            'status_waiting': 'Menunggu Pembayaran',
            'label_price': 'Harga',
            'btn_checkout': 'Checkout Sekarang',
            'label_total': 'Total Pembayaran',
            'label_method': 'Metode Pembayaran',
            'btn_pay': 'Bayar Sekarang',
            'title_history': 'Riwayat Pesanan',
            'label_date': 'Tanggal',
            'status_done': 'Selesai',
            'status_cancel': 'Dibatalkan',
            'holder_search': 'Cari Mie Pangsit...',
            'desc_menu': 'Menu sedap sekali',
            'title_detail': 'Detail Menu',
            'label_desc': 'Deskripsi',
            'label_price_detail': 'Detail Harga',
            'label_topping': 'Topping',
            'label_spicy_level': 'Level Pedas',
            'label_review': 'Ulasan',
            'btn_order': 'Pesan',
            'desc_generic': 'adalah salah satu menu yang cukup digemari pelanggan, terlebih karena rasanya yang gurih dan aromanya yang menggugah selera.',
            'title_payment_instruction': 'Instruksi Pembayaran',
            'heading_payment_counter': 'Silahkan lakukan pembayaran di counter!',
            'subheading_wait_confirmation': 'Tunggu konfirmasi pembayaran dari penjual',
            'btn_next': 'Selanjutnya',
            'holder_search_all': 'Cari Makanan dan Minuman/Nama Toko',
            'label_image': 'Gambar',
            'label_image_short': 'Gbr',
            'desc_mie_pangsit': 'Mie Pangsit sedap sekali',
            'desc_ayam_katsu': 'Ayam Katsu sedap sekali',
            'desc_mie_ayam': 'Mie Ayam sedap sekali',
            'btn_order_now': 'PESAN',
            'thanks_order': 'Terima Kasih Sudah Memesan! Selamat Menikmati!',
            'label_menu_detail': 'Detail Menu:',
            'label_regular': 'Reguler:',
            'label_jumbo': 'Jumbo:',
            'val_lvl_0': 'Lvl 0',
            'val_egg': 'Telur',
            'title_order_detail': 'Detail Pesanan',
            'label_name': 'Nama:',
            'label_table_no': 'No. Meja:',
            'label_info': 'Keterangan:',
            'val_done': 'Selesai',
            'btn_rate': 'Beri Rating',
            'title_order_summary': 'Rangkuman Pesanan',
            'title_give_rating': 'Berikan Rating Pesanan',
            'label_review_input': 'Ulasan',
            'holder_review_input': 'Masukkan ulasan Anda di sini...',
            'btn_send': 'Kirim',
            'thanks_rating_title': 'Terima Kasih atas Rating dan Ulasan yang Anda Telah Berikan',
            'title_order_history': 'Riwayat Pemesanan',
            'btn_see_detail': 'Lihat Detail',
            'title_rating_history': 'Rating Pesanan',
            'holder_review_history': 'Ulasan Anda...',
            'val_review_example': 'Mie pangsitnya enak sekali, porsinya pas!',
            'title_profile': 'Profil',
            'label_riwayat': 'Riwayat',
            'label_bahasa': 'Bahasa',
            'label_pengaturan': 'Pengaturan Akun',
            'label_keluar': 'Keluar Akun',
            'modal_logout_title': 'Konfirmasi Keluar',
            'modal_logout_message': 'Apakah Anda yakin ingin keluar dari akun ini? Anda harus login kembali nanti.',
            'modal_logout_btn': 'Keluar',  
            'title_edit_profile': 'Edit Profil',
            'holder_name': 'Nama',
            'holder_email': 'Email',
            'holder_telp': 'Nomor Telepon',
            'alert_save_local': 'Profil disimpan secara lokal!',      
            'title_pengaturan': 'Pengaturan Akun',
            'desc_logout_warning': 'Yakin mau keluar? Pas balik harus masuk akun lagi ya.',
            'label_delete_account': 'Hapus Akun',
            'desc_delete_account_warning': 'Akunmu akan dihapus secara permanen. Jadi kamu gak bisa lagi akses riwayat transaksi dan detail lainnya dari akunmu.',
            'modal_delete_confirm_msg': 'Apakah Anda yakin untuk menghapus akun ini? Semua data Anda akan dihapus permanen dari sistem.',   
            'change_password': 'Ubah Sandi', 
            'new_password_confirm' : 'Konfirmasi Sandi Baru',
        },
        'en': {
            'brand': 'EatMart',
            'nav_home': 'Home',
            'nav_history': 'History',
            'nav_profile': 'Profile',
            'title_profile': 'My Profile',
            'label_lang': 'Language',
            'label_settings': 'Account Settings',
            'label_logout': 'Logout',
            'title_change_pw': 'Change Password',
            'label_old_pw': 'Old Password',
            'label_new_pw': 'New Password',
            'btn_save': 'Save Changes',
            'holder_pw': 'Enter your password...',
            'btn_back': 'Back',
            'title_recommendation': 'Recommendation',
            'title_ongoing': 'Ongoing Orders',
            'btn_see_detail': 'See Details',
            'status_waiting': 'Waiting for Payment',
            'label_price': 'Price',
            'btn_checkout': 'Checkout Now',
            'label_total': 'Total Payment',
            'label_method': 'Payment Method',
            'btn_pay': 'Pay Now',
            'title_history': 'Order History',
            'label_date': 'Date',
            'status_done': 'Completed',
            'status_cancel': 'Cancelled',
            'holder_search': 'Search Mie Pangsit...',
            'desc_menu': 'This menu is very delicious',
            'title_detail': 'Menu Details',
            'label_desc': 'Description',
            'label_price_detail': 'Price Details',
            'label_topping': 'Toppings',
            'label_spicy_level': 'Spiciness Level',
            'label_review': 'Reviews',
            'btn_order': 'Order',
            'desc_generic': 'is one of our popular menus, favored for its savory taste and appetizing aroma.',
            'title_order_menu': 'Order Menu',
            'label_detail_menu': 'Menu Details (Topping, Level)',
            'label_note': 'Order Notes',
            'holder_detail_menu': 'Enter toppings or level...',
            'holder_note': 'Add notes for the seller...',
            'btn_pay_now': 'Pay',
            'modal_ready_pay': 'Ready to Pay?',
            'btn_yes': 'Yes',        
            'title_payment_instruction': 'Payment Instructions',
            'heading_payment_counter': 'Please complete your payment at the counter!',
            'subheading_wait_confirmation': 'Wait for payment confirmation from the seller',
            'btn_next': 'Next',   
            'holder_search_all': 'Search Food and Drinks/Shop Name',
            'label_image': 'Image',
            'label_image_short': 'Img',
            'desc_mie_pangsit': 'Very delicious Meatball Noodles',
            'desc_ayam_katsu': 'Very delicious Chicken Katsu',
            'desc_mie_ayam': 'Very delicious Chicken Noodles',
            'btn_order_now': 'ORDER',
            'thanks_order': 'Thank You for Ordering! Enjoy Your Meal!',
            'label_menu_detail': 'Menu Detail:',
            'label_regular': 'Regular:',
            'label_jumbo': 'Jumbo:',
            'val_lvl_0': 'Lvl 0',
            'val_egg': 'Egg',
            'title_order_detail': 'Order Detail',
            'label_name': 'Name:',
            'label_table_no': 'Table No:',
            'label_info': 'Information:',
            'val_done': 'Completed',
            'btn_rate': 'Rate Now',
            'title_order_summary': 'Order Summary',
            'title_give_rating': 'Rate Your Order',
            'label_review_input': 'Review',
            'holder_review_input': 'Enter your review here...',
            'btn_send': 'Submit',
            'thanks_rating_title': 'Thank You for the Rating and Review You Have Given',
            'title_order_history': 'Order History',
            'btn_see_detail': 'See Details',
            'title_rating_history': 'Order Rating',
            'holder_review_history': 'Your review...',
            'val_review_example': 'The noodles are very delicious, the portion is just right!',
            'title_profile': 'Profile',
            'label_riwayat': 'History',
            'label_bahasa': 'Language',
            'label_pengaturan': 'Account Settings',
            'label_keluar': 'Logout',
            'modal_logout_title': 'Confirm Logout',
            'modal_logout_message': 'Are you sure you want to log out? You will need to log in again later.',
            'modal_logout_btn': 'Logout',   
            'title_edit_profile': 'Edit Profile',
            'holder_name': 'Name',
            'holder_email': 'Email',
            'holder_telp': 'Phone Number',
            'alert_save_local': 'Profile saved locally!', 
            'title_pengaturan': 'Account Settings',
            'desc_logout_warning': 'Sure you want to log out? You will need to log in again later.',
            'label_delete_account': 'Delete Account',
            'desc_delete_account_warning': 'Your account will be permanently deleted. You will no longer be able to access transaction history and other details.',
            'modal_delete_confirm_msg': 'Are you sure you want to delete this account? All your data will be permanently removed from the system.', 
            'change_password': 'Change Password',      
            'new_password_confirm' : 'Confirm New Password',
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
                else if (el.tagName === 'INPUT' && (el.type === 'submit' || el.type === 'button')) {
                    el.value = translation;
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
</script>