<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Subcourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseCount = Course::all()->count();

        Subcourse::factory()->count($courseCount * 4)->create();
    }
}
