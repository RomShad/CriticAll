<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $reviewId)
    {
        $request->validate([
            'text' => 'required|string|max:1000'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'review_id' => $reviewId,
            'text' => $request->text
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (
            $comment->user_id != Auth::id()
            && Auth::user()->role != 'admin'
        ) {
            abort(403);
        }

        $comment->delete();

        return redirect()->back();
    }
}