<?php

namespace Database\Factories;

use App\Models\Difficulty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Difficulty>
 */
class DifficultyFactory extends Factory
{
    protected $model = Difficulty::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $difficulties = ['Beginner', 'Amateur', 'Novice', 'Expert'];

        return [
            'name' => fake()->randomElement($difficulties),
            'status' => fake()->numberBetween(0, 1),
        ];
    }
}
