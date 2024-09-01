<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Seat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class UpdateRoomService
{
    /**
     * Create a new class instance.
     */
    public function updateRoom(array $roomData, Room $room):Room
    {
        $room->update(['rows' => $roomData["room_row"], 'columns' => $roomData["room_columns"] ]);
        
        $room->seats()->delete();
        for ($i=1; $i <= $room->rows ; $i++) { 
            for ($j=0; $j < $room->columns ; $j++) {
                $seat= new Seat();
                $seat->fill([
                    'room_id' =>  $room->id,
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
        return $room;
    }
}
