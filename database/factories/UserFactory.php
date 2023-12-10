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
        return [
            'username' => fake()->userName(),
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
        ];
    }

    public function user(): Factory|UserFactory
    {
        return $this->defineUser('userabcd123@@!#', 'STU');
    }

    public function admin(): Factory|UserFactory
    {
        return $this->defineUser('adminabcd123@@!#', 'ADM');
    }

    public function lecturer(): Factory|UserFactory
    {
        return $this->defineUser('lecturerabcd123@@!#', 'LEC');
    }

    private function defineUser(string $rawPassword, string $roleId)
    {
        return $this->state(function (array $attributes) use ($rawPassword, $roleId) {
            return [
                'password' => Hash::make($rawPassword),
                'role' => $roleId
            ];
        });
    }
}
