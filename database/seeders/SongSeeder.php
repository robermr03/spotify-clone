<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            // Un Verano Sin Ti — Bad Bunny
            ['album_id' => 1, 'artist_id' => 1, 'title' => 'Moscow Mule',      'duration' => 234, 'track_number' => 1, 'file_path' => ''],
            ['album_id' => 1, 'artist_id' => 1, 'title' => 'Tití Me Preguntó', 'duration' => 248, 'track_number' => 2, 'file_path' => ''],
            ['album_id' => 1, 'artist_id' => 1, 'title' => 'Me Porto Bonito',  'duration' => 178, 'track_number' => 3, 'file_path' => ''],

            // MOTOMAMI — Rosalía
            ['album_id' => 3, 'artist_id' => 2, 'title' => 'Saoko',            'duration' => 151, 'track_number' => 1, 'file_path' => ''],
            ['album_id' => 3, 'artist_id' => 2, 'title' => 'Candy',            'duration' => 142, 'track_number' => 2, 'file_path' => ''],
            ['album_id' => 3, 'artist_id' => 2, 'title' => 'Bizcochito',       'duration' => 133, 'track_number' => 3, 'file_path' => ''],

            // El Madrileño — C. Tangana
            ['album_id' => 6, 'artist_id' => 4, 'title' => 'Camina',           'duration' => 195, 'track_number' => 1, 'file_path' => ''],
            ['album_id' => 6, 'artist_id' => 4, 'title' => 'Nominao',          'duration' => 187, 'track_number' => 2, 'file_path' => ''],
            ['album_id' => 6, 'artist_id' => 4, 'title' => 'Tú Me Dejaste de Querer', 'duration' => 213, 'track_number' => 3, 'file_path' => ''],

            // Mañana Será Bonito — Karol G
            ['album_id' => 7, 'artist_id' => 5, 'title' => 'Mientras Me Curo del Cora', 'duration' => 198, 'track_number' => 1, 'file_path' => ''],
            ['album_id' => 7, 'artist_id' => 5, 'title' => 'TQG',              'duration' => 191, 'track_number' => 2, 'file_path' => ''],
            ['album_id' => 7, 'artist_id' => 5, 'title' => 'Carolina',         'duration' => 203, 'track_number' => 3, 'file_path' => ''],
        ];

        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}
