<?php

namespace App\Services;
use App\Models\Room;

class UpdateSeatPriceService
{
    /**
     * Create a new class instance.
     */
    public function updateSeatsPrices(array $priceData, Room $room)
    {
        $seats = $room->seats()->get();
        $casualSeats = $seats->where('is_vip', false)->all();
        $vipSeats = $seats->where('is_vip', true)->all();
     
        foreach ($casualSeats as $casualSeat) {
            $casualSeat->update(['price' => $priceData['regular_seat_price']]);
        }
        foreach ($vipSeats as $vipSeat) {
            $vipSeat->update(['price' => $priceData['vip_seat_price']]);
        }

    }
}
