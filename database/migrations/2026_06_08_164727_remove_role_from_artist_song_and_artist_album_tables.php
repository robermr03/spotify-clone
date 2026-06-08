<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('artist_song', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        Schema::table('artist_album', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }

    public function down(): void
    {
        Schema::table('artist_song', function (Blueprint $table) {
            $table->enum('role', ['main', 'featured'])->default('main');
        });

        Schema::table('artist_album', function (Blueprint $table) {
            $table->enum('role', ['main', 'featured'])->default('main');
        });
    }
};
