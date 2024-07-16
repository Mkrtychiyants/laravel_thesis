<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seats = DB::table('seats')->get()->all();
        $seats = DB::select('select * from seats');

        return view('seats', ['seats' => $seats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_seat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seat = new Seat();
        $seat ->fill([
            'room_id' =>$request->input('room_id'),
            'ticket_id' => $request->input('ticket_id'),
            'row' => $request->input('row'),
            'price' => $request->input('price'),
            'is_vip' => $request->input('is_vip'),
            'is_blocked' => $request->input('is_blocked'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $seat->save();
        return redirect('/seats');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seat $seat)
    {
         // dd($seans);
         return view('seat_profile', ['seat' => $seat]);
    }

    /**
     * Show the form for editing the specified resource.
     */

}
