<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Roberto Romero',
            'email' => 'roberto@spotify.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name'     => 'Juan García',
            'email'    => 'juan@spotify.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name'     => 'María López',
            'email'    => 'maria@spotify.com',
            'password' => Hash::make('password'),
        ]);
    }
}
