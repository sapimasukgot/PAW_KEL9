<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">
    <div class="max-w-md w-full bg-white rounded-3xl p-8 shadow-sm text-center">
        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl">✓</div>
        <h2 class="text-2xl font-bold mb-2 text-gray-800">Pesanan Selesai!</h2>
        <p class="text-gray-500 mb-8">Terima kasih telah berbelanja.</p>

        <div class="border-t border-dashed border-gray-200 pt-6 mb-8 text-left space-y-4">
            <div class="flex justify-between">
                <span class="text-gray-400">Total Pembayaran</span>
                <span class="font-bold">Rp32.000</span>
            </div>
        </div>

        <a href="{{ route('pembeli-rating', ['id' => 1]) }}" class="block w-full bg-orange-500 text-white py-4 rounded-xl font-bold transition">
            Beri Rating
        </a>
    </div>
</body>
</html>