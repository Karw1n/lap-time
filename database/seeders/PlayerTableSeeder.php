<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Lap;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $a = new Player;
        $a->name = "Alex Albon";
        $a->favourite_team = "Williams";
        $a->save();
        // //$a->car()->attach(1);
        Player::factory()->count(10)->create();
        // $player = Player::factory()->count(5)
        //     ->has(Lap::factory()->count(3))
        //     ->create();
        //Player::factory(5)->has(Lap::factory()->count(5))->create();
    
        }
}
