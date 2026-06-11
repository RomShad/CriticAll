<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieListController extends Controller
{
    public function index()
    {
        $lists = Auth::user()
            ->movieLists()
            ->with('movies')
            ->get();

        return view(
            'lists.index',
            compact('lists')
        );
    }

    public function create()
    {
        $movies = Movie::all();

        return view(
            'lists.create',
            compact('movies')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $list = MovieList::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description
        ]);

        $list->movies()->attach(
            $request->movies ?? []
        );

        return redirect('/lists');
    }
    public function destroy($id)
    {
        $list = MovieList::findOrFail($id);

        if ($list->user_id != Auth::id()) {
            abort(403);
        }

        $list->delete();

        return redirect('/lists');
    }

}