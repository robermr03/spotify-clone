<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'image',
        'country',
    ];

    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class, 'artist_album')
                    ->withTimestamps();
    }

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'artist_song')
                    ->withTimestamps();
    }
}
