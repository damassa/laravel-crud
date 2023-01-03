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

        $seedSerie = new SerieSeeder();
        $seedSerie->run();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'fdfreekazoid@gmail.com',
        ]);
        \App\Models\User::factory(4)->create();

        \App\Models\Favorite::factory(20)->create();
    }
}
