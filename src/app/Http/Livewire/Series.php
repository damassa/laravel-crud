<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Serie;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Series extends Component
{
    public $serie;
    public $listCategories;
    public $listSeries;
    public $orderAsc = true;
    public $orderColumn = 'id';


    public function mount() {
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.series');
    }

    public function orderBy($column='id') {
        $this->orderColumn = $column;
        $this->listSeries = Serie::orderBy(
            $this->orderColumn,
            $this->orderAsc ? 'asc' : 'desc'
        )->limit(4)->get();
        $this->log($this->orderAsc?'asc':'desc');
    }

    public function getCategories() {
        foreach(Category::all()->pluck('name', 'id') as $id=>$name)
            $this->listCategories[]=["id"=>$id, 'name'=>$name];
    }

    public function orderByName() {
        $this->orderBy('name');
    }

    public function orderByYear() {
        $this->orderBy('year');
    }

    public function save() {
        $newSerie = $this->serie;
        $newSerie['category_id'] = $this->serie['category_id'];
        try {
            Serie::create($newSerie);
            $this->log(['saved', $newSerie]);
            $this->clear();
            $this->orderAsc = false;
            $this->orderBy();
        } catch(Exception $e) {
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
        $this->serie = [];
    }

    public function update($updatedSerie) {
        $this->serie = $updatedSerie;
        $this->log(['updated', $this->serie]);
        Serie::findOrFail($this->serie['id'])->update($this->serie);
        $this->orderBy($this->orderColumn);
        $this->clear();
    }

    public function log($var) {
        Log::channel('stderr')->info(print_r($var, true));
    }
}
