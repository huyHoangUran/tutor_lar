<?php

namespace Database\Factories;

use App\Models\Pro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pro>
 */
class ProFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = collect([
            Pro::STATUS_HIDE,
            Pro::STATUS_SHOW,
        ])->random(1)[0];
        return [
            'name' => fake()->name(40),
            'img' => fake()->imageUrl,
            'price' => fake()->randomFloat(2, 10, 100),
            'status' => $status,
        ];
    }
}
