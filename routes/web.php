<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserGameController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');



Route::get('/add-user-game', [UserGameController::class, 'create'])->name('user-game.create');
Route::post('/add-user-game', [UserGameController::class, 'store'])->name('user-game.store');
Route::get('/user/{id}/games', [UserGameController::class, 'getUserGames'])->name('user.games');



require __DIR__.'/auth.php';
