<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $difficulty = array(
            array('name' => 'Amateur'),
            array('name' => 'Beginner'),
            array('name' => 'Adept'),
            array('name' => 'Novice'),
            array('name' => 'Expert')
        );

        Difficulty::factory()
            ->createMany($difficulty);
    }
}
