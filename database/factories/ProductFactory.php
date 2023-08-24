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
        $created_at = fake()->dateTimeBetween('-1 year');

        return [
            'name' => $name,
            'description' => $description,
            'image' => fake()->imageUrl,
            'price' => fake()->numberBetween(1000, 10000),
            'stock' => fake()->numberBetween(1, 100),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
