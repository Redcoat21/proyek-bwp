<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            array('id' => 'STU', 'name' => 'Student'),
            array('id' => 'LEC', 'name' => 'Lecturer'),
            array('id' => 'MST', 'name' => 'Master')
        );

        Role::factory()
            ->createMany($roles);
    }
}
