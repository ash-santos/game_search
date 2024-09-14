<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Game;
use App\Models\UserGame;

class UserGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 users
        $users = User::factory()->count(50)->create();

        // Create 10 unique games
        $games = Game::factory()->count(10)->create();

        // Assign each user a random number of games with random levels
        foreach ($users as $user) {
            // Assign between 1 and 5 random games to each user
            $randomGames = $games->random(rand(1, 5));

            foreach ($randomGames as $game) {
                // Create user-game relationships with random levels (1-10)
                UserGame::create([
                    'user_id' => $user->id,
                    'game_id' => $game->id,
                    'level' => rand(1, 10),
                ]);
            }
        }
    }
}
