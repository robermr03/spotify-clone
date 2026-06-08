<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Dashboard', [
            'artists' => Artist::withCount('songs')->take(6)->get(),
            'recentSongs' => Song::with(['artists', 'album'])->latest()->take(10)->get(),
        ]);
    }
}
