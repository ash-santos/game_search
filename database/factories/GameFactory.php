<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Call of Duty', 'Fortnite', 'League of Legends', 'Minecraft', 
                'Among Us', 'Valorant', 'PUBG', 'Overwatch', 'GTA V', 'Apex Legends'
            ]),
            'description' => $this->faker->sentence(),
        ];
    }
}
