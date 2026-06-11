<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function react($reviewId, $type)
    {
        $reaction = Reaction::where('user_id', Auth::id())
            ->where('review_id', $reviewId)
            ->first();

        if ($reaction) {

            if ($reaction->type == $type) {

                $reaction->delete();

            } else {

                $reaction->update([
                    'type' => $type
                ]);

            }

        } else {

            Reaction::create([
                'user_id' => Auth::id(),
                'review_id' => $reviewId,
                'type' => $type
            ]);

        }

        return redirect()->back();
    }
}