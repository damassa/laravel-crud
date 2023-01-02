<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory()->create([
            'name' => 'Super Sentai'
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Kamen Rider'
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Henshin Hero'
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Kyodai Hero'
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Metal Hero'
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Ultraman'
        ]);
    }
}
