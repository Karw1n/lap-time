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
        //
        $a = new Player;
        $a->name = "New Player";
        $a->favourite_team = "New Team";
        $a->save();

        Player::factory()->count(50)->create();
    }
}
