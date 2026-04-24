<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Rating</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Style untuk rating bintang tanpa JS */
        .star-rating input:checked ~ label { color: #fb923c; }
        .star-rating label:hover, .star-rating label:hover ~ label { color: #fb923c; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="max-w-md mx-auto p-6 min-h-screen flex flex-col justify-center text-center">
        <h2 class="text-2xl font-bold mb-2">Bagaimana makanannya?</h2>
        <p class="text-gray-500 mb-8">Berikan ulasan Anda</p>

        <form action="{{ route('pembeli-rating-simpan') }}" method="POST">
            @csrf
            <div class="star-rating flex flex-row-reverse justify-center gap-2 mb-8">
                <input type="radio" id="star5" name="rating" value="5" class="hidden" required>
                <label for="star5" class="text-4xl text-gray-300 cursor-pointer">★</label>
                <input type="radio" id="star4" name="rating" value="4" class="hidden">
                <label for="star4" class="text-4xl text-gray-300 cursor-pointer">★</label>
                <input type="radio" id="star3" name="rating" value="3" class="hidden">
                <label for="star3" class="text-4xl text-gray-300 cursor-pointer">★</label>
                <input type="radio" id="star2" name="rating" value="2" class="hidden">
                <label for="star2" class="text-4xl text-gray-300 cursor-pointer">★</label>
                <input type="radio" id="star1" name="rating" value="1" class="hidden">
                <label for="star1" class="text-4xl text-gray-300 cursor-pointer">★</label>
            </div>

            <textarea class="w-full p-4 rounded-2xl border border-gray-200 mb-6" rows="4" placeholder="Tulis pendapatmu..."></textarea>

            <button type="submit" class="w-full bg-orange-500 text-white py-4 rounded-xl font-bold">
                Kirim Ulasan
            </button>
        </form>
    </div>
</body>
</html>