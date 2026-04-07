@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-gray-600">← Kembali</a>
        <h1 class="text-2xl font-bold text-gray-800">Tambah Category</h1>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Category</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                       placeholder="Contoh: Elektronik">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
                <a href="{{ route('categories.index') }}"
                   class="bg-gray-100 text-gray-700 px-6 py-2 rounded hover:bg-gray-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection