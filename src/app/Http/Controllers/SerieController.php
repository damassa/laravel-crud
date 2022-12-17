<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * @var Serie
     */
    private $serie;

    public function __construct() {
        $this->serie = new Serie();
    }

    public function index() {
        // $modelSerie = new Serie();
        // $series = $modelSerie->all();
        return view('series', ['series'=>$this->serie->all()]);
    }

    public function show($id) {
        return view('serie', ['serie'=> Serie::find($id)]);
    }
}
