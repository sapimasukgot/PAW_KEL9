@include('pembeli.nav')

<div class="p-6">
    <h2 class="text-center font-bold text-xl mb-10">Ubah Sandi</h2>

    <form action="{{ route('pembeli-password-update') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label class="font-bold">Password Lama:</label>
            <input type="password" name="password_lama" class="w-full p-3 rounded-xl shadow-sm border-none">
            @error('password_lama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="font-bold">Password Baru:</label>
            <input type="password" name="password_baru" class="w-full p-3 rounded-xl shadow-sm border-none">
            @error('password_baru') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="font-bold">Konfirmasi Password:</label>
            <input type="password" name="password_baru_confirmation" class="w-full p-3 rounded-xl shadow-sm border-none">
        </div>

        <div class="flex justify-between mt-10">
            <a href="{{ route('pembeli-pengaturan') }}" class="bg-gray-300 px-10 py-2 rounded-lg font-bold">Kembali</a>
            <button type="submit" class="bg-gray-300 px-10 py-2 rounded-lg font-bold">Simpan</button>
        </div>
    </form>
</div>