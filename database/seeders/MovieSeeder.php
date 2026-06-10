<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            ['title' => 'Interstellar', 'genre' => 'Sci-Fi', 'release_year' => 2014],
            ['title' => 'Inception', 'genre' => 'Sci-Fi', 'release_year' => 2010],
            ['title' => 'The Dark Knight', 'genre' => 'Action', 'release_year' => 2008],
            ['title' => 'Arrival', 'genre' => 'Sci-Fi', 'release_year' => 2016], 
            ['title' => 'The Matrix', 'genre' => 'Sci-Fi', 'release_year' => 1999],
            ['title' => 'Avatar', 'genre' => 'Sci-Fi', 'release_year' => 2009],
            ['title' => 'Fight Club', 'genre' => 'Drama', 'release_year' => 1999],
            ['title' => 'Forrest Gump', 'genre' => 'Drama', 'release_year' => 1994],
            ['title' => 'The Shawshank Redemption', 'genre' => 'Drama', 'release_year' => 1994],
            ['title' => 'Oppenheimer', 'genre' => 'Drama', 'release_year' => 2023],
            ['title' => 'Smile', 'genre' => 'Horror', 'release_year' => 2022],
            ['title' => 'Fantastic Mr.Fox', 'genre' => 'Animation', 'release_year' => 2009],
            ['title' => 'Inglorius Basterds', 'genre' => 'Thriller', 'release_year' => 2009],
            ['title' => 'Flow', 'genre' => 'Animation', 'release_year' => 2024],
            ['title' => 'F1', 'genre' => 'Action', 'release_year' => 2025],
            ['title' => 'Isle of Dogs', 'genre' => 'Animation', 'release_year' => 2018],
            ['title' => 'Django Unchained', 'genre' => 'Drama', 'release_year' => 2012],
            ['title' => 'Blade Runner 2049', 'genre' => 'Sci-Fi', 'release_year' => 2017],
            ['title' => 'The Martian', 'genre' => 'Sci-Fi', 'release_year' => 2015],
            ['title' => 'Se7en', 'genre' => 'Thriller', 'release_year' => 1995],
            ['title' => 'Saving Private Ryan', 'genre' => 'Drama', 'release_year' => 1998],
            ['title' => 'Shutter Island', 'genre' => 'Thriller', 'release_year' => 2010],
            ['title' => 'Whiplash', 'genre' => 'Drama', 'release_year' => 2014],
            ['title' => 'Star Wars A New Hope', 'genre' => 'Sci-Fi', 'release_year' => 1977],
            ['title' => 'The Avengers', 'genre' => 'Action', 'release_year' => 2012],
            ['title' => 'Iron Man', 'genre' => 'Action', 'release_year' => 2008],
            ['title' => 'Jurassic Park', 'genre' => 'Sci-Fi', 'release_year' => 1993],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
