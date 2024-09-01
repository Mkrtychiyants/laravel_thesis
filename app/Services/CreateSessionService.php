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
        $number = 1;
        $room = Room::findOrFail($sessionData['room_id']);
        // dd($movie);
        // dd($room->seans);
        // dd($movie->seans);
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
        $room->seans()->save($seans);
        

        foreach ($room->seats as $seat){
            if(!$seat->is_blocked){
                $ticket = new Ticket();
                $ticket->fill([
                'seans_id' => $seans->id,
                'seat_id' => $seat->id,
                'final_seat_number' => $number++,
                'price' =>$seat->price,
                'is_vip'=> $seat->is_vip,
                'is_blocked'=> $seat->is_blocked,
                'is_selected'=> false,
                'is_purchased'=> false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]); 
                $ticket->save();
                $seans->tickets()->save($ticket);
            }
            if($seat->is_blocked){
                $ticket = new Ticket();
                $ticket->fill([
                'seans_id' => $seans->id,
                'seat_id' => $seat->id,
                'final_seat_number' => null,
                'price' =>$seat->price,
                'is_vip'=> $seat->is_vip,
                'is_blocked'=> $seat->is_blocked,
                'is_selected'=> false,
                'is_purchased'=> false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]); 
                $ticket->save();
                $seans->tickets()->save($ticket);
            } 
        }
    
       

        return redirect(route('sessionsList'));
    }
}
