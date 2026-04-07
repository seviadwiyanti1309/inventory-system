<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemService
{
    /**
     * Get all items with category, paginated.
     */
    public function getPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Item::with('category')->latest()->paginate($perPage);
    }

    /**
     * Get all items with category.
     */
    public function getAll()
    {
        return Item::with('category')->get();
    }

    /**
     * Create a new item.
     */
    public function create(array $data): Item
    {
        return Item::create($data);
    }

    /**
     * Update an existing item.
     */
    public function update(Item $item, array $data): bool
    {
        return $item->update($data);
    }

    /**
     * Delete an item.
     */
    public function delete(Item $item): ?bool
    {
        return $item->delete();
    }
}
