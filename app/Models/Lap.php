<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lap extends Model
{
    use HasFactory;

    public function lap()
    {
        return $this->belongsTo(Player::class);
        return $this->belongsTo(Car::class);
    }
}
