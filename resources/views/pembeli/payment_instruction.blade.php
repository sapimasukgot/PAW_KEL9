<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruksi Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-md mx-auto p-6">
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('pembeli-ongoing') }}" class="p-2 bg-white rounded-full shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-xl font-bold">Pembayaran</h1>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm mb-6 text-center">
            <p class="text-gray-500 mb-2">Total Pembayaran</p>
            <h2 class="text-3xl font-extrabold text-orange-500">Rp32.000</h2>
        </div>

        <div class="bg-orange-50 border border-orange-100 p-4 rounded-xl mb-8">
            <p class="text-xs text-orange-600 font-bold uppercase tracking-wider mb-1">Nomor Virtual Account (OVO/Dana)</p>
            <p class="text-lg font-mono font-bold text-gray-800">0812 3456 7890</p>
        </div>

        <a href="{{ route('pembeli-summary') }}" class="block w-full bg-orange-500 text-white text-center py-4 rounded-xl font-bold shadow-lg shadow-orange-200">
            KONFIRMASI PEMBAYARAN
        </a>
    </div>
</body>
</html>