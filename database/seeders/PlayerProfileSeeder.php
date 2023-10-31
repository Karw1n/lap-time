<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlayerProfile;

class PlayerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x = new PlayerProfile;
        $x->email = 'newemail@fakeemail.com';
        $x->player_id = 1;
        $x->save();
        
    }
}
