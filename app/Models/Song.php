<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Song extends Model
{
    protected $fillable = [
        'album_id',
        'title',
        'file_path',
        'duration',
        'play_count',
        'track_number',
    ];

    protected $appends = ['file_url'];


    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class)
                    ->withTimestamps();
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

    protected function fileUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->file_path
                ? Storage::disk('s3')->url($this->file_path)
                :null
        );
    }

}
