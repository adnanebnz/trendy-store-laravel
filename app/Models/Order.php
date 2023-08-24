<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'products',
        'total_price',
        'status',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getTotalPriceAttribute(): int
    {
        return array_reduce($this->products, function ($carry, $product) {
            return $carry + $product['price'];
        }, 0);
    }

    public function getProductsAttribute(): array
    {
        return array_map(function ($product) {
            return [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
            ];
        }, json_decode($this->attributes['products'], true));
    }

    public function setProductsAttribute(array $products): void
    {
        $this->attributes['products'] = json_encode($products);
    }

    public function getStatusAttribute(): string
    {
        return ucfirst($this->attributes['status']);
    }

    public function setStatusAttribute(string $status): void
    {
        $this->attributes['status'] = strtolower($status);
    }
}
