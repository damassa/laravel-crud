<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\FavoriteController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SerieController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('series', [SerieController::class, 'index']);
Route::get('series/{id}', [SerieController::class, 'show']);
Route::post('series', [SerieController::class, 'store'])->middleware(['auth:sanctum', 'ability:is-admin']);
Route::put('series/{id}', [SerieController::class, 'update'])->middleware(['auth:sanctum', 'ability:is-admin']);
Route::delete('series/{id}', [SerieController::class, 'remove'])->middleware(['auth:sanctum', 'ability:is-admin']);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('categories', CategoryController::class)
    ->parameters([
        'categories'=>'category'
    ]);
    Route::apiResource('users', UserController::class);

    Route::put('users/{user}', [UserController::class, 'update'])->middleware('ability:is-admin');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->middleware('ability:is-admin');

    Route::get('categories/{category}/series', [CategoryController::class, 'series']);
    Route::post('categories', [CategoryController::class, 'store'])->middleware(['ability:is-admin']);
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->middleware('ability:is-admin');

    Route::put('categories/{category}', [CategoryController::class, 'update'])->middleware('ability:is-admin');

    Route::post('/users/favorites/{serie_id}', [UserController::class, 'toggleFavorite']);
});

Route::post('/users', [UserController::class, 'store']);
Route::post('login', [LoginController::class, 'login']);

