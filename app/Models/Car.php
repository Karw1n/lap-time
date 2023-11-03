<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }
    public function laps(){
        return $this->hasMany(Lap::class);
    }
}
