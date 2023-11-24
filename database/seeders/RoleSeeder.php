<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleData = ['Admin', 'Customer', 'Teacher'];

        $roleId = ['ADM', 'CUS', 'TEA'];

        Role::factory()
            ->count(count($roleData))
            ->sequence(fn (Sequence $sequence) => ['id' => $roleId[$sequence->index], 'name' => $roleData[$sequence->index]])
            ->create();
    }
}
