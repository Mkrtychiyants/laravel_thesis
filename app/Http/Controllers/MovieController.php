<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Seans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use Illuminate\Support\Carbon;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $movies = DB::select('select * from movies');
        $seanses = DB::table('seans')->orderBy('start', 'asc')->get();
        $rooms = DB::select('select * from rooms');
 
        return view('movies', ['movies' => $movies, 'seanses' => $seanses, 'rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_movie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $movie = new Movie();
        $movie ->fill([
            'title' =>$request->input('title'),
            'duration' => $request->input('movie_duration'),
            'country' => $request->input('movie_country'),
            'director' => $request->input('movie_director'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $movie->save();
        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
         return view('movie_profile', ['movie' => $movie]);
    }

    
}
