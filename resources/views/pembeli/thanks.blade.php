<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex items-center justify-center min-h-screen p-6 text-center">
    <div>
        <span class="text-6xl block mb-6">❤️</span>
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Terima Kasih!</h2>
        <p class="text-gray-500 mb-8 max-w-xs mx-auto">Ulasan Anda sangat berarti bagi perkembangan Kantin FILKOM.</p>
        <a href="{{ route('pembeli-beranda') }}" class="px-10 py-3 bg-gray-900 text-white rounded-full font-bold">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>