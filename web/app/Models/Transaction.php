<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'quantity',
        'type',
        'reference',
        'notes'
    ];

    protected static function booted()
    {
        static::created(function ($transaction) {
            $item = $transaction->item;
            
            if ($transaction->type === 'in') {
                $item->increment('stock', $transaction->quantity);
            } elseif ($transaction->type === 'out') {
                $item->decrement('stock', $transaction->quantity);
            }
        });
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
