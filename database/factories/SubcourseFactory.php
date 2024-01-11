<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcourse>
 */
class SubcourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = Course::all()->pluck('id');

        return [
            'name' => fake()->word(),
            'description' => fake()->word(),
            'course' => fake()->randomElement($courses),
        ];
    }
}
