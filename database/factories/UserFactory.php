<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = Role::all()->pluck('id');
        $passwords = ['password@420', 'abcd@@@21', 'uniquepassword!123', 'laravel123$#'];

        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->email(),
            'password' => Hash::make(fake()->password(6, 15)),
            'name' => fake()->name(),
            'status' => fake()->numberBetween(0, 1),
            'role' => fake()->randomElement($roles)
        ];
    }
}
