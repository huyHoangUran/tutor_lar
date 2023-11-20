<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $status = collect([
            Student::STATUS_ABSENT,
            Student::STATUS_PRESENT,
        ])->random(1)[0];
        return [
            'class_name' => fake()->text(8),
            'code' => fake()->text(8),
            'name' => fake()->name(),
            'img' => fake()->imageUrl,
            'status' => $status,
            'note' =>  fake()->text
        ];
    }
}
