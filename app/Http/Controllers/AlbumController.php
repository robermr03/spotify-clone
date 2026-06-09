<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AlbumController extends Controller
{
    public function show(Album $album): Response
    {
        $likedSongIds = auth()->user()->likedSongs()->pluck('song_id')->toArray();

        return Inertia::render('Album/Show', [
            'album' => $album->load(['artists', 'songs.artists']),
            'likedSongIds' => $likedSongIds,
        ]);
    }
}
