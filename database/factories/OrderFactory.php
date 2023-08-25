<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = fake()->dateTimeBetween('-1 year');
        return [

            'product_id' => 1,
            'name' => 'John Doe',
            'phone' => '081234567890',
            'city' => 'Jakarta',
            'district' => 'Jakarta Selatan',
            'address' => 'Jl. Jalan',
            'total_price' => 10000,
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
