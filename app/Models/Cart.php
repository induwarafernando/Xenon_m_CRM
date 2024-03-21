<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = [
        'item_count',
        'sub_total',
        'total_discount',
        'total',
        'total_tax',
        'is_paid',
    ];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
