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
        $roles = array(
            array('id' => 'ADM', 'name' => 'Admin'),
            array('id' => 'CUS', 'name' => 'Customer'),
            array('id' => 'TEA', 'name' => 'Teacher'),
        );

        Role::factory()
            ->createMany($roles);
    }
}
