@extends('layout-admin')

@section('content')
    <main class="p-4 md:p-8 max-w-5xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-bold text-black text-center mb-10" data-translate="title_edit_profile">Ubah Profil</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-xl text-sm font-semibold mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-xl text-xs mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin-update-profil') }}" method="POST">
            @csrf
            <div class="w-full bg-white rounded-[2.5rem] p-8 shadow-sm border border-orange-100 space-y-6">
                
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 ml-4" data-translate="label_full_name">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required
                        class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 ml-4" data-translate="label_email">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                        class="w-full bg-[#FAF4E9] rounded-full px-6 py-3.5 text-sm outline-none focus:ring-2 ring-orange-200 transition-all shadow-inner">
                </div>
            </div>

            <div class="flex justify-between items-center px-2 pt-4">
                <a href="{{ route('profile') }}" 
                    class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm" 
                    data-translate="btn_back">
                    Kembali
                </a>
                
                <button type="submit" 
                    class="bg-[#d1d5db] text-gray-900 px-12 py-3 rounded-xl font-bold hover:bg-gray-400 transition-all shadow-sm" 
                    data-translate="btn_save">
                    Simpan
                </button>
            </div>
        </form>
    </main>
@endsection