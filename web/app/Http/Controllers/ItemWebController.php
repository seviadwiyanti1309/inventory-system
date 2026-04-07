<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Services\CategoryService;
use App\Services\ItemService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ItemWebController extends Controller
{
    private ItemService $itemService;
    private CategoryService $categoryService;

    public function __construct(ItemService $itemService, CategoryService $categoryService)
    {
        $this->itemService = $itemService;
        $this->categoryService = $categoryService;
    }

    public function index(): View
    {
        $items = $this->itemService->getPaginated();
        return view('items.index', compact('items'));
    }

    public function create(): View
    {
        $categories = $this->categoryService->getAll();
        return view('items.create', compact('categories'));
    }

    public function store(StoreItemRequest $request): RedirectResponse
    {
        $this->itemService->create($request->validated());

        return redirect()->route('items.index')
            ->with('success', 'Item berhasil ditambahkan!');
    }

    public function edit(Item $item): View
    {
        $categories = $this->categoryService->getAll();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(UpdateItemRequest $request, Item $item): RedirectResponse
    {
        $this->itemService->update($item, $request->validated());

        return redirect()->route('items.index')
            ->with('success', 'Item berhasil diupdate!');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $this->itemService->delete($item);

        return redirect()->route('items.index')
            ->with('success', 'Item berhasil dihapus!');
    }
}