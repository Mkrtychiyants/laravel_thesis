<?php

namespace App\Services;
use App\Models\Movie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CreateMovieService
{
    /**
     * Create a new class instance.
     */
    public function store()
    {   
        $movie = new Movie();
        $movie ->fill([
            'title' =>'Movie '. mt_rand(1,100),
            'duration' => 90,
            'country' => Str::random(10),
            'director' => Str::random(10),
            'description' => Str::random(20),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $movie->save();
    }
}
