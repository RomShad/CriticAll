<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $users = User::query();

        if ($request->search) {
            $users->where(
                'name',
                'like',
                '%' . $request->search . '%'
            );
        }

        return view(
            'users.search',
            [
                'users' => $users->get()
            ]
        );
    }

    public function show($id)
    {
        $user = User::with('reviews.movie')
            ->findOrFail($id);

        $isFollowing = false;

        if (Auth::check()) {

            $isFollowing = Follow::where(
                'follower_id',
                Auth::id()
            )
            ->where(
                'following_id',
                $user->id
            )
            ->exists();

        }

        return view(
            'users.show',
            compact(
                'user',
                'isFollowing'
            )
        );
    }

    public function activity()
    {
        $followingIds = \App\Models\Follow::where(
            'follower_id',
            auth()->id()
        )->pluck('following_id');

        $reviews = \App\Models\Review::with([
            'user',
            'movie'
        ])
        ->whereIn('user_id', $followingIds)
        ->latest()
        ->take(20)
        ->get();

        return view(
            'users.activity',
            compact('reviews')
        );
    }

    public function friends()
    {
        $friends = auth()->user()
            ->following()
            ->get();

        return view(
            'users.friends',
            compact('friends')
        );
    }
}