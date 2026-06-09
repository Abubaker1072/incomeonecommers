<?php

namespace App\Models;

use App\Enums\FulfillmentStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'order_id',
    'product_id',
    'vendor_id',
    'name_snapshot',
    'price_snapshot',
    'quantity',
    'line_total',
    'fulfillment_status',
])]
class OrderItem extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'fulfillment_status' => FulfillmentStatus::class,
            'price_snapshot' => 'decimal:2',
            'line_total' => 'decimal:2',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
}
