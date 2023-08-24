<?php

namespace App\Models;

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

    protected $casts = [
        'image' => 'array',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getImageAttribute(): array
    {
        return array_map(function ($image) {
            return [
                'id' => $image['id'],
                'name' => $image['name'],
                'price' => $image['price'],
                'image' => $image['image'],
            ];
        }, json_decode($this->attributes['image'], true));
    }

    public function setImageAttribute(array $image): void
    {
        $this->attributes['image'] = json_encode($image);
    }

    public function getPriceAttribute(): string
    {
        return array_reduce($this->image, function ($carry, $image) {
            return $carry + $image['price'];
        }, 0);
    }
}
