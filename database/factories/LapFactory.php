<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lap>
 */
class LapFactory extends Factory
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
            'lap_time'   => fake()->time('i:s', rand(100, 300)),
            'track_name' => fake()->randomElement(['Bahrain International Circuit', 'Circuit de Monaco', 'Red Bull Ring',
                    'Silverstone Circuit', 'Monza Circuit', 'Sochi Autodrom', 'Suzuka Circuit','Jeddah Corniche Circuit',
                    'Yas Marina Circuit']),
            'date_set'   => fake()->date($format = 'Y-m-d', $max = 'now'),
            'car_id' => rand(1,51)
            
            ];
    }
}
