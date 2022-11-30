<?php

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

    // TODO: Add verification for user-type (needs to be project-leader or admin)
Route::get('projects/add', [ProjectController::class, 'add'])
    ->middleware(['auth']);

Route::resource('project/{id}', SingleProjectController::class)
    ->only(['index', 'store'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';
