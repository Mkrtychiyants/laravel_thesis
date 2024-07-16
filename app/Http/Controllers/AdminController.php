<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Seans;
use App\Models\Ticket;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')->get();
        
        return view('admin.rooms_adm', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $room = new Room();
        $room ->fill([
            'title' =>Str::random(10),
            'rows' =>5,
            'columns' =>5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $room->save();
         
        for ($i=1; $i <= $room->rows ; $i++) { 
            for ($j=0; $j < $room->columns ; $j++) {
                $seat= new Seat();
                $seat->fill([
                    'room_id' =>  $room->id,
                    'ticket_id' => 1,
                    'row' => $i,
                    'price' => 100,
                    'is_vip' => false,
                    'is_blocked' => false,
                    'is_selected'=> false,
                    'is_purchased'=> false,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]); 
                $seat->save();
            }
        }

        return redirect(route('rooms_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $rooms = DB::table('rooms')->get();
        $seats = $room->seats;
        $nubmerSeats=0;
        return view('admin.room_config', ['currentRoom' => $room,'rooms' => $rooms, 'seats' => $seats] );
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function configRoom(Room $room)
    {
        $rooms = DB::table('rooms')->get();
        $seats = $room->seats;
        return view('room_config', ['rooms' => $rooms, 'seats' => $seats]);
    }
     /**
     * Update the specified resource in storage.
     */
    public function updateRoom(Request $request, Room $room)
    {
        $room->update(['rows' => $request->input('room_row')]);
        $room->update(['columns' =>  $request->input('room_columns')]);
        $seats = $room->seats()->delete();
        for ($i=1; $i <= $room->rows ; $i++) { 
            for ($j=0; $j < $room->columns ; $j++) {
                $seat= new Seat();
                $seat->fill([
                    'room_id' =>  $room->id,
                    'ticket_id' => 1,
                    'row' => $i,
                    'price' => 100,
                    'is_vip' => false,
                    'is_blocked' => false,
                    'is_selected'=> false,
                    'is_purchased'=> false,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]); 
                $seat->save();
            }
        }
        return back()->withInput();
    }

    public function updateSeatType(Seat $seat)
    {
        if($seat->is_blocked){
            $seat->update(
            [
                'is_blocked' => false,
                'is_vip' => false,
            ]);
        } else if (!($seat->is_vip)) {
            $seat->update(
                [
                    'is_vip' => true,
                ]);
        }else {
            $seat->update(
                [
                    'is_vip' => false,
                    'is_blocked' => true,
                ]);
        }

        return back()->withInput();
    }

    public function editSeatsPrices(Room $room)
    {
        $rooms = DB::table('rooms')->get();
        $seats = $room->seats()->get();
        $casualSeat = $seats->where('is_vip',false)->first();
        $vipSeat = $seats->where('is_vip',true)->first();
        return view('admin.room_prices_config', ['rooms' => $rooms, 'seats' => $seats, 'currentRoom' => $room]);
    }
 /**
     * Store a newly created resource in storage.
     */
    public function updateSeatsPrices(Request $request, Room $room)
    {
        $seats = $room->seats()->get();
        $casualSeats = $seats->where('is_vip', false)->all();
        $vipSeats = $seats->where('is_vip', true)->all();
        foreach ($casualSeats as $casualSeat) {
            $casualSeat->update(['price' => $request->input('regular_seat_price')]);
        }
        foreach ($vipSeats as $vipSeat) {
            $vipSeat->update(['price' => $request->input('vip_seat_price')]);
        }

        return back()->withInput();
    }
    public function indexSessions()
    {
        $rooms = DB::table('rooms')->get();
        $movies = DB::table('movies')->get();
        $seanses = DB::table('seans')->orderBy('start', 'asc')->get();
        return view('admin.sessions_config', ['movies' => $movies, 'seanses' => $seanses, 'rooms' => $rooms]);
    }
    public function createSession($movie_id)
    {
        return view('admin.create_seans', ['movie_id' => $movie_id]);
    }
    public function storeSession(Request $request, $movie_id)
    {
        $movie = Movie::findOrFail($movie_id);
        $room = Room::findOrFail($request->input('room_id'));
        $seans = new Seans();
        $seans ->fill([
            'room_id' =>$request->input('room_id'),
            'movie_id' => $request->input('movie_id'),
            'session_datetime' => $request->input('start'),
            'session_date' =>Carbon::parse($request->input('start'))->format('Y-m-d'),
            'start_time' =>Carbon::parse($request->input('start'))->format('H:i:s'),
            'finish_time' =>Carbon::parse($request->input('start'))->addMinutes($movie->duration)->format('H:i:s'),
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(),
        ]);
        $seans->save();
        
        foreach ($seans->room->seats as $seat){
                $ticket = new Ticket();
                $ticket->fill([
                'seans_id' => $seans->id,
                'seat_id' => $seat->id,
                'price' =>$seat->price,
                'is_vip'=> $seat->is_vip,
                'is_blocked'=> $seat->is_blocked,
                'is_selected'=> false,
                'is_purchased'=> false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]); 
            $ticket->save();
        }
        return redirect(route('sessions_list'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room ->delete();
        return back();
    }
}
