<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemController extends Controller
{
    private ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(): AnonymousResourceCollection
    {
        return ItemResource::collection($this->itemService->getAll());
    }

    public function store(StoreItemRequest $request): JsonResponse
    {
        $item = $this->itemService->create($request->validated());

        return (new ItemResource($item->load('category')))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Item $item): ItemResource
    {
        return new ItemResource($item->load('category'));
    }

    public function update(UpdateItemRequest $request, Item $item): ItemResource
    {
        $this->itemService->update($item, $request->validated());

        return new ItemResource($item->load('category'));
    }

    public function destroy(Item $item): JsonResponse
    {
        $this->itemService->delete($item);

        return response()->noContent();
    }
}