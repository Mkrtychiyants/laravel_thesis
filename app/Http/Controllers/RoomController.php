<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Seans;
use App\Models\Seat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = DB::select('select * from rooms');
        // $sessions = Room::find(1)->seans()
        // ->where('room_id', 1)
        // ->get();
        // $room1 = Seans::find(1)->room;
        // dd($room1);
        return view('rooms', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_room');
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
        //
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
        return redirect('/rooms');
    }
}
