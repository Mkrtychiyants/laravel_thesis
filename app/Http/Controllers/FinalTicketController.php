<?php

namespace App\Http\Controllers;

use App\Models\FinalTicket;
use App\Models\Seans;
use App\Models\Seat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FinalTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Seans $seans)
    {
       
        $finalTicket = $seans->final_tickets()->get();
        dd(  $finalTicket);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Seans $seans)
    {
        $selectedTickets = $seans->tickets()->where('is_selected','=', true)->get();
        $finalPrice=0;
        $ticketSeats="";
        $row = Seat::findOrFail($selectedTickets[0]->seat_id)->row;
        foreach ($selectedTickets as $ticket){
            $finalPrice +=  $ticket->price;
            $ticketSeats .=$ticket->final_seat_number.',';
        }
        $ticketSeats= rtrim($ticketSeats, ',');
        $finalTicket = new FinalTicket();
        $finalTicket->fill([
            'seans_id' => $seans->id,
            'price' => $finalPrice,
            'seats'=> $ticketSeats,
            'row'=> $row,
            'is_selected'=> false,
            'is_purchased'=> false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $finalTicket->save();
        //  dd($finalTicket);
        return redirect()->action([FinalTicketController::class, 'show'], ['seans' => $seans->id,'final_ticket' => $finalTicket->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Seans $seans) 
    {   
      
        // return redirect()->route('client.sessions.final_tickets.index');
    }

    /**s
     * Display the specified resource.
     */
    public function show(Seans $seans, FinalTicket $finalTicket)
    {
        // dd(q111);
        return view('client.ticket_profile', ['session' => $seans,'finalTicket' => $finalTicket ]);

    }
    public function showQr(Seans $seans, FinalTicket $finalTicket)
    {
        $movieTitle = $seans->movie->title;
        $roomId = $seans->room->id;
        $startTime = $seans->start_time;
  
        $codeContents = "Movie title: ".$movieTitle."\n";
        $codeContents .= "Seats: ".$finalTicket->seats."\n";
        $codeContents .= "Row: ".$finalTicket->row."\n";
        $codeContents .= "Room: ".$roomId."\n";
        $codeContents .= "Seats: ".$finalTicket->seats."\n";
        $codeContents .= "Session start time: ".$startTime."\n";
        $codeContents .= "Price: ".$finalTicket->price."\n";

        $image = QrCode::size(200)->generate($codeContents);

        return view('client.ticket_qr', ['session' => $seans,'image' => $image, 'finalTicket' => $finalTicket ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seans $seans, FinalTicket $finalTicket)
    {
        dd( $seans);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinalTicket $finalTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinalTicket $finalTicket)
    {
        //
    }
}
