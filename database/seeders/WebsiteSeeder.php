<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Website;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Website::firstOrCreate([
            'name' => 'Website A',
            'domain' => "websitea.com",
        ]);

        Website::firstOrCreate([
            'name' => 'Website B',
            'domain' => "websiteb.com",
        ]);

        Website::firstOrCreate([
            'name' => 'Website C',
            'domain' => "websitec.com",
        ]);
    }
}
