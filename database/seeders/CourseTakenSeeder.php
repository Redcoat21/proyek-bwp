<?php

namespace Database\Seeders;

use App\Models\CourseTaken;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTakenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseTaken::factory()
            ->count(10)
            ->create();
    }
}
