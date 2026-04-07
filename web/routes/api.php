<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;

Route::apiResource('categories', CategoryController::class)->names([
    'index' => 'api.categories.index',
    'store' => 'api.categories.store',
    'show' => 'api.categories.show',
    'update' => 'api.categories.update',
    'destroy' => 'api.categories.destroy',
]);
Route::apiResource('items', ItemController::class)->names([
    'index' => 'api.items.index',
    'store' => 'api.items.store',
    'show' => 'api.items.show',
    'update' => 'api.items.update',
    'destroy' => 'api.items.destroy',
]);