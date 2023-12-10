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
        $lecturers = User::where('role', 'LEC')->pluck('username');
        $difficulties = Difficulty::all()->pluck('id');
        $categories = Category::all()->pluck('id');

        return [
            'name' => fake()->word(),
            'status' => fake()->randomNumber(1),
            'lecturer' => fake()->randomElement($lecturers),
            'difficulty' => fake()->randomElement($difficulties),
            'category' => fake()->randomElement($categories)
        ];
    }
}
