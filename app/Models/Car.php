<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->belongsToMany(Player::class);
        return $this->hasMany(Lap::class);
    }
}
