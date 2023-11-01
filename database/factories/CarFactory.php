<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'team' => fake()->randomElement(['Red Bull Racing', 'Mercedes', 'Ferrari', 'Mclaren', 'Aston Martin',
                                            'Alpine', 'Williams', 'Alphatauri', 'Alfa Romeo', 'Hass']),
            'model' => fake()->numerify('Model##')
        ];
    }
}
