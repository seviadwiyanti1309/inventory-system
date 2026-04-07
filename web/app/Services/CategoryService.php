<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\SupportCollection;

class CategoryService
{
    /**
     * Get all categories with item count, paginated.
     */
    public function getPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Category::withCount('items')->latest()->paginate($perPage);
    }

    /**
     * Get all categories with item count.
     */
    public function getAll()
    {
        return Category::withCount('items')->get();
    }

    /**
     * Create a new category.
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * Update an existing category.
     */
    public function update(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    /**
     * Delete a category.
     */
    public function delete(Category $category): ?bool
    {
        return $category->delete();
    }
}
