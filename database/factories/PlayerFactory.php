<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PlayerProfile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'favourite_team' => fake()->randomElement(['Red Bull Racing', 'Mercedes', 'Ferrari', 'Mclaren', 'Aston Martin',
                                            'Alpine', 'Williams', 'Alphatauri', 'Alfa Romeo', 'Hass'])
            ];
    }
}
