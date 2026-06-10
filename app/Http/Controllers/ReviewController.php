<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
        {
            Review::create([
                'movie_id' => $id,
                'user_id' => 1,
                'rating' => $request->rating,
                'text' => $request->text
            ]);

            return redirect()->back();
        }
}
