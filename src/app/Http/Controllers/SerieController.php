<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{

    public function index() {
        $modelSerie = new Serie();
        return view('pages.serie.index', ['series' => $modelSerie->paginate(4)]);
    }

    public function show($id) {
        return view(
            'pages.serie.single',
            ['serie' => Serie::find($id)]
        );
    }

    public function create() {
        return view('pages.serie.create', ['categories' => Category::all()]);
    }

    public function store(Request $request) {
        if ($request->has('confirm')) {
            $newSerie = $request->all();
            if(!Serie::create($newSerie)) {
                dd("Error while creating serie.");
            }
        }
        return redirect('/dashboard');
    }

    public function edit($id) {
        return view('pages.serie.edit', ['serie' => Serie::find($id), 'categories'=>Category::all()]);
    }

    public function update(Request $request, $id) {
        if($request->has('confirm')) {
            $updatedSerie = $request->all();
            if(!Serie::find($id)->update($updatedSerie)) {
                dd("Error while updating.");
            }
        }
        return redirect('/dashboard');
    }

    public function delete($id) {
        return view(
            'pages.serie.delete',
            ['serie' => Serie::find($id)->load('category')]
        );
    }

    public function remove(Request $request, $id) {
        if($request->has('confirm')) {
            if(!Serie::destroy($id)) {
                dd("Error while deleting serie $id");
            }
        }
        return redirect('/dashboard');
    }
}
