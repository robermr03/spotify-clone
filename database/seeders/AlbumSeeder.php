<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = [
            ['artist_id' => 1, 'title' => 'Un Verano Sin Ti',  'release_date' => '2022-05-06', 'type' => 'album'],
            ['artist_id' => 1, 'title' => 'YHLQMDLG',          'release_date' => '2020-02-29', 'type' => 'album'],
            ['artist_id' => 2, 'title' => 'MOTOMAMI',          'release_date' => '2022-03-18', 'type' => 'album'],
            ['artist_id' => 2, 'title' => 'El Mal Querer',     'release_date' => '2018-11-02', 'type' => 'album'],
            ['artist_id' => 3, 'title' => 'Jose',              'release_date' => '2021-05-07', 'type' => 'album'],
            ['artist_id' => 4, 'title' => 'El Madrileño',      'release_date' => '2021-03-26', 'type' => 'album'],
            ['artist_id' => 5, 'title' => 'Mañana Será Bonito','release_date' => '2023-02-24', 'type' => 'album'],
        ];

        foreach ($albums as $album) {
            Album::create($album);
        }
    }
}
