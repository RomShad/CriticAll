<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);
Route::get('/movie/{id}', [MovieController::class, 'show']);
Route::get('/test-register', function () {
    return 'TEST REGISTER PAGE';
});
Route::get('/register-test2', function () {
    return view('auth.register');
});


Route::middleware('auth')->group(function () {

    Route::post('/movie/{id}/review', [ReviewController::class, 'store']);

    Route::get('/review/{id}/edit', [ReviewController::class, 'edit']);
    Route::put('/review/{id}', [ReviewController::class, 'update']);
    Route::delete('/review/{id}', [ReviewController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin-test', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        return 'ADMIN PANEL';
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';