<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = collect([
            Client::STATUS_ACTIVE,
            Client::STATUS_INACTIVE,
        ])->random(1)[0];
        return [
            'company_name' => fake()->company(40),
            'account_owner' => fake()->name(20),
            'project' => random_int(1, 2),
            'img' => fake()->imageUrl,
            'tag' => fake()->text(10),
            'category' => fake()->text(15),
            'invoice' => fake()->randomFloat(2, 10, 100),
            'status' => $status,
        ];
    }
}
