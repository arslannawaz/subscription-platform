<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'John Doe',
            'email' => "johndoe@email.com",
        ]);

        User::firstOrCreate([
            'name' => 'Alex Smith',
            'email' => "alexsmith@email.com",
        ]);

        User::firstOrCreate([
            'name' => 'Bob Will',
            'email' => "bobwill@email.com",
        ]);
    }
}
