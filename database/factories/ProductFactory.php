<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->sentence;
        $description = fake()->paragraphs(asText: true);
        $short_description = Str::limit($description, 200);
        $created_at = fake()->dateTimeBetween('-1 year');

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $description,
            'short_description' => $short_description,
            'discount_price' => fake()->numberBetween(1000, 10000),
            'shipping_price' => fake()->numberBetween(100, 1000),
            'image' => fake()->imageUrl,
            'price' => fake()->numberBetween(1000, 10000),
            'stock' => fake()->numberBetween(1, 100),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
