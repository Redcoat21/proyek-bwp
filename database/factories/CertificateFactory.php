<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usernames = User::where('role', 'CUS')->pluck('username');
        $courses = Course::all()->pluck('id');
        return [
            'username' => fake()->randomElement($usernames),
            'course' => fake()->randomElement($courses),
            'start' => fake()->dateTimeBetween(
                startDate: '-5 years',
            )
        ];
    }
}
