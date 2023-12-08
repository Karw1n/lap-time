<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'excerpt', 'body', 'image'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getImageURL() 
    {
        if($this->image) {
            return url('storage/'.$this->image);
        } else {
            return "https://via.placeholder.com/640x480.png/0077aa?text=totam={$this->name}";
        }
    }
}
