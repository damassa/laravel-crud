<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $paginateFavorite = Favorite::paginate($perPage);
        $paginateFavorite->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($paginateFavorite);
    }
}
