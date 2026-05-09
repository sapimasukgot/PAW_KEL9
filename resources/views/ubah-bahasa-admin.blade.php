@extends('layout-admin')

@section('content')
<div class="w-full p-6 flex flex-col min-h-[80vh]">
    <h1 class="text-2xl font-bold text-gray-900 text-center mb-10">Ubah Bahasa</h1>

    <div class="w-full space-y-4">
        <div class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center justify-between cursor-pointer hover:bg-orange-50 transition-all">
            <span class="text-gray-800 font-bold text-base ml-2">Bahasa Indonesia (ID)</span>
            <div class="text-green-600 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <div class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center cursor-pointer hover:bg-orange-50 transition-all">
            <span class="text-gray-800 font-bold text-base ml-2">English (EN)</span>
        </div>
    </div>

    <div class="mt-auto pt-12">
        <a href="{{ route('profile') }}" class="bg-[#d1d5db] text-gray-900 px-16 py-2.5 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm inline-block">
            Kembali
        </a>
    </div>
</div>
@endsection