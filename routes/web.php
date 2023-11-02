<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ElementController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index');
})->middleware(['auth']);

Route::controller(MatrixController::class)->group(function () {
    Route::get('matrix', 'index');
    Route::get('matrix/edit/{key}', 'editMatrix')->name('matrix.edit');
    Route::get('matrix/fetch/{key}', 'fetchMatrix');
    Route::get('matrix/all', 'fetchAllMatrices');
    Route::post('matrix/update/{key}', 'updateMatrix');
    Route::post('matrix/new', 'newMatrix');
    Route::post('matrix/section/register', 'registerSection');
    Route::post('matrix/edit/section/new', 'newSection');
    Route::delete('matrix/delete/{key}', 'destroy')->name('matrix.destroy');
})->middleware(['auth']);


Route::controller(SectionController::class)->group(function () {
    Route::get('section', 'index');
    Route::get('section/show', 'show');
    Route::get('section/fetch/{key}', 'fetch');
    Route::post('section/create', 'createSection');
    Route::post('section/edit', 'edit');
    Route::post('section/register', 'registerSection');
    Route::post('section/destroy', 'destroy');
})->middleware(['auth']);


Route::controller(ModuleController::class)->group(function () {
    Route::get('module', 'index');
    Route::get('module/show', 'show');
    Route::get('module/fetch/{key}', 'fetch');
    Route::post('module/create', 'create');
    Route::post('module/store', 'store');
    Route::post('module/edit', 'edit');
    Route::post('module/update', 'update');
    Route::post('module/destroy', 'destroy');
})->middleware(['auth']);

Route::controller(ElementController::class)->group(function () {
    Route::post('element/create', 'registerParagraphElement');
})->middleware(['auth']);








require __DIR__.'/auth.php';
