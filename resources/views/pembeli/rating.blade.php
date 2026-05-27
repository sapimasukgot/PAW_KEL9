@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="title_give_rating">MakanMart - Berikan Rating</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .star-rating label:hover,
        .star-rating label:hover ~ label { color: #FBBF24; }
        .star-rating input:checked ~ label { color: #FBBF24; }
    </style>
</head>
<body style="background-color: #FFEDD9;">

    <form action="{{ route('pembeli-rating-store', $pesanan->pesanan_id ?? $pesanan->id) }}" method="POST" class="w-full p-6 flex flex-col min-h-screen">
        @csrf

        <input type="hidden" name="toko_id" value="{{ $pesanan->toko_id }}">

        <h1 class="text-2xl font-bold text-gray-900 mb-8" data-translate="title_order_summary">Rangkuman Pesanan</h1>

        <div class="flex flex-col md:flex-row gap-6 mb-10 w-full">
            <div class="w-full md:w-1/2 bg-white rounded-3xl p-6 shadow-sm border border-orange-100">
                <h2 class="font-bold text-gray-900 mb-4" data-translate="label_menu_detail">Detail Menu</h2>
    
                @php
                    $details = $pesanan->detail_pesanan ?? $pesanan->detailPesanan ?? $pesanan->details ?? null;
                @endphp

                @if(isset($details) && $details->count() > 0)
                    @foreach($details as $detail)
                        <div class="mb-4 pb-4 border-b border-orange-50 last:border-none last:pb-0">
                            <p class="font-bold text-orange-600 text-sm mb-2">📋 {{ $detail->menu->nama_menu ?? 'Menu Pilihan' }}</p>
                
                            <div class="space-y-3">
                                @if($detail->harga_satuan == ($detail->menu->harga ?? 0))
                                    <div class="flex items-center gap-4">
                                        <span class="w-24 text-xs font-bold text-gray-600" data-translate="label_regular">Reguler:</span>
                                        <span class="bg-gray-200 px-4 py-0.5 rounded-lg text-xs font-bold">
                                            {{ $detail->jumlah ?? 0 }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="w-24 text-xs font-bold text-gray-400" data-translate="label_jumbo">Jumbo:</span>
                                        <span class="bg-gray-100 px-4 py-0.5 rounded-lg text-xs text-gray-400">0</span>
                                    </div>
                                @else
                                    <div class="flex items-center gap-4">
                                        <span class="w-24 text-xs font-bold text-gray-400" data-translate="label_regular">Reguler:</span>
                                        <span class="bg-gray-100 px-4 py-0.5 rounded-lg text-xs text-gray-400">0</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="w-24 text-xs font-bold text-gray-600" data-translate="label_jumbo">Jumbo:</span>
                                        <span class="bg-gray-200 px-4 py-0.5 rounded-lg text-xs font-bold">
                                            {{ $detail->jumlah ?? 0 }}
                                        </span>
                                    </div>
                                @endif

                                <div class="flex items-center gap-4">
                                    <span class="w-24 text-xs font-bold text-gray-600" data-translate="label_topping">Topping:</span>
                                    <span class="bg-gray-200 px-4 py-0.5 rounded-lg text-xs font-bold">
                                        {{ $detail->toping ?? $detail->topping ?? '-' }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <span class="w-24 text-xs font-bold text-gray-600" data-translate="label_spicy_level">Level Pedas:</span>
                                    <span class="bg-gray-200 px-4 py-0.5 rounded-lg text-xs font-bold">
                                        {{ $detail->pedas ?? $detail->level_pedas ?? '-' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="mb-4 pb-4">
                        <p class="font-bold text-orange-600 text-sm mb-2">📋 {{ $pesanan->menu->nama_menu ?? 'Menu Makanan' }}</p>
                        <div class="space-y-3">
                            <div class="flex items-center gap-4">
                                <span class="w-24 text-xs font-bold text-gray-600">Reguler:</span>
                                <span class="bg-gray-200 px-4 py-0.5 rounded-lg text-xs font-bold">
                                    {{ $pesanan->jumlah ?? 1 }}
                                </span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="w-24 text-xs font-bold text-gray-600">Jumbo:</span>
                                <span class="bg-gray-200 px-4 py-0.5 rounded-lg text-xs font-bold">0</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="w-24 text-xs font-bold text-gray-600">Topping:</span>
                                <span class="bg-gray-200 px-4 py-0.5 rounded-lg text-xs font-bold">
                                    {{ $pesanan->toping ?? $pesanan->topping ?? '-' }}
                                </span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="w-24 text-xs font-bold text-gray-600">Level Pedas:</span>
                                <span class="bg-gray-200 px-4 py-0.5 rounded-lg text-xs font-bold">
                                    {{ $pesanan->pedas ?? $pesanan->level_pedas ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="w-full md:w-1/2 bg-white rounded-3xl p-6 shadow-sm border border-orange-100 flex flex-col justify-center">
                <div class="space-y-3">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_name">Nama:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm">{{ $pesanan->nama_pembeli ?? 'Pelanggan' }}</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_table_no">No. Meja:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm">{{ $pesanan->no_meja ?? '-' }}</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_price">Harga:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-bold text-orange-600">
                            Rp {{ number_format($pesanan->harga_total ?? $pesanan->total_harga ?? 0, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-sm font-bold" data-translate="label_info">Keterangan:</span>
                        <span class="bg-gray-200 px-6 py-1 rounded-lg text-sm font-medium text-gray-600 italic">
                            "{{ $pesanan->keterangan ?? '-' }}"
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col items-center space-y-4 mb-10">
            <h2 class="text-xl font-bold text-gray-900" data-translate="title_give_rating">Berikan Rating Pesanan</h2>
            
            <div class="flex flex-row-reverse justify-center gap-2 star-rating">
                <input type="radio" id="star5" name="nilai" value="5" class="hidden" required />
                <label for="star5" class="cursor-pointer text-4xl text-gray-300">★</label>
                <input type="radio" id="star4" name="nilai" value="4" class="hidden" />
                <label for="star4" class="cursor-pointer text-4xl text-gray-300">★</label>
                <input type="radio" id="star3" name="nilai" value="3" class="hidden" />
                <label for="star3" class="cursor-pointer text-4xl text-gray-300">★</label>
                <input type="radio" id="star2" name="nilai" value="2" class="hidden" />
                <label for="star2" class="cursor-pointer text-4xl text-gray-300">★</label>
                <input type="radio" id="star1" name="nilai" value="1" class="hidden" />
                <label for="star1" class="cursor-pointer text-4xl text-gray-300">★</label>
            </div>

            <div class="w-full mt-6">
                <label class="block text-lg font-bold text-gray-900 mb-2" data-translate="label_review_input">Ulasan</label>
                <textarea 
                    name="ulasan"
                    data-translate="holder_review_input"
                    class="w-full h-32 p-4 rounded-2xl border border-orange-100 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-300"
                    placeholder="Masukkan ulasan Anda di sini..."
                ></textarea>
            </div>
        </div>

        <div class="w-full flex justify-between items-center mb-10">
            <a href="{{ route('pembeli-beranda') }}" class="bg-white border border-gray-300 text-gray-700 px-16 py-2 rounded-xl font-bold hover:bg-gray-100 transition-all text-center shadow-sm" data-translate="btn_back">
                Kembali
            </a>
            <button type="submit" class="bg-orange-500 text-white px-16 py-2 rounded-xl font-bold hover:bg-orange-600 transition-all shadow-md" data-translate="btn_send">
                Kirim Ulasan
            </button>
        </div>
    </form>
</body>
</html>