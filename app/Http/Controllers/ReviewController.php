<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'text' => 'required|string|max:1000'
        ]);

        $exists = Review::where('user_id', Auth::id())
            ->where('movie_id', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->with('error', 'You have already reviewed this movie.');
        }

        Review::create([
            'movie_id' => $id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'text' => $request->text
        ]);

        return redirect()->back();
    }
    
    public function edit($id)
        {
            $review = Review::findOrFail($id);

            if (
                $review->user_id != Auth::id()
                && Auth::user()->role != 'admin'
            ) {
                abort(403);
            }

            return view('reviews.edit', compact('review'));
        }
    public function update(Request $request, $id)
        {
            $review = Review::findOrFail($id);

            if (
                $review->user_id != Auth::id()
                && Auth::user()->role != 'admin'
            ) {
                abort(403);
            }

            $request->validate([
                'rating' => 'required|integer|min:1|max:10',
                'text' => 'required|string|max:1000'
            ]);

            $review->update([
                'rating' => $request->rating,
                'text' => $request->text
            ]);

            return redirect('/movie/' . $review->movie_id);
        }
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if (
            $review->user_id != Auth::id()
            && Auth::user()->role != 'admin'
        ) {
            abort(403);
        }

        $movieId = $review->movie_id;

        $review->delete();

        return redirect('/movie/' . $movieId);
    }
}
