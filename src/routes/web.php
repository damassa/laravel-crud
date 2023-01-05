<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SerieController;
use App\Models\Serie;
use App\Models\User;
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

Route::get('/', function () {
    return view('landing', ['series'=>Serie::all()]);
})->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard',
        ['series'=>Serie::all(),
        'users'=>User::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/serie/{id}', function ($id) {
    return view('pages.serie.single-dash', ['serie'=>Serie::find($id)]);
})->middleware(['auth', 'verified'])->name('serie.single-dash');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(SerieController::class)
    ->group(function () {
        Route::prefix('/series')->group(function () {
            Route::get('/', 'index')->name('series')->middleware('auth');
            Route::get('/{id}', 'show')->name('single');
        });

        Route::prefix('/serie')
            ->middleware('auth')
            ->group(function () {
                Route::get('/', 'create');
                Route::post('/', 'store');

                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/{id}/update', 'update')->name('update');

                Route::get('/{id}/delete', 'delete')->name('delete');
                Route::post('/{id}/remove', 'remove')->name('remove');
            });
    });
