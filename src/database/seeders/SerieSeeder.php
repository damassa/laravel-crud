<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Serie;


class SerieSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        try {
            if (Serie::all()->count()) {
                Log::channel('stderr')->info("Series already created");
                print_r(Serie::all()->pluck('name','id'));
                return;
            }

            $jsonUrl = 'api/series.json';
            $response = Storage::get($jsonUrl);
            $series = json_decode($response);

            if (!$series)
                throw new \Exception("Error while loading JSON file!\nURL:$jsonUrl");

            $listSeries = [];
            foreach ($series as $serie) {
                $listSeries[] = [
                    "name"      =>  $serie->name,
                    "category_id"  =>  $serie->category_id,
                    "plot"        =>  $serie->plot,
                    "image" =>  $serie->image,
                    "opening_video" => $serie->opening_video,
                    "year" => $serie->year,
                    "duration" => $serie->duration
                ];
            }
            if (!Serie::insert($listSeries))
                throw new \Exception("Error while insert series!", 1);

            Log::channel('stderr')->info("Series inserted!");
            print_r(Serie::all()->pluck('name','id'));
        } catch (\Exception $error) {
            throw new \Exception("Error while processing series seed!\n {$error->getMessage()}");
        }
    }
}
