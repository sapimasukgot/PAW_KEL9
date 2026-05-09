@include('pembeli.nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="title_payment_instruction">Instruksi Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;">

    <div class="max-w-md mx-auto p-6">
        <div class="flex justify-center mb-10 mt-4">
            <div class="w-72 h-72 bg-[#D9D9D9] rounded-3xl flex items-center justify-center">
                <span class="text-gray-500 font-medium text-center px-6">Gambar</span>
            </div>
        </div>

        <div class="text-center space-y-3 mb-12">
            <h2 class="text-xl font-bold text-gray-900" data-translate="heading_payment_counter">Silahkan lakukan pembayaran di counter!</h2>
            <p class="text-base text-gray-700 font-medium" data-translate="subheading_wait_confirmation">Tunggu konfirmasi pembayaran dari penjual</p>
        </div>

        <div class="flex justify-end mt-10">
            <a href="{{ route('pembeli-ongoing') }}" 
               style="background-color: #D9D9D9;" 
               class="text-black px-12 py-2 rounded-lg font-bold shadow-sm active:opacity-70 transition-opacity"
               data-translate="btn_next">
               Selanjutnya
            </a>
        </div>
    </div>
</body>
</html>