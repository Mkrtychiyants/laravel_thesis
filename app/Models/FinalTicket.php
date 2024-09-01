<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinalTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'seans_id',
        'price',
        'seats',
        'row',
        'dateTime',
    ];
    public function seans(): BelongsTo
    {
        return $this->belongsTo(Seans::class);
    }
}
