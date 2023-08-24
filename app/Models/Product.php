<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getPriceAttribute(): string
    {
        return array_reduce($this->image, function ($carry, $image) {
            return $carry + $image['price'];
        }, 0);
    }

    public function scopeFilters(Builder $query, array $filters): void
    {
        if (isset($filters['search'])) {
            $query->where(
                fn (Builder $query) => $query
                    ->where('name', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $filters['search'] . '%')
            );
        }
    }
}
