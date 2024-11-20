<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //

        User::factory()->create([
            'name' => 'Kader ',
            'email' => 'kader@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kader'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)->create();
        Game::factory(10)->create();
    }
}
