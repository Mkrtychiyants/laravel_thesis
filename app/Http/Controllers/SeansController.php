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
        $today = Carbon::now('Europe/Moscow')->locale('ru_RU')->format('Y-m-d');
        
        $isToday = $date=== $today;
        $seansesToday = DB::table('seans')->orderBy('start', 'asc')->get();

        return view('client.layout.welcome', ['movies' => $movies, 'seanses' => $seansesToday , 'rooms' => $rooms,'today'=>$date, 'isToday'=>$isToday ]);
    }

    
    public function show(Seans $seans)
    {
       
        $vipSeatPrice = $seans->room->seats()->where('is_vip','=', true)->firstOrFail()->price;
        $regularSeatPrice = $seans->room->seats()->where('is_vip','=', false)->first()->price;

        $tickets = $seans->tickets()->get();  

        return view('client.session_profile', ['session' => $seans,'vipPrice' => $vipSeatPrice,'regularPrice' => $regularSeatPrice, 'tickets'=> $tickets]);
    }

    
    public function update(Seat $seat)
    {
        $seat->is_selected ?  $seat->update(['is_selected' => false]) :  $seat->update(['is_selected' => true]);
    
        return back()->withInput();
    }


}
