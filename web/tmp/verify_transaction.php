<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Contracts\Console\Kernel;

$app->make(Kernel::class)->bootstrap();

$item = Item::first();
if (!$item) {
    echo "No items found to test.\n";
    exit(1);
}

$initialStock = $item->stock;
echo "Initial Stock: $initialStock\n";

$transaction = Transaction::create([
    'item_id' => $item->id,
    'quantity' => 1,
    'type' => 'out',
    'notes' => 'Test stock out'
]);

$item->refresh();
$newStock = $item->stock;
echo "New Stock after 'out' transaction of 1: $newStock\n";

if ($newStock === $initialStock - 1) {
    echo "Success: Stock decreased correctly.\n";
} else {
    echo "Failure: Stock did not decrease correctly.\n";
}

$transactionIn = Transaction::create([
    'item_id' => $item->id,
    'quantity' => 5,
    'type' => 'in',
    'notes' => 'Test stock in'
]);

$item->refresh();
$finalStock = $item->stock;
echo "Final Stock after 'in' transaction of 5: $finalStock\n";

if ($finalStock === $newStock + 5) {
    echo "Success: Stock increased correctly.\n";
} else {
    echo "Failure: Stock did not increase correctly.\n";
}
