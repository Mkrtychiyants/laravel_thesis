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
     * Show the form for creating a new resource.
     */
    public function create(Seans $seans)
    {
        $totalPrice=0;
        $totalSeats=[];
        $selectedSeats = $seans->tickets()->where('is_selected','=', true)->get();
     

        foreach ($selectedSeats as $ticket) {
    
           $ticket->update(['is_purchased' => true]);
           $ticket->update(['is_selected' => false]);
           array_push($totalSeats, $ticket->id);
           $totalPrice += $ticket->price;
        }
      
        return view('client.ticket_profile', ['selectedSeats' =>  $totalSeats ,'totalPrice' =>$totalPrice,'session' => $seans, ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function createQR(Seans $seans)
    {
 
        $movieTitle = $seans->movie->title;
        $roomId = $seans->room->id;
        $startTime = $seans->start_time;
  
        $codeContents = "Movie title: ".$movieTitle."\n";
        $codeContents .= "Room: ".$roomId."\n";
        $codeContents .= "Session start time: ".$startTime."\n";

        $image = QrCode::size(200)->generate($codeContents);

        return view('client.ticket_qr', ['seans'=>$seans,'image' => $image,] );

    }

  
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->is_selected ?  $ticket->update(['is_selected' => false]) :  $ticket->update(['is_selected' => true]);
        return back()->withInput();
    }
}
