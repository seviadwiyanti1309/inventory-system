@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Items Inventori</h1>
    <a href="{{ route('items.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Item
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-6 py-3 text-left">#</th>
                <th class="px-6 py-3 text-left">Nama Item</th>
                <th class="px-6 py-3 text-left">Category</th>
                <th class="px-6 py-3 text-left">Stok</th>
                <th class="px-6 py-3 text-left">Harga</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($items as $item)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-gray-500">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-800">{{ $item->name }}</div>
                    @if($item->description)
                        <div class="text-gray-400 text-xs truncate max-w-xs">{{ $item->description }}</div>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs font-medium">
                        {{ $item->category->name }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <span class="{{ $item->stock <= 5 ? 'text-red-600 font-bold' : 'text-gray-700' }}">
                        {{ $item->stock }} {{ $item->unit }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-700">
                    Rp {{ number_format($item->price, 0, ',', '.') }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{ route('items.edit', $item->id) }}"
                       class="text-blue-600 hover:underline mr-3">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}"
                          method="POST" class="inline"
                          onsubmit="return confirm('Yakin hapus item ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                    Belum ada item. <a href="{{ route('items.create') }}" class="text-blue-600 hover:underline">Tambah sekarang</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $items->links() }}</div>
@endsection