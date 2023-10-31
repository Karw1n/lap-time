<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    

    public function playerProfile()
    {
        return $this->hasOne(PlayerProfile::class);
        return $this->hasMany(Lap::class);
    }
}
