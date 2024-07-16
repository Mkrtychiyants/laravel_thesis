<?php
namespace App\Http\Controllers;


use SimpleSoftwareIO\QrCode\Facades\QrCode;
// include "qrlib.php";

use App\Models\Ticket;
use App\Models\Seans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tickets = DB::select('select * from tickets');
        // $sessions = Room::find(1)->seans()
        //                  ->where('room_id', 1)
        //                  ->get();
        // $sessions = Room::find(1)->seans()
        // ->where('room_id', 1)
        // ->get();
        // $session = Ticket::find(1)->seans;
        // dd($session);
        return view('admin.link_to_client');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Seans $seans)
    {
        $total_price=0;
        $total_seats=[];
        $selectedSeats = $seans->tickets()->where('is_selected','=', true)->get();
        // dd($selectedSeats);

        foreach ($selectedSeats as $ticket) {
    
           $ticket->update(['is_purchased' => true]);
           $ticket->update(['is_selected' => false]);
           array_push($total_seats, $ticket->seat_id);
           $total_price+=$ticket->price;
        }
        //  dd($total_price);
     
       
        return view('client.ticket_profile', ['selectedSeats' =>  $total_seats ,'total_price' =>$total_price,'session' => $seans, ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function createQR(Seans $seans)
    {
        // dd( $seans->movie->title);
        // dd( $seans->room->id);
        // dd( $seans->start_time);
        // $total_price=0;
        // $seats = $ticket->seans->room->seats()->where('is_selected','=', true)->get();
        // // dd($seats);
        
        $movie_title = $seans->movie->title;
        $room_id = $seans->room->id;
        $start_time = $seans->start_time;
  
        $codeContents = "Movie title: ".$movie_title."\n";
        $codeContents .= "Room: ".$room_id."\n";
        $codeContents .= "Session start time: ".$start_time."\n";
    
        
        $image = QrCode::size(200)->generate($codeContents);
   


        return view('client.ticket_qr', ['seans'=>$seans,'image' => $image,] );

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
        $ticket->is_selected ?  $ticket->update(['is_selected' => false]) :  $ticket->update(['is_selected' => true]);
    

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
