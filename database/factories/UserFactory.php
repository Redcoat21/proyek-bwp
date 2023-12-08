<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = Role::all()->pluck('id');
        $password = ['abcdefg12346@@!', 'userganteng1240', 'ayamayam21345'];
        return [
            'username' => fake()->userName(),
            'password' => Hash::make(fake()->randomElement($password)),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'role' => fake()->randomElement($roles)
        ];
    }
}
