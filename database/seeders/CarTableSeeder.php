<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $x = new Car;
        $x->team = "Williams";
        $x->model = 'FW43';
        $x->save();
        $cars = Car::factory()->count(50)->create();

    }
}
