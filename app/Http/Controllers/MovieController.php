<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->search) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->sort == 'title') {
            $query->orderBy('title');
        }

        if ($request->sort == 'genre') {
            $query->orderBy('genre');
        }

        if ($request->sort == 'year') {
            $query->orderBy('release_year', 'desc');
        }

        $movies = $query->get();

        $topMovies = Movie::withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(5)
            ->get();

        return view('movies.index', compact(
            'movies',
            'topMovies'
        ));
    }

    public function show($id)
    {
        $movie = Movie::with([
            'reviews.user',
            'reviews.comments.user',
            'reviews.reactions'
        ])->findOrFail($id);

        $averageRating = $movie->reviews()->avg('rating');

        return view('movies.show', compact(
            'movie',
            'averageRating'
        ));
    }

    public function uploadPoster(Request $request, $id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $request->validate([
            'poster' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $movie = Movie::findOrFail($id);

        $path = $request->file('poster')->store('posters', 'public');

        $movie->poster = $path;
        $movie->save();

        return redirect()->back();
    }
}