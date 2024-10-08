<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'seans_id',
        'seat_id',
        'final_seat_number',
        'price',
        'is_selected',
        'is_purchased',
        'is_vip',
        'is_blocked',
    ];
    public function seans(): BelongsTo
    {
        return $this->belongsTo(Seans::class);
    }
    public function seats(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }

}
