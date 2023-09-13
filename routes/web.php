<?php

use App\Http\Controllers\MatrixController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\EditMatrixController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(MatrixController::class)->group(function () {
    Route::get('matrix', 'index');
    Route::get('matrix/edit/{key}', 'editMatrix')->name('matrix.edit');
    Route::post('matrix/store', 'store');
    Route::post('matrix/section/update', 'updateSections');
})->middleware(['auth']);




//Route::get('matrix', [MatrixController::class], 'index')->name('matrix.index');
//Route::get('matrix/edit/{key}', [MatrixController::class], 'edit')->name('matrix.edit');

// Route::resource('matrix', MatrixController::class)
//     ->only(['index', 'edit'])
//     ->middleware(['auth']);

// Route::resource('matrix', MatrixController::class);



Route::controller(SectionController::class)->group(function () {
    Route::get('section', 'index');
    Route::get('section/show', 'show');
    Route::get('section/fetch/{key}', 'fetch');
    Route::post('section/store', 'store');
    Route::post('section/edit', 'edit');
    Route::post('section/update', 'update');
    Route::post('section/destroy', 'destroy');
})->middleware(['auth']);

require __DIR__.'/auth.php';
