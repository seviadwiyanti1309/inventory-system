@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('categories.index') }}" class="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1 transition duration-150">
            ← Kembali ke Daftar Kategori
        </a>
        <h1 class="text-2xl font-bold text-gray-800 mt-2">Tambah Kategori Baru</h1>
        <p class="text-gray-500 text-sm italic mt-1">Gunakan kategori untuk mengelompokkan barang-barang Anda agar lebih terorganisir.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                {{-- Nama Kategori --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        placeholder="Contoh: Elektronik, Perabot, ATK..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50 @error('name') border-rose-500 @enderror">
                    @error('name') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="pt-6 flex items-center gap-4">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 transition duration-200 transform hover:-translate-y-0.5 active:scale-95">
                        Simpan Kategori
                    </button>
                    <a href="{{ route('categories.index') }}" 
                        class="px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition duration-200">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection