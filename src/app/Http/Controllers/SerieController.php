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
        return view('series', ['series'=>$this->serie->all()]);
    }

    public function show($id) {
        return view('serie', ['serie'=> Serie::find($id)]);
    }

    public function create() {
        return view('serie_create');
    }

    public function store(Request $request) {
        $newSerie = $request->all();
        if (Serie::create($newSerie)) {
            return redirect('/series');
        } else dd("Error while inserting new serie.");
    }

    public function edit($id) {
        $data = ['serie' => Serie::find($id)];
        return view('serie_edit', $data);
    }

    public function update(Request $request, $id) {
        $updatedSerie = $request->all();
        if (!Serie::find($id)->update($updatedSerie)) {
            dd("Error while updating serie $id");
        }
        return redirect('/series');
    }

    public function delete($id) {
        if(Produto::find($id)->delete())
            return redirect('/series');
        else dd($id);    
    }

    public function remove(Request $request, $id) {
        if($request->confirmar==="Delete") {
            if(!Serie::destroy($id)) {
                dd("Error while deleting serie $id");
            }
        }
        return redirect('/series');
    }
}
