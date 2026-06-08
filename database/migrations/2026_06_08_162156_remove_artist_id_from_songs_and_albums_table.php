<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Migrar datos de songs
        DB::table('songs')->get()->each(function ($song) {
            if ($song->artist_id) {
                DB::table('artist_song')->insert([
                    'artist_id'  => $song->artist_id,
                    'song_id'    => $song->id,
                    'role'       => 'main',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        // Migrar datos de albums
        DB::table('albums')->get()->each(function ($album) {
            if ($album->artist_id) {
                DB::table('artist_album')->insert([
                    'artist_id'  => $album->artist_id,
                    'album_id'   => $album->id,
                    'role'       => 'main',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        // Eliminar columnas
        Schema::table('songs', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
            $table->dropColumn('artist_id');
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
            $table->dropColumn('artist_id');
        });
    }

    public function down(): void
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->foreignId('artist_id')->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->foreignId('artist_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }
};
