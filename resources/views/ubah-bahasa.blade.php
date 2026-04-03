@extends('layout-penjual')

@section('content')
<div class="max-w-2xl mx-auto flex flex-col h-[calc(100vh-180px)]">
    <h2 class="text-2xl font-bold text-center mb-10 tracking-wide text-black">Ubah Bahasa</h2>

    <div class="flex-grow space-y-4">
        <div class="bg-white p-5 rounded-2xl shadow-sm flex items-center justify-between border-2 border-transparent hover:border-[#7A5C2D] transition cursor-pointer">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span class="font-bold text-lg text-black">Bahasa Indonesia (ID)</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm flex items-center justify-between border-2 border-transparent hover:border-[#7A5C2D] transition cursor-pointer">
            <div class="flex items-center gap-3 pl-9"> 
                <span class="font-bold text-lg text-black">English (EN)</span>
            </div>
        </div>
    </div>

    <div class="flex justify-end py-10">
        <a href="{{ route('profil-penjual') }}" 
           class="bg-[#CBD5E1] px-10 py-2 rounded-lg font-bold text-sm shadow-sm hover:bg-gray-300 transition text-black">
            Kembali
        </a>
    </div>
</div>
@endsection