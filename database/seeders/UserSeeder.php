<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(30)->lecturer()->create();
        User::factory()->count(60)->student()->create();
        User::factory()->count(10)->admin()->create();
        User::factory()->count(1)->master()->create();
    }
}
