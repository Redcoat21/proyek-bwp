<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Difficulty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::all()->pluck('id');
        $teachers = User::where('role', 'TEA')->get()->pluck('username');
        $difficulties = Difficulty::all()->pluck('id');

        return [
            'name' => fake()->word() . fake()->word() . fake()->word(),
            'status' => fake()->numberBetween(0, 1),
            'teacher' => fake()->randomElement($teachers),
            'category' => fake()->randomElement($categories),
            'difficulty' => fake()->randomElement($difficulties)
        ];
    }
}
