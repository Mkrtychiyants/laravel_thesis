<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'ticket_id',
        'row',
        'price',
        'is_vip',
        'is_blocked',
    ];
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

}
