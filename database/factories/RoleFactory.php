<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Role>
 */
class RoleFactory extends Factory
{
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        return [
//            'id' => fake()->randomElement($roleData),
//            'name' => fake()->languageCode()
//        ];

        return [];
    }

    /**
     * Configure the model factory sequence for 'roleId'.
     *
     * @return $this
     */
//    public function configure(): Factory
//    {
//        return $this->afterCreating(function (Role $model) {
//            $roleDatas = ['Admin', 'Customer', 'Teacher'];
//            $roleIds = ['ADM', 'CUS', 'TEA'];
//
//
//            $sequence = $this->sequence(0)->;
//
//            $model->update(['roleId' => $roleIds[$sequence->index]]);
//        });
//    }
}
