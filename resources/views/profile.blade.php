@extends('layout-admin')

@section('content')
    <h2 class="text-2xl md:text-3xl font-bold text-black text-center mb-10">Profil Admin</h2>

    <div class="w-full space-y-4">
        <div class="w-full bg-white rounded-3xl p-6 shadow-sm border border-orange-100 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center overflow-hidden shadow-inner">
                    <span class="text-white font-bold text-3xl">A</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Admin MakanMart</h3>
                    <p class="text-gray-500 text-sm">admin@makanmart.com</p>
                </div>
            </div>

            <a href="{{ route('ubah-profil-admin') }}" class="p-3 bg-gray-100 rounded-full hover:bg-orange-100 transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </a>
        </div>

        <a href="{{ route('ubah-bahasa-admin') }}" class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center justify-between hover:bg-orange-50 transition-all group">
            <div class="flex items-center gap-4">
                <span class="text-xl">🌐</span> 
                <span class="font-bold text-gray-800">Bahasa</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <a href="{{ route('pengaturan-akun-admin') }}" class="w-full bg-white rounded-3xl p-5 shadow-sm border border-orange-100 flex items-center justify-between hover:bg-orange-50 transition-all group">
            <div class="flex items-center gap-4">
                <span class="text-xl">🔒</span> 
                <span class="font-bold text-gray-800">Pengaturan Akun</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

<div class="mt-auto pt-16 flex justify-center">
    <button onclick="document.getElementById('logout-form').submit()" 
            class="w-full bg-white p-4 rounded-2xl shadow-sm flex justify-center items-center gap-2 hover:bg-red-50 transition group">
        <span class="text-red-500">🚪</span>
        <span class="font-bold text-gray-800">Keluar Akun Admin</span>
    </button>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection

@push('scripts')
<script>
    function handleAdminLogout() {
        showCustomModal({
            title: 'Keluar Dashboard Admin?',
            message: 'Apakah Anda yakin ingin mengakhiri sesi administrasi?',
            actionText: 'Keluar Sekarang',
            actionUrl: "{{ route('login') }}"
        });
    }
</script>
@endpush