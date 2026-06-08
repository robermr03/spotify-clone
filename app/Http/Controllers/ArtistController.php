<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ArtistController extends Controller
{
    public function show(Artist $artist): Response
    {
        return Inertia::render('Artist/Show', [
            'artist' => $artist->load('albums.artists', 'albums.songs'),
        ]);
    }
}
