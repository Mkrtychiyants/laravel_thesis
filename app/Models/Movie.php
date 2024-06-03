<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'duration',
        'country',
        'director',
    ];
    public function sessions(): HasMany
    {
        return $this->hasMany(Seans::class);
    }
}
