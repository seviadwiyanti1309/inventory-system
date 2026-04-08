@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('items.index') }}" class="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1 transition duration-150">
            ← Kembali ke Daftar Item
        </a>
        <h1 class="text-2xl font-bold text-gray-800 mt-2">Edit Item: {{ $item->name }}</h1>
        <p class="text-gray-500 text-sm italic mt-1">Perbarui informasi barang di bawah ini.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                {{-- Nama Item --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Item</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}" required
                        placeholder="Contoh: Laptop ASUS Vivobook"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50 @error('name') border-rose-500 @enderror">
                    @error('name') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Category --}}
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                    <select name="category_id" id="category_id" required 
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50 @error('category_id') border-rose-500 @enderror">
                        <option value="">Pilih Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    {{-- Stok (Read Only - Harusnya via Transaksi) --}}
                    <div>
                        <label for="stock" class="block text-sm font-semibold text-gray-700 mb-2">Stok (Saat ini)</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $item->stock) }}" min="0" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-100 cursor-not-allowed @error('stock') border-rose-500 @enderror" readonly>
                        <p class="text-xs text-gray-400 mt-2 italic">* Stok diperbarui melalui modul transaksi.</p>
                        @error('stock') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                    </div>

                    {{-- Satuan --}}
                    <div>
                        <label for="unit" class="block text-sm font-semibold text-gray-700 mb-2">Satuan</label>
                        <input type="text" name="unit" id="unit" value="{{ old('unit', $item->unit) }}" required
                            placeholder="pcs, kg, liter..."
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50">
                    </div>
                </div>

                {{-- Harga --}}
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Harga (Rp)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-gray-400 font-medium">Rp</span>
                        <input type="number" name="price" id="price" value="{{ old('price', (int)$item->price) }}" min="0" step="100" required
                            placeholder="0"
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50 @error('price') border-rose-500 @enderror">
                    </div>
                    @error('price') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi (Opsional)</label>
                    <textarea name="description" id="description" rows="3" placeholder="Tambahkan informasi detail mengenai barang ini..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50">{{ old('description', $item->description) }}</textarea>
                </div>

                <div class="pt-6 flex items-center gap-4">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 transition duration-200 transform hover:-translate-y-0.5 active:scale-95">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('items.index') }}" 
                        class="px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition duration-200">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection