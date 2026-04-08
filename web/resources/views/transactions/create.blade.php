@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('transactions.index') }}" class="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1 transition duration-150">
            ← Back to History
        </a>
        <h1 class="text-2xl font-bold text-gray-800 mt-2">Record New Transaction</h1>
        <p class="text-gray-500 text-sm italic mt-1">Stok akan diperbarui secara otomatis setelah transaksi disimpan.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                {{-- Item Selection --}}
                <div>
                    <label for="item_id" class="block text-sm font-semibold text-gray-700 mb-2">Item</label>
                    <select name="item_id" id="item_id" required 
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50">
                        <option value="">Select an Item</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }} (Current Stock: {{ $item->stock }} {{ $item->unit }})
                            </option>
                        @endforeach
                    </select>
                    @error('item_id') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    {{-- Transaction Type --}}
                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Transaction Type</label>
                        <select name="type" id="type" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50">
                            <option value="in" {{ old('type') == 'in' ? 'selected' : '' }}>Stock In (+)</option>
                            <option value="out" {{ old('type') == 'out' ? 'selected' : '' }}>Stock Out (-)</option>
                        </select>
                        @error('type') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                    </div>

                    {{-- Quantity --}}
                    <div>
                        <label for="quantity" class="block text-sm font-semibold text-gray-700 mb-2">Quantity</label>
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}" min="1" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50">
                        @error('quantity') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Reference --}}
                <div>
                    <label for="reference" class="block text-sm font-semibold text-gray-700 mb-2">Reference (PO / Invoice #)</label>
                    <input type="text" name="reference" id="reference" value="{{ old('reference') }}" placeholder="TRX-12345"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50">
                    @error('reference') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Notes --}}
                <div>
                    <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Notes</label>
                    <textarea name="notes" id="notes" rows="3" placeholder="Alasan pengurangan stok atau detail tambahan lainnya..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200 bg-gray-50/50">{{ old('notes') }}</textarea>
                    @error('notes') <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 transition duration-200 transform hover:-translate-y-0.5 active:scale-95">
                        Save Transaction
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
