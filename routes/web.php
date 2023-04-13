<?php

use App\Http\Livewire\Kasir\Seat;
use App\Http\Livewire\Kasir\Index;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\transactions;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\SeatController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\admin\StudioController;
use App\Http\Controllers\admin\TimetableController;
use App\Http\Controllers\Admin\PermissionController;

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
    if (auth()->user()->name == "admin") {
        return redirect(route('admin.index'));
    } else {
        return redirect(route('film'));
    }
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/users', UserController::class);
<<<<<<<<< Temporary merge branch 1

    // Films
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

    // Genres
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
=========
    Route::get('transaction', [transactions::class, 'index'])->name('transaction.index');
>>>>>>>>> Temporary merge branch 2
});

Route::middleware(['auth', 'verified'])->name('pos.')->prefix('pos')->group(function () {
    Route::get('/', Index::class)->middleware(['auth', 'verified'])->name('film');
    // Route::get('seat', Seat::class)->middleware(['auth', 'verified'])->name('seat');
});

require __DIR__ . '/auth.php';
