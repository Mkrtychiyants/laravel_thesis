<?php

namespace App\Services;
use App\Models\Seans;
use App\Models\Ticket;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Support\Carbon;


class CreateSessionService
{
    /**
     * Create a new class instance.
     */
    public function storeSession(array $sessionData, $movie_id)
    {
        $movie = Movie::findOrFail($movie_id);
        $room = Room::findOrFail($sessionData['room_id']);
        $seans = new Seans();
        $start = $sessionData['start'];
        $seans ->fill([
            'room_id' =>$sessionData['room_id'],
            'movie_id' => $sessionData['movie_id'],
            'session_datetime' => $start,
            'session_date' =>Carbon::parse($start)->format('Y-m-d'),
            'start_time' =>Carbon::parse($start)->format('H:i:s'),
            'finish_time' =>Carbon::parse($start)->addMinutes($movie->duration)->format('H:i:s'),
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
        return redirect(route('sessionsList'));
    }
}
