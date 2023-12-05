<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Prefix Router must auth
Route::middleware(['auth'])->group(function () {
    //Genre
    Route::prefix('genre')->group(function () {
        Route::get('/', [App\Http\Controllers\GenreController::class, 'index'])->name('genre');
        Route::get('/create', [App\Http\Controllers\GenreController::class, 'create'])->name('genre.create');
        Route::post('/store', [App\Http\Controllers\GenreController::class, 'store'])->name('genre.store');
        Route::get('/show/{id}', [App\Http\Controllers\GenreController::class, 'show'])->name('genre.show');
        Route::get('/edit/{id}', [App\Http\Controllers\GenreController::class, 'edit'])->name('genre.edit');
        Route::post('/update/{id}', [App\Http\Controllers\GenreController::class, 'update'])->name('genre.update');
        Route::get('/destroy/{id}', [App\Http\Controllers\GenreController::class, 'destroy'])->name('genre.destroy');
        Route::get('/trash', [App\Http\Controllers\GenreController::class, 'trash'])->name('genre.trash');
        Route::get('/restore/{id}', [App\Http\Controllers\GenreController::class, 'restore'])->name('genre.restore');
        Route::get('/delete/{id}', [App\Http\Controllers\GenreController::class, 'delete'])->name('genre.delete');
    });

    //Movie
    Route::prefix('movie')->group(function () {
        Route::get('/', [App\Http\Controllers\MovieController::class, 'index'])->name('movie');
        Route::get('/create', [App\Http\Controllers\MovieController::class, 'create'])->name('movie.create');
        Route::post('/store', [App\Http\Controllers\MovieController::class, 'store'])->name('movie.store');
        Route::get('/show/{id}', [App\Http\Controllers\MovieController::class, 'show'])->name('movie.show');
        Route::get('/edit/{id}', [App\Http\Controllers\MovieController::class, 'edit'])->name('movie.edit');
        Route::post('/update/{id}', [App\Http\Controllers\MovieController::class, 'update'])->name('movie.update');
        Route::get('/destroy/{id}', [App\Http\Controllers\MovieController::class, 'destroy'])->name('movie.destroy');
        Route::get('/trash', [App\Http\Controllers\MovieController::class, 'trash'])->name('movie.trash');
        Route::get('/restore/{id}', [App\Http\Controllers\MovieController::class, 'restore'])->name('movie.restore');
        Route::get('/delete/{id}', [App\Http\Controllers\MovieController::class, 'delete'])->name('movie.delete');
    });

    //Review
    Route::prefix('review')->group(function () {
        Route::get('/', [App\Http\Controllers\ReviewController::class, 'index'])->name('review');
        Route::get('/create', [App\Http\Controllers\ReviewController::class, 'create'])->name('review.create');
        Route::post('/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');
        Route::get('/show/{id}', [App\Http\Controllers\ReviewController::class, 'show'])->name('review.show');
        Route::get('/edit/{id}', [App\Http\Controllers\ReviewController::class, 'edit'])->name('review.edit');
        Route::post('/update/{id}', [App\Http\Controllers\ReviewController::class, 'update'])->name('review.update');
        Route::get('/destroy/{id}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review.destroy');
        Route::get('/trash', [App\Http\Controllers\ReviewController::class, 'trash'])->name('review.trash');
        Route::get('/restore/{id}', [App\Http\Controllers\ReviewController::class, 'restore'])->name('review.restore');
        Route::get('/delete/{id}', [App\Http\Controllers\ReviewController::class, 'delete'])->name('review.delete');
    });
    
});


