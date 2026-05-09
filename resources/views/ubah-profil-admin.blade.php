@extends('layout-admin')

@section('content')
<main class="p-4 md:p-8 max-w-5xl mx-auto">
    <h2 class="text-2xl md:text-3xl font-bold text-black text-center mb-10">Ubah Profil</h2>

    <form action="#" method="POST">
        @csrf
        <div class="w-full bg-white rounded-[2.5rem] p-8 shadow-sm border border-orange-100 space-y-6">
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 ml-4">Nama Lengkap</label>
                <input type="text" name="nama" value="Admin MakanMart" 
                    class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 ml-4">Alamat Email</label>
                <input type="email" name="email" value="admin@makanmart.com" 
                    class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 ml-4">Nomor Telepon</label>
                <input type="text" name="telepon" value="081234567890" 
                    class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
            </div>
        </div>

        <div class="flex justify-between items-center px-2 pt-4">
            <a href="{{ route('profile') }}" 
                class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm">
                Kembali
            </a>
            
            <button type="submit" 
                class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm">
                Simpan
            </button>
        </div>
    </form>
</main>
@endsection