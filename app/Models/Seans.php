<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seans extends Model
{
          
    use HasFactory;
    protected $fillable = [
        'room_id',
        'movie_id',
        'start',    
        'finish',
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
}
