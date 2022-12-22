<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\CategoryController;

Route::get('/ola', [HomeController::class, 'index']);

/* Series */ 
Route::get('/series', [SerieController::class, 'index']);
Route::get('/series/{id}', [SerieController::class, 'show']);
Route::get('/serie', [SerieController::class, 'create']);
Route::post('/serie', [SerieController::class, 'store']);
Route::get('/serie/{id}/edit', [SerieController::class, 'edit'])->name('edit');
Route::post('/serie/{id}/update', [SerieController::class, 'update'])->name('update');
Route::get('/serie/{id}/delete', [SerieController::class, 'delete'])->name('delete');
Route::post('/serie/{id}/delete', [SerieController::class, 'remove'])->name('remove');

/* Categories */
Route::get('/categories', [CategoryController::class, 'index']);