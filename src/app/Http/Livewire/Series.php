<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Serie;
use Exception;
use Illuminate\Support\Facades\Log;

class Series extends Component
{
    public $series;
    public $orderAsc = true;
    public $orderColumn = 'id';

    public $name;
    private $category_id = 1;
    public $plot;
    public $image;
    public $opening_video;
    public $year;
    public $duration;
    public $idSerie;

    // public function mount() {
    //     $this->series = Serie::all();
    // }

    public function render()
    {
        return view('livewire.series');
    }

    public function orderBy($column='id') {
        $this->orderColumn = Serie::orderBy(
            $this->orderColumn,
            $this->orderAsc ? 'asc' : 'desc'
        )->get();
        $this->orderAsc = !$this->orderAsc;
        Log::channel('stderr')->info($this->orderAsc?'asc':'desc');
    }

    public function orderByName() {
        $this->orderBy('name');
    }

    public function orderByYear() {
        $this->orderBy('year');
    }

    public function save() {
        $serie = [
            "category_id" => $this->category_id,
            "name" => $this->name,
            "plot" => $this->plot,
            "image" => $this->image,
            "opening_video" => $this->opening_video,
            "year" => $this->year,
            "duration" => $this->duration,
        ];

        try {
            Serie::create($serie);
            $this->clear();
            $this->orderAsc = false;
            $this->orderBy();
        } catch(Exception $e) {
            // dd('Error while adding serie');
            dd($e->getMessage());
        }
    }

    public function remove($id) {
        if(!Serie::destroy($id)) {
            return "Error";
        }
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
    }

    private function clear() {
        $this->name = '';
        $this->plot = '';
        $this->image = '';
        $this->opening_video = '';
        $this->year = 0;
        $this->duration = 0;
    }

    public function update($id) {
        $serie = [
            'name' => $this->name,
            'plot' => $this->plot,
            'image' => $this->image,
            'opening_video' => $this->opening_video,
            'year' => $this->year,
            'duration' => $this->duration
        ];
        Serie::findOrFail($id)->update($serie);
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
        $this->clear();
    }
}
