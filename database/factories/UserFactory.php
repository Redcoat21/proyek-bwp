<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

/**
 * @extends Factory<User>
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
            'username' => fake()->unique()->userName(),
            'name' => fake()->name(),
            'password' => 'abcd',
            'email' => fake()->email(),
        ];
    }

    public function student(): UserFactory | Factory
    {
        return $this->defineUser('userabcd123!@#', 'STU');
    }

    public function lecturer(): UserFactory | Factory
    {
        return $this->defineUser('lecturerabcd123!@#', 'LEC');
    }

    public function admin(): UserFactory | Factory
    {
        return $this->defineUser('adminabcd123!@#', 'ADM');
    }

    public function master(): UserFactory | Factory
    {
        return $this->defineUser('master123', 'MST');
    }

    public function defineUser(string $password, string $role): Factory|UserFactory
    {
        return
        $this->state(function (array $attributes) use ($password, $role) {
            return [
            'password' => Hash::make($password),
            'role' => $role
            ];
        });
    }
}
