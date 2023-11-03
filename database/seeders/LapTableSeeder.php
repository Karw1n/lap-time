<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lap;

class LapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lap = new Lap;
        $lap->player_id = 1;
        $lap->car_id = 1;
        $lap->lap_time = '01:28:00';
        $lap->track_name = 'Circuit de Monaco';
        $lap->save();
    }
}
