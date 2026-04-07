@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Categories</h1>
    <a href="{{ route('categories.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Category
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-6 py-3 text-left">#</th>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Jumlah Item</th>
                <th class="px-6 py-3 text-left">Dibuat</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($categories as $category)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-gray-500">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 font-medium text-gray-800">{{ $category->name }}</td>
                <td class="px-6 py-4">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-medium">
                        {{ $category->items_count }} item
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-500">{{ $category->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4 text-center">
                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="text-blue-600 hover:underline mr-3">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}"
                          method="POST" class="inline"
                          onsubmit="return confirm('Yakin hapus category ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                    Belum ada category. <a href="{{ route('categories.create') }}" class="text-blue-600 hover:underline">Tambah sekarang</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $categories->links() }}</div>
@endsection