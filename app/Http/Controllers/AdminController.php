<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Comment;
use App\Models\Reaction;

class AdminController extends Controller
{
    public function users()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function toggleBlock($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $user = User::findOrFail($id);

        $user->is_blocked = !$user->is_blocked;
        $user->save();

        return redirect()->back();
    }

    public function dashboard()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'moviesCount' => Movie::count(),
            'reviewsCount' => Review::count(),
            'commentsCount' => Comment::count(),
            'reactionsCount' => Reaction::count(),
        ]);
    }
}