<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;  
use App\Http\Controllers\MovieListController;



Route::middleware('auth')->group(function () {

    Route::get(
        '/lists',
        [MovieListController::class, 'index']
    );

    Route::get(
        '/lists/create',
        [MovieListController::class, 'create']
    );

    Route::post(
        '/lists',
        [MovieListController::class, 'store']
    );

    Route::delete(
        '/lists/{id}',
        [MovieListController::class, 'destroy']
    );

    
});


Route::get('/users/search', [UserController::class, 'search']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/friends', [UserController::class, 'friends'])->middleware('auth');

Route::get('/', [MovieController::class, 'index']);
Route::get('/movie/{id}', [MovieController::class, 'show']);

Route::get('/lang/{locale}', function ($locale) {

    if (in_array($locale, ['en', 'lv'])) {
        Session::put('locale', $locale);
    }

    return redirect()->back();
});

Route::middleware('auth')->group(function () {

    // Reviews
    Route::post('/movie/{id}/review', [ReviewController::class, 'store']);

    Route::get('/review/{id}/edit', [ReviewController::class, 'edit']);
    Route::put('/review/{id}', [ReviewController::class, 'update']);
    Route::delete('/review/{id}', [ReviewController::class, 'destroy']);

    // Admin
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::post('/admin/users/{id}/toggle-block', [AdminController::class, 'toggleBlock']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin-test', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return 'ADMIN PANEL';
    });


    Route::post('/review/{id}/comment', [CommentController::class, 'store']);
    Route::delete('/comment/{id}', [CommentController::class, 'destroy']);

    Route::post(
        '/review/{id}/reaction/{type}',
        [ReactionController::class, 'react']
    );

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/my-reviews', [ProfileController::class, 'reviews']);

    Route::get('/activity',[UserController::class, 'activity']);

    Route::post('/movie/{id}/poster', [MovieController::class, 'uploadPoster']);
    Route::post('/users/{id}/follow', [FollowController::class, 'follow']);
    Route::post('/users/{id}/unfollow', [FollowController::class, 'unfollow']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';