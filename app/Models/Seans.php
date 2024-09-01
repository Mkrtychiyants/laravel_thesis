<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seans extends Model
{
          
    use HasFactory;
    protected $fillable = [
        'room_id',
        'movie_id',
        'session_datetime',
        'session_date',
        'start_time',    
        'finish_time',
    ];
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
    public function final_tickets(): HasMany
    {
        return $this->hasMany(FinalTicket::class);
    }
}
