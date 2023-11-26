<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
           \Database\Seeders\RoleSeeder::class,
           \Database\Seeders\DifficultySeeder::class,
            \Database\Seeders\CategorySeeder::class,
            \Database\Seeders\UserSeeder::class,
            \Database\Seeders\CourseSeeder::class,
            \Database\Seeders\CourseTakenSeeder::class,
            \Database\Seeders\CertificateSeeder::class,
        ]);
    }
}
