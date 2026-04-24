<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanMart - Terima Kasih</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #FFEDD9;">
    @include('pembeli.nav')

    <div class="min-h-[80vh] flex flex-col items-center justify-center p-6">
        
        <div class="max-w-xl w-full flex flex-col">
            
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 text-center leading-relaxed">
                Terima Kasih atas Rating dan Ulasan yang<br>Anda Telah Berikan
            </h1>

            <div class="mt-10 flex justify-end">
                <a href="{{ route('pembeli-beranda') }}" class="bg-[#D9D9D9] text-gray-900 px-12 py-2 rounded-md font-bold hover:bg-gray-400 transition-all">
                    Kembali
                </a>
            </div>
        </div>

    </div>
</body>
</html>