@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Transaction History</h1>
    <a href="{{ route('transactions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
        + Record Transaction
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-sm uppercase font-semibold">
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4">Item Name</th>
                <th class="px-6 py-4 text-center">Type</th>
                <th class="px-6 py-4 text-right">Quantity</th>
                <th class="px-6 py-4">Reference</th>
                <th class="px-6 py-4">Notes</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($transactions as $transaction)
                <tr class="hover:bg-blue-50/30 transition duration-150">
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $transaction->created_at->format('d M Y, H:i') }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-medium text-gray-800">{{ $transaction->item->name }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($transaction->type === 'in')
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase">
                                Stock In
                            </span>
                        @else
                            <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-xs font-bold uppercase">
                                Stock Out
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right font-semibold {{ $transaction->type === 'in' ? 'text-green-600' : 'text-rose-600' }}">
                        {{ $transaction->type === 'in' ? '+' : '-' }}{{ $transaction->quantity }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $transaction->reference ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $transaction->notes ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                        No transactions found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($transactions->hasPages())
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
            {{ $transactions->links() }}
        </div>
    @endif
</div>
@endsection
