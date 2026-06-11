<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($id)
    {
        if ($id == Auth::id()) {
            return back();
        }

        $exists = Follow::where('follower_id', Auth::id())
            ->where('following_id', $id)
            ->exists();

        if (!$exists) {

            Follow::create([
                'follower_id' => Auth::id(),
                'following_id' => $id
            ]);

        }

        return back();
    }

    public function unfollow($id)
    {
        Follow::where('follower_id', Auth::id())
            ->where('following_id', $id)
            ->delete();

        return back();
    }
}