<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'role:admin'])->name('admin.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/users', UserController::class);

    Route::get('/films', [FilmController::class, 'index'])
    ->name('films.index');
    Route::get('/films/create', [FilmController::class, 'create'])
    ->name('films.create');
    Route::post('/films/store', [FilmController::class, 'store'])
    ->name('films.store');
    Route::get('/films/{film}/edit', [FilmController::class, 'edit'])
    ->name('films.edit');
    Route::put('/films/{film}', [FilmController::class, 'update'])
    ->name('films.update');
    Route::delete('/films/{film}', [FilmController::class, 'destroy'])
    ->name('films.destroy');

    Route::get('/genres', [GenreController::class, 'index'])
    ->name('genres.index');
    Route::get('/genres/create', [GenreController::class, 'create'])
    ->name('genres.create');
    Route::post('/genres/store', [GenreController::class, 'store'])
    ->name('genres.store');
    Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])
    ->name('genres.edit');
    Route::put('/genres/{genre}', [GenreController::class, 'update'])
    ->name('genres.update');
    Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])
    ->name('genres.destroy');
});

require __DIR__.'/auth.php';
