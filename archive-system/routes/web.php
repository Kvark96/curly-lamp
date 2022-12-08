<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SingleProjectController;
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

Route::resource('projects', ProjectController::class)
    ->only(['index', 'store'])
    ->middleware(['auth']);

Route::get('projects/add', [ProjectController::class, 'add'])
    ->middleware(['verifyRole', 'auth']);

Route::get('project/{id}', [SingleProjectController::class, 'showProject'])
    ->middleware('auth');

Route::resource('project/{id}/something', SingleProjectController::class)
    ->only(['index', 'store'])
    ->middleware(['auth']);

Route::get('project/addfile', [FileController::class, 'add'])
    ->middleware(['auth']);

Route::resource('project/{project_id}/{folder_id}/files', FileController::class)
    ->only(['store', 'update'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';
