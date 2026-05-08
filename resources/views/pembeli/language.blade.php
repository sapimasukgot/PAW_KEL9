@include('pembeli.nav')
<body class="bg-[#FFEDD9] p-6">
    <h1 class="text-2xl font-bold text-center mb-10">Ubah Bahasa</h1>
    <div class="space-y-4">
        <button onclick="setLang('id')" class="w-full bg-white p-6 rounded-3xl shadow-sm border flex justify-between font-bold">
            Bahasa Indonesia (ID) <span id="check-id"></span>
        </button>
        <button onclick="setLang('en')" class="w-full bg-white p-6 rounded-3xl shadow-sm border flex justify-between font-bold">
            English (EN) <span id="check-en"></span>
        </button>
    </div>
    <script>
    function setLang(lang) {
        localStorage.setItem('app_lang', lang);
        location.reload(); 
    }
    </script>
</body>