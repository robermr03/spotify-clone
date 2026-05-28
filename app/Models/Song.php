<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Song extends Model
{
    protected $fillable = [
        'album_id',
        'artist_id',
        'title',
        'file_path',
        'duration',
        'play_count',
        'track_number',
    ];


    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'playlist_songs')
                    ->withPivot('order')
                    ->withTimestamps();
    }

    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'liked_songs')
                    ->withTimestamps();
    }

    public function playHistory(): HasMany
    {
        return $this->hasMany(PlayHistory::class);
    }
}
