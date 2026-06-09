<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function toggle(Song $song)
    {
        $user = auth()->user();

        if ($user->likedSongs()->where('song_id', $song->id)->exists()) {
            $user->likedSongs()->detach($song->id);
            $liked = false;
        }else{
            $user->likedSongs()->attach($song->id);
            $liked = true;
        }

        return back()->with('liked', $liked);
    }
}
