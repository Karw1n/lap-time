<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lap extends Model
{
    use HasFactory;

    public function player()
    {
        return $this->belongsTo(Player::class);
    }    
        
    public function car()
    {
    return $this->belongsTo(Car::class);
    }
}
