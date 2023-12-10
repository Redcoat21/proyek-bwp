<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $difficulties = array(
            array('name' => 'Beginner'),
            array('name' => 'Amateur'),
            array('name' => 'Novice'),
            array('name' => 'Expert')
        );

        Difficulty::factory()->createMany($difficulties);
    }
}
