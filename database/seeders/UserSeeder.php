<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'username' => 'dummyadmin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'name' => 'admin1',
            'role' => 'ADM'
        ]);

        User::factory()->count(30)->create();
    }
}
