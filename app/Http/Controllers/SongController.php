<?php

namespace App\Http\Controllers;

use App\Models\PlayHistory;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function registerPlay(Song $song){
        $song->increment('play_count');

        PlayHistory::create([
            'user_id' => auth()->id(),
            'song_id' => $song->id,
            'played_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }
}
