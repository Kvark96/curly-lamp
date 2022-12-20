<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SingleProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\Console\SingleCommandApplication;

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

Route::resource('projects', ProjectController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::get('projects/add', [ProjectController::class, 'add'])
    ->middleware(['verifyRole', 'auth']);

Route::get('project/{id}', [SingleProjectController::class, 'showProject'])
    ->middleware('auth')
    ->name('project');

Route::resource('project', SingleProjectController::class)
    ->only(['update'])
    ->middleware(['verifyRole', 'auth']);

Route::post('project/addUsers', [SingleProjectController::class, 'addUsers'])
    ->middleware('auth')
    ->name('project.addusers');

Route::get('project/{id}/add-file', function () {
    return Inertia::render('SingleProject/AddFile');
});

Route::get('project/{id}/add-link', function () {
    return Inertia::render('SingleProject/AddLink');
});

Route::resource('folders', FolderController::class)
    ->only(['store']);

Route::resource('files', FileController::class)
    ->only(['store'])
    ->middleware('auth');

Route::resource('links', LinkController::class)
    ->only(['store'])
    ->middleware('auth');



// Route::resource('project/{id}/something', SingleProjectController::class)
//     ->only(['index', 'store'])
//     ->middleware(['auth']);


// Route::resource('project/{project_id}/{folder_id}/files', FileController::class)
//     ->only(['store', 'update'])
//     ->middleware(['auth']);

require __DIR__ . '/auth.php';
