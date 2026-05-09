@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="title_order_summary">MakanMart - Detail Riwayat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .star-filled { color: #FBBF24; }
    </style>
</head>
<body style="background-color: #FFEDD9;">

    <div class="w-full p-6 flex flex-col min-h-screen">
        
        <h1 class="text-2xl font-bold text-gray-900 mb-8" data-translate="title_order_summary">Rangkuman Pesanan</h1>

        <div class="flex flex-row gap-6 mb-10 w-full">
            <div class="w-1/2 bg-white rounded-3xl p-6 shadow-sm border border-orange-100">
                <h2 class="font-bold text-gray-900 mb-4" data-translate="label_menu_detail">Detail Menu</h2>
                <div class="space-y-3">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_regular">Reguler:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm">1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_jumbo">Jumbo:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm">1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_topping">Topping:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm" data-translate="val_egg">Telur</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_spicy_level">Level Pedas:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm" data-translate="val_lvl_0">Lvl 0</span>
                    </div>
                </div>
            </div>

            <div class="w-1/2 bg-white rounded-3xl p-6 shadow-sm border border-orange-100">
                <div class="space-y-3 mt-8">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_name">Nama:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm">Aan</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_table_no">No. Meja:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm">1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_price">Harga:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold">Rp32.000</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_info">Keterangan:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold text-gray-600 italic" data-translate="val_done">Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col items-center space-y-4 mb-10">
            <h2 class="text-xl font-bold text-gray-900" data-translate="title_rating_history">Rating Pesanan</h2>
            
            <div class="flex justify-center gap-2 text-4xl">
                <span class="star-filled">★</span>
                <span class="star-filled">★</span>
                <span class="star-filled">★</span>
                <span class="star-filled">★</span>
                <span class="star-filled">★</span>
            </div>

            <div class="w-full mt-6">
                <label class="block text-lg font-bold text-gray-900 mb-2" data-translate="label_review">Ulasan</label>
                <textarea 
                    class="w-full h-32 p-4 rounded-2xl border border-orange-100 shadow-sm bg-white focus:outline-none"
                    data-translate="val_review_example"
                    placeholder="Ulasan Anda..."
                    readonly
                >Mie pangsitnya enak sekali, porsinya pas!</textarea>
            </div>
        </div>

        <div class="w-full flex justify-start items-center mb-10">
            <a href="{{ route('pembeli-riwayat') }}" class="bg-[#D9D9D9] text-gray-900 px-16 py-2 rounded-md font-bold hover:bg-gray-400 transition-all" data-translate="btn_back">
                Kembali
            </a>
        </div>
    </div>
</body>
</html>