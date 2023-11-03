<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlayerProfile;

class PlayerProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alex = new PlayerProfile;
        $alex->email = 'alexalbon@fakeemail.com';
        $alex->phone_number = '999-999-999';
        $alex->player_id = 1;
        $alex->save();

        //PlayerProfile::factory()->count(5)->create();

    
        
    }
}
