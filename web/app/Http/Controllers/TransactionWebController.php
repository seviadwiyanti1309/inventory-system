<?php

namespace App\Http\Controllers;
 
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionWebController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('item')->latest()->paginate(20);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $items = Item::orderBy('name')->get();
        return view('transactions.create', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'type'    => 'required|in:in,out',
            'reference' => 'nullable|string|max:255',
            'notes'   => 'nullable|string'
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction recorded successfully!');
    }
}
