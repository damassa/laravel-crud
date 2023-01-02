<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seedCategory = new CategorySeeder();
        $seedCategory->run();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'fdfreekazoid@gmail.com',
        ]);
    }
}
