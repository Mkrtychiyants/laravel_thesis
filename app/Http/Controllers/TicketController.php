<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Seans;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = DB::select('select * from tickets');
        // $sessions = Room::find(1)->seans()
        //                  ->where('room_id', 1)
        //                  ->get();
        // $sessions = Room::find(1)->seans()
        // ->where('room_id', 1)
        // ->get();
        // $session = Ticket::find(1)->seans;
        // dd($session);
        return view('tickets', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_ticket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket ->fill([
            'seans_id' =>$request->input('seans_id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $ticket->save();
        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('ticket_profile', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
