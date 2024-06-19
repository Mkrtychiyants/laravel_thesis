<?php

namespace App\Http\Controllers;

use App\Models\Seans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;  


class SeansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seans = DB::select('select * from seans');

        return view('seans', ['sessions' => $seans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($movie_id)
    {
    
        return view('create_seans', ['movie_id' => $movie_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seans = new Seans();
        $seans ->fill([
            'room_id' =>$request->input('room_id'),
            'movie_id' => $request->input('movie_id'),
            'start' => $request->input('start'),
            'finish' => $request->input('finish'),
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $seans->save();
        return redirect('/seans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seans $seans)
    {
        // dd($seans);
        return view('session_profile', ['session' => $seans]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seans $seans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seans $seans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seans $seans)
    {
        //
    }
}
