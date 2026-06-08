<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $fillable = [
        'title',
        'cover',
        'release_date',
        'type'
    ];

    protected $casts = [
        'release_date' => 'date'
    ];

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'artist_album')
                    ->withTimestamps();
    }

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }
}
