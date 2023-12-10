<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = array(
            array('id' => 'ADM', 'name' => 'Admin'),
            array('id' => 'STU', 'name' => 'Student'),
            array('id' => 'LEC', 'name' => 'Lecturer'),
        );

        Role::factory()
            ->createMany($roles);
    }
}
