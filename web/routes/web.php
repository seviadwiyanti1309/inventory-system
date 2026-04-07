<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryWebController;
use App\Http\Controllers\ItemWebController;

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::resource('categories', CategoryWebController::class)->except(['show']);
Route::resource('items', ItemWebController::class)->except(['show']);