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

        $f1Teams = ['Red Bull Racing', 'Mercedes', 'Ferrari', 'Mclaren', 'Williams'];
        $f1Team = fake()->randomElement($f1Teams);

        $f1carModels = [
            'Red Bull Racing' => ['RB16', 'RB15', 'RB14', 'RB13'],
            'Mercedes' => ['W12', 'W11', 'W10', 'W9'],
            'Ferrari' => ['SF21', 'SF1000', 'SF90', 'SF71H'],
            'Mclaren' => ['MCL35', 'MCL34', 'MCL33'],
            'Williams' => ['FW43', 'FW42', 'FW41', 'FW40'],
        ];

        return [
            'team' => $f1Team,
            'model' => fake()->randomElement($f1carModels[$f1Team])
        ];
    }
}
