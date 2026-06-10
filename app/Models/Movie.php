<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function lists()
    {
        return $this->belongsToMany(MovieList::class, 'list_movies');
    }

    protected $fillable = [
        'title',
        'genre',
        'release_year',
        'poster'
    ];
    use HasFactory;
}
