<?php

namespace App\Http\Controllers;

use App\Models\Seans;
use App\Models\Seat;
use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;  


class SeansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($date)
    {
        $rooms = DB::table('rooms')->get();
        $movies = DB::table('movies')->get();
        $seanses = DB::table('seans')->orderBy('start', 'asc')->get();
        
        
        $today = Carbon::create($date)->locale('ru_RU')->format('Y-m-d');
        $seansesToday = DB::table('seans')->orderBy('start', 'asc')->get();

        return view('client.layout.welcome', ['movies' => $movies, 'seanses' => $seansesToday , 'rooms' => $rooms,'today'=>Carbon::create($date)->locale('ru_RU')]);
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
       
        $vip_seat_price = $seans->room->seats()->where('is_vip','=', true)->firstOrFail()->price;
        $regular_seat_price = $seans->room->seats()->where('is_vip','=', false)->first()->price;

        $tickets = $seans->tickets()->get();  
   
        return view('client.session_profile', ['session' => $seans,'vip_price' => $vip_seat_price,'regular_price' => $regular_seat_price, 'tickets'=> $tickets]);
    }

    
    public function update(Seat $seat)
    {
        $seat->is_selected ?  $seat->update(['is_selected' => false]) :  $seat->update(['is_selected' => true]);
    
        return back()->withInput();
    }


}
