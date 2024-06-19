<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Seans;
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
        return view('rooms_adm', ['rooms' => $rooms]);
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
        $room = new Room();
        $room ->fill([
            'title' =>$request->input('room'),
            'rows' => $request->input('room_row'),
            'columns' => $request->input('room_columns'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $room->save();

        $newRoom = DB::table('rooms')->get()->last();
        for ($i=1; $i <= $newRoom->rows ; $i++) { 
            for ($j=0; $j < $newRoom->columns ; $j++) {
                $seat= new Seat();
                $seat->fill([
                    'room_id' =>  $newRoom->id,
                    'ticket_id' => 1,
                    'row' => $i,
                    'price' => 100,
                    'is_vip' => false,
                    'is_blocked' => false,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $seat->save();
            }
        }
        $seats = DB::table('seats')->get()->all();
       

        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        // $seats = $room->seats()
        // ->where('room_id',$room->id )
        //             ->first();;
        //  dd($seats);
        return view('room_profile', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $seats = $room->seats()
        ->where('room_id', $room->id )->get();
        //  dd($seats);
        return view('room_config', ['room' => $room, 'seats' => $seats]);
    }
     /**
     * Show the form for editing the specified resource.
     */
    public function configRoom(Room $room)
    {
        $rooms = DB::table('rooms')->get();
        $seats = $room->seats;
        dd($seats);
        return view('room_config', ['rooms' => $rooms, 'seats' => $seats]);
    }
    public function editPrices(Room $room)
    {
        $seats = $room->seats()
        ->where('room_id', $room->id )->get();
        //  dd($seats);
        return view('room_prices_config', ['room' => $room, 'seats' => $seats]);
    }
 /**
     * Store a newly created resource in storage.
     */
    public function store_prices(Request $request, Room $room)
    {
        $seats = $room->seats()->get();
        //  dd($seats);
         $casualSeats = $seats->where('is_vip',false)->all();
         $vipSeats = $seats->where('is_vip',true)->all();
         foreach ($casualSeats as $casualSeat) {
            $casualSeat->update(['price' =>  $request->input('casual_seat_price')]);
         }
         foreach ($vipSeats as $vipSeat) {
            $vipSeat->update(['price' =>  $request->input('vip_seat_price')]);
         }
         dd( $casualSeats);
         

        return redirect('/rooms');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room ->delete();
        // Room::destroy($room);
        return redirect('/');
    }
}
