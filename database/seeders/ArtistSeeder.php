<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = [
            ['name' => 'Bad Bunny',     'country' => 'Puerto Rico', 'bio' => 'Artista de trap latino y reggaeton.'],
            ['name' => 'Rosalía',       'country' => 'España',      'bio' => 'Artista de flamenco y pop alternativo.'],
            ['name' => 'J Balvin',      'country' => 'Colombia',    'bio' => 'Rey del reggaeton colombiano.'],
            ['name' => 'C. Tangana',    'country' => 'España',      'bio' => 'Artista de pop urbano español.'],
            ['name' => 'Karol G',       'country' => 'Colombia',    'bio' => 'Reina del reggaeton femenino.'],
        ];

        foreach ($artists as $artist) {
            Artist::create($artist);
        }
    }
}
