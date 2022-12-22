<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * @var Serie
     */
    protected $serie;

    public function __construct() {
        $this->serie = new Serie();
    }

    public function index() {
        $modelSerie = new Serie();
        $series = $modelSerie->all();
        return view('pages.serie.index', ['series' => $series]);
    }

    public function show($id) {
        return view(
            'pages.serie.single',
            ['serie' => Serie::find($id)]
        );
    }

    public function create() {
        return view('pages.serie.create');
    }

    public function store(Request $request) {
        $newSerie = $request->all();
        if (Serie::create($newSerie)) {
            return redirect('/dashboard');
        } else dd("Error while inserting new serie.");
    }

    public function edit($id) {
        return view('pages.serie.edit', ['serie' => Serie::find($id)]);
    }    

    public function update(Request $request, $id) {
        $updatedSerie = $request->all();
        if (!Serie::find($id)->update($updatedSerie)) {
            dd("Error while updating serie $id");
        }
        return redirect('/dashboard');
    }

    public function delete($id) {
        return view(
            'pages.serie.delete',
            ['serie' => Serie::find($id)]
        );
    }

    public function remove(Request $request, $id) {
        if($request->confirmar=="Delete") {
            if(!Serie::destroy($id)) {
                dd("Error while deleting serie $id");
            }
        }
        return redirect('/dashboard');
    }
}
