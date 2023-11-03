<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Player;
        $a->name = "Alex Albon";
        $a->favourite_team = "Williams";
        $a->save();

        Player::factory(10)
            ->has(\App\Models\PlayerProfile::factory())
            ->has(\App\Models\Lap::factory()->count(3))
            ->create();
        }
}
